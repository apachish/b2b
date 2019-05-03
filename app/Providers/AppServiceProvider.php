<?php

namespace App\Providers;

use App\CategoryMenu;
use App\Menu;
use App\Portal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        view()->composer('*', function($view)
        {
            if (starts_with(Request::root(), 'http://'))
            {
                $domain = substr (Request::root(), 7); // $domain is now 'www.example.com'
            }
            if (starts_with(Request::root(), 'https://'))
            {
                $domain = substr (Request::root(), 7); // $domain is now 'www.example.com'
            }
            $view->telephone="";

            $portal  = Portal::whereDomain($domain)->first();
            if($portal){
                $site_info = json_decode($portal->meta_data,true);
                $view->telephone=!empty($site_info['telephone'])?$site_info['telephone']:"";
            }
            if (Request::is('admin/*')) {
                $view->Count_notification_product_enquiry = 0;
                $view->notification_product_enquiry = [];
                $view->Count_notification_enquiry = 0;
                $view->notification_enquiry = [];
                $view->Count_notification_product_enquiry = 0;
                $view->notification_product_enquiry = [];
                $view->Count_notification_requestCall = 0;
                $view->notification_requestCall = [];
                $view->Count_notification_product = 0;
                $view->notification_product = [];
                $view->Count_notification_banner = 0;
                $view->notification_banner = [];
                $view->Count_notification_user = 0;
                $view->notification_user = [];
            }else{
                $menus = CategoryMenu::with('menus')->where('locale',app()->getLocale())
                    ->whereHas('menus',function ($q){
                        $q->where('status',1);
                    })->whereHas('portals',function ($q) use ($portal){
                        $q->where('portal_id',$portal->id);
                    })
                    ->get();
                $list_menu= [];
                foreach ($menus  as $menu){
                    $list_menu[$menu->position] = $menu;
                }
                $view->routeName = Request::route()->getName();
                //Route::getCurrentRoute()->getPath();
                $view->menus = $list_menu;
            }

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
