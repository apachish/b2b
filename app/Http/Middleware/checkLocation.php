<?php

namespace App\Http\Middleware;

use App\City;
use App\Country;
use App\Ip;
use App\State;
use Closure;

class checkLocation
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $remoteAddress = $request->ip();
        if ($remoteAddress == '127.0.0.1') {
            $remoteAddress = '5.78.181.247';
        }
        $member_id = auth()->check()?auth()->id():null;
        $result = \Cache::rememberForever($remoteAddress, function () use ($remoteAddress,$request) {
            $service = 'api.ipinfodb.com';
            $version = 'v3';
            $apiKey = 'b35ff4dbf7acec236706b45476a5df822ed215e09c85656be9cbfc5bcc47b971';
            $ip = @gethostbyname($remoteAddress);
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                $result = @file_get_contents('http://' . $service . '/' . $version . '/ip-city/?key=' . $apiKey . '&ip=' . $ip . '&format=json');
                $result = json_decode($result, true);
                $country = Country::where('iso_code_2', $result['countryCode'])->first();
                $state = State::where('name', $result['regionName'])->first();
                $city = City::where('name', $result['cityName'])->first();
                $result['country'] = $country ? $country->id : null;
                $result['state'] = $state ? $state->id : null;
                $result['city'] = $city ? $city->id : null;
                return $result;
            }
            return [];
        });
        if ($result) {

            $result['user_agent'] = $request->header('User-Agent');
            Ip::updateOrCreate(['ip'=>$remoteAddress,'member_id'=>$member_id],$result);
        }

        return $next($request);
    }
}
