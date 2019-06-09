<?php

namespace App\Providers;

use App\Category;
use App\CategoryMenu;
use App\Country;
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

        view()->composer('*', function ($view) {
            if (starts_with(Request::root(), 'http://')) {
                $domain = substr(Request::root(), 7); // $domain is now 'www.example.com'
            }
            if (starts_with(Request::root(), 'https://')) {
                $domain = substr(Request::root(), 7); // $domain is now 'www.example.com'
            }
            $view->telephone = "";
            $countries = Country::where('status', 1)->get();
            $view->countries = $countries;
            $user_country = auth()->check() ? auth()->user()->country->id : null;
            if (!$user_country) {
                $ip_info = \Cache::get(Request::ip());
                $user_country = data_get($ip_info, 'country_id');
            }
            $view->user_country = $user_country;
            $portal = Portal::whereDomain($domain)->first();
            if ($portal) {
                $site_info = json_decode($portal->meta_data, true);
                $view->social = json_decode($portal->social, true);
                $view->meta_data = json_decode($portal->meta_data, true);
                \Cache::rememberForever('portal',function () use($portal){
                   return $portal;
                });
                $view->telephone = !empty($site_info['telephone']) ? $site_info['telephone'] : "";
            }
            if (Request::is('admin*')) {
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
            } else {
                $menus = CategoryMenu::with('menus')->where('locale', app()->getLocale())
                    ->whereHas('menus', function ($q) {
                        $q->where('status', 1);
                    })->whereHas('portals', function ($q) use ($portal) {
                        $q->where('portal_id', $portal->id);
                    })
                    ->get();
                $list_menu = [];
                foreach ($menus as $menu) {
                    if($menu->type_menu == 'category'){
                        $categories = Category::where('status',1)->where('parent_id',Null)->orderByRaw('RAND()')->take(18)->get();
                        $base_url = 'home/category';
                        $item = [];
                        $i=1;
                        foreach ($categories as $cat){
                            $row = new \stdClass();

                            $row->title =  $cat->getCategoryTitle();
                            $row->base_url='home.categories';
                            $row->class='';
                            $row->page_url=json_encode(['slug'=>app()->getLocale()=='fa'?$cat->slug_fa:$cat->slug]);
                            $metaData['value'] = $cat->id;
                            $metaData['title'] = $cat->getCategoryTitle();
                            $metaData['url'] = route('home.categories',['slug'=>app()->getLocale()=='fa'?$cat->slug_fa:$cat->slug]);
                            $row->metaData = json_encode($metaData);
                            $menu->menus[$i++] = $row;
                        }
                        $menu->menus = $menu->menus->sortKeysDesc();
                    }
                    $list_menu[$menu->position] = $menu;
                }
                $view->routeName = "";
                if (Request::route())
                    $view->routeName = Request::route()->getName();
                $view->title_menu = null;
                foreach (data_get($list_menu, 'main_menu.menus') as $menu_main) {
                    if ($menu_main->base_url == $view->routeName)
                        $view->title_menu = $menu_main->title;
                }

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
