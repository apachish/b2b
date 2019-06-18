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
use Illuminate\Support\Str;

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
                if(session()->get('locale')){
                    app()->setLocale(session()->get('locale'));
                }else{
                    app()->setLocale($portal->locale);
                }
                $site_info = json_decode($portal->meta_data, true);
                $view->social = json_decode($portal->social, true);
                $view->meta_data = json_decode($portal->meta_data, true);
                \Cache::rememberForever('portal', function () use ($portal) {
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
                $route_current = Request::route() ? Request::route()->getName() : "";
                $view->routeName = $route_current;
                foreach ($menus as $menu) {
                    if ($menu->type_menu == 'category') {
                        $categories = Category::where('status', 1)->where('parent_id', Null)->orderByRaw('RAND()')->take(18)->get();
                        $i = 1;
                        $menu_category = $menu->menus;
                        foreach ($categories as $cat) {
                            $row = new \stdClass();
                            $row->href = route('home.categories', ['slug' => app()->getLocale() == 'fa' ? $cat->slug_fa : $cat->slug]);
                            $row->title = $cat->getCategoryTitle();
                            $row->class = "";
                            $row->permission = "all";
                            $menu_category->push($row);
                        }
                        $menu->menus = $menu_category->sortKeysDesc();
                    }
                    $filter = $menu->menus->filter(function ($set){
                        return ((data_get($set, 'permission') == 'user' && auth()->user()) ||
                            (data_get($set, 'permission') == 'guest' && !auth()->user()) ||
                            data_get($set, 'permission') == 'all'
                        );
                    });
                    $filter->map(function ($set) use ($route_current) {
                        if ($set->href) return $set;
                        $class = "class=act";
                        $set->class_active = "";
                        $params_url = $set->page_url ? json_decode($set->page_url, true) : [];
                        $set->metaData = $set->metaData ? json_decode($set['metaData'], true) : [];
                        $url = !empty($metaData['url']) ? $metaData['url'] : '/';
                        if (auth()->check()) {
                            $set->class = str_replace('group1', '', $set->class);
                        }
                        if (Str::contains($set->class, 'group1')) {
                            $set->href = route('singIn');
                        } elseif ($set->type == 'url') {
                            $set->href = $set['base_url'];
                        } else {
                            $set->href = $set['base_url'] ? route($set['base_url'], $params_url) : "#";
                        }
                        if (!empty($set['base_url']) && $set['base_url'] == $route_current) {
                            $set->class_active = $class;
                        } elseif (!empty($set['base_url']) && $set['base_url'] != 'home') {

                            $current = explode('/', $route_current);
                            $set_current = explode('/', $set['base_url']);
                            $array = $set_current + $current;
                            $path = implode('/', $array);
                            if ($route_current == $path) {
                                $set->class_active = $class;
                            }

                        }
                    });
                     $menu = collect($menu)->put('menus',$filter);
                    $list_menu[data_get($menu,'position')] = $menu;
                }
                $view->title_menu = null;
                foreach (data_get($list_menu, 'main_menu.menus') as $menu_main) {
                    if ($menu_main->base_url == $view->routeName)
                        $view->title_menu = $menu_main->title;
                }
                $view->menus = $list_menu;
            }

        });
    }
}
