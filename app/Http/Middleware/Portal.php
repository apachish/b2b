<?php

namespace App\Http\Middleware;

use App\Country;
use Closure;
use Illuminate\Support\Str;

class Portal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Str::contains(request()->root(),'http://')) {
            $domain = substr(request()->root(), 7); // $domain is now 'www.example.com'
        }
        if (Str::contains(request()->root(),'https://')) {
            $domain = substr(request()->root(), 8); // $domain is now 'www.example.com'
        }
        $portal = cache()->rememberForever($domain,function () use($domain){
            $portal = \App\Portal::whereDomain($domain)->first();
            $portal->site_info = json_decode($portal->meta_data, true);
            $portal->social = json_decode($portal->social, true);
            $portal->meta_data = json_decode($portal->meta_data, true);
            $portal->telephone = !empty($site_info['telephone']) ? $site_info['telephone'] : "";

            return $portal;
        });
        if ($portal) {
            $user_country =  cache()->rememberForever(session()->getId()."_Country",function () use($portal){

                $user_country = auth()->check() ? auth()->user()->country->id : null;
                if (!$user_country) {
                    $ip_info = \Cache::get(request()->ip());
                    $user_country = data_get($ip_info, 'country_id');
                }
                return $user_country;

            });
        }
        cache()->rememberForever(session_id()."_locale",function (){
            if(session()->get('locale')){
                app()->setLocale(session()->get('locale'));
            }else{
                app()->setLocale($portal->locale);
            }
        });
        $countries = cache()->rememberForever('countries',function (){
            return   $countries = Country::where('status', 1)->get();
        });


        return $next($request);
    }
}
