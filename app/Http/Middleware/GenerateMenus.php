<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
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

        \Menu::make('MyNavBar', function ($menu) {
            $menu->add('Dashboard',['route'  => 'dashbord']);
            $category = $menu->add('Category Management',    ['url'  => 'admin/categories  ']);
            $category->add('Category','category' , ['url'  => 'admin/categories  ']);
            $category->add('Bulk Upload Category','bulkupload');
            $leads = $menu->add('Manage Leads');
            $leads->add('Leads');
            $leads->add('Manage Enquiry/Feedback');
            $leads->add('Bulk Upload Product');
            $articles = $menu->add('Article Management');
            $articles->add('Articles');
            $articles->add('Comments');
            $members = $menu->add('Members Management');
            $members->add('Members');
            $members->add('Membership');
            $members->add('Membership Orders');
            $location = $menu->add('Location Management');
            $location->add('Countries');
            $location->add('States');
            $location->add('Cities');
            $menu = $menu->add('Manage Menu');
            $menu->add('Category');
            $menu->add('Menus');
            $menu->add('NewsLetter');
            $other = $menu->add('Other Management');
            $other->add('Static Pages');
            $other->add('Mail Contents');
            $other->add('Manage Enquiry/Bug');
            $other->add('Manage Requst A Call');
            $other->add('Banners');
            $other->add('Manage Advertise');
            $other->add('Manage Testimonial');
            $other->add('Manage Help');
            $other->add('Portals');
            $other->add('Translator');
            $other->add('Sliders');
            $other->add('Search list');
        });
        return $next($request);
    }
}
