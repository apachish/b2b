<?php

namespace App\Providers;

use App\Portal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view)
        {
            if (starts_with(Request::root(), 'http://'))
            {
                $domain = substr (Request::root(), 7); // $domain is now 'www.example.com'
            }
            $prortal  = Portal::whereDomain($domain)->first();
            $site_info = json_decode($prortal->meta_data,true);
            $view->telephone=!empty($site_info['telephone'])?$site_info['telephone']:"";


        });


//        $menu = DB::table('tbl_menu')->get();
//        $id=1;
//        foreach ($menu as $i){
//            $out[] = [
//                'id'=> $id,
//                'type'=>$i->type,
//                'parent_id'=>$i->parent,
//                'base_url'=>$i->base_url,
//                'page_url'=>$i->page_url,
//                'title'=>$i->title,
//                'meta_data'=>$i->meta_data,
//                'order_menu'=>$i->order_menu,
//                'status'=>true,
//                'language'=>$i->language=='en_US'?'en':($i->language=='fa_IR'?'fa':''),
//                'category'=>$i->category,
//                'class'=>$i->class,
//
//
//            ];
//            $id++;
//        }
//        echo json_encode($out);exit;
    }
}
