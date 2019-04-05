<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = file_get_contents('https://restcountries.eu/rest/v2/all');
        $result = json_decode($result,true);
        foreach ($result as $country){
            $image = file_get_contents( $country['flag']);


            file_put_contents(public_path('images/flag/'.$country['alpha2Code'].'.svg'), $image);


            $item = [
                    'name'=>$country['name'],
                    'name_fa'=>$country['translations']['fa'],
                    'iso_code_2'=>$country['alpha2Code'],
                    'iso_code_3'=>$country['alpha3Code'],
                    'flag'=>$country['alpha2Code'].'.svg',
                    'code'=>$country['callingCodes'][0],
                ];
            $country_info = \App\Country::updateOrCreate($item);
            $result_state = file_get_contents(trim('https://battuta.medunes.net/api/region/'.strtolower($country['alpha2Code']).'/all/?_=155438459686&callback=jQuery311012227501313601818_1554384596865&key=00000000000000000000000000000000'));
            $result_state = str_ireplace('/**/jQuery311012227501313601818_1554384596865(','',$result_state);
            $result_state = str_ireplace(');','',$result_state);
            $result_state = json_decode($result_state,true);

            foreach ($result_state as $state){
                $item_state = [
                    'name'=>$state['region'],
                    'country_id'=>$country_info->id
                ];
                $state_info = \App\State::updateOrCreate($item_state);

                $result_city = file_get_contents(trim('https://battuta.medunes.net/api/city/af/search/?region='.str_replace(' ','%20',$state['region']).'&key=00000000000000000000000000000000&callback=jQuery311012227501313601818_1554384596865&_=1554384596868'));
                $result_city = str_ireplace('/**/jQuery311012227501313601818_1554384596865(','',$result_city);
                $result_city = str_ireplace(');','',$result_city);
                $result_city = json_decode($result_city,true);
                if(!empty($result_state['error'])){
                    continue;
                }
                foreach ($result_city as $city){
                    $item_city = [
                        'name'=>$city['city'],
                        'latitude'=>$city['latitude'],
                        'longitude'=>$city['longitude'],
                        'country_id'=>$country_info->id,
                        'state_id'=>$state_info->id
                    ];
                    $city_info = \App\City::updateOrCreate($item_city);

                }
            }
        }
    }
}
