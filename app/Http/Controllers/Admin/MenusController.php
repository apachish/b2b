<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\CategoryMenu;
use App\Lead;
use App\Menu;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryMenu::where('status',1)->get();
        $filter['category']=false;
        $filter['language']=false;
        $filter['type']=false;
        $menus = Menu::with('categoryMenu')->get();
        return view('admin.menus.index',compact('menus','categories','filter'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seller_type = config('global.seller_type');
        $category_menus = CategoryMenu::where('status',1)->get();

        return view('admin.menus.create',compact('seller_type','category_menus'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:100',
            'status' => 'required|boolean',
            'locale'=>'required',
            'type'=>'required'
        ]);
        $base_url = '';
        $data = $request->all();
        if($request->type){
            switch ($request->type){
                case 'category':
                    if(!empty($request->type_category)){
                        $base_url = 'home/'.$request->type_category;
                        $data['metaData']['type_category'] = $request->type_category;

                    }
                    else{
                        $base_url = 'home.categories';
                    }
                    $category = [];
                    if(isset($request->category_item))
                        $category = Category::find($request->category_item);
                    if(isset($request->sub_category))
                        $category = Category::find($request->sub_category);
                    if(isset($request->sub_sub_category))
                        $category = Category::find($request->sub_sub_category);
                    if($category instanceof Category){
                        $data['metaData']['value'] = $category->id;
                        $data['metaData']['title'] = $category->name;
                        $data['metaData']['title_fa'] = $category->name_fa;
                        $data['metaData']['url'] = $base_url.'/'. $category->getCategoryId();
                        $data['page_url'] = json_encode(['id'=>$category->id]) ;
                    }else{
                        $data['metaData']['value'] = "";
                        $data['metaData']['title'] = "";
                        $data['metaData']['url'] = $base_url;
                        $data['page_url'] = json_encode([]) ;
                    }
                    break;
                case 'product':
                    $base_url = 'home.products';
                    if(!empty($request->product)){
                        $product = Lead::find($request->product);
                        if($product instanceof Lead){
                            $data['metaData']['value'] = $product->id;
                            $data['metaData']['title'] = $product->name;
                            $data['metaData']['url'] = $base_url.'/'. $product->id;
                            $data['page_url'] = json_encode(['id'=>$product->id]) ;
                        }else{
                            $data['metaData']['value'] = "";
                            $data['metaData']['title'] = "";
                            $data['metaData']['url'] = $base_url;
                            $data['page_url'] = json_encode([]) ;
                        }
                    }
                    break;
                case 'article':
                    $base_url = 'home.articles';
                    if(!empty($request->article)){
                        $article =Article::find($request->article);
                        if($article instanceof Article){
                            $data['metaData']['value'] = $article->id;
                            $data['metaData']['title'] = $article->titile;
                            $data['metaData']['url'] = $base_url.'/'. $article->id;
                            $data['page_url'] = json_encode(['id'=>$article->id]) ;
                        }else{
                            $data['metaData']['value'] = "";
                            $data['metaData']['title'] = "";
                            $data['metaData']['url'] = $base_url;
                            $data['page_url'] = json_encode([]) ;
                        }
                    }
                    break;
                case 'page':
                    $base_url = 'home.pages';
                    if(!empty($request->page)){
                        $page = Page::find($request->page);
                        if($page instanceof Page){
                            $data['metaData']['value'] = $page->id;
                            $data['metaData']['title'] = $page->name;
                            $data['metaData']['url'] = $base_url.'/'.$page->friendly_url.'/'. $page->id;
                            $data['page_url'] = json_encode(['id'=>$page->id,'page'=>$page->friendly_url]) ;
                        }

                    }
                    break;
                case 'url':
                    $base_url = $request->url;

                    break;
                case 'main_page':
                    $base_url = 'home';

                    break;
                case 'sitemap':
                    $base_url = 'sitemap';

                    break;
                case 'testimonials':
                    $base_url = 'testimonials';

                    break;
                case 'help':
                    $base_url = 'help';

                    break;
                case 'newsletter':
                    $base_url = 'newsLetter';

                    break;
                case 'contact_us':
                    $base_url = 'contact_us';

                    break;
                case 'advertisement':
                    $base_url = 'advertisement';

                    break;
                case 'company':
                    $base_url = 'companies';
                    if(!empty($request->sellerType)){
                        $data['page_url'] = json_encode(['type'=>$request->sellerType]) ;
                        $data['metaData']['sellerType'] = $request->sellerType;
                    }
                    break;
                case 'member':
                    $base_url = 'members'.(!empty($request->member_link_item)?"/".$request->member_link_item:"");
                    if(!empty($request->member_link_item) && ($request->member_link_item=='post_lead' || $request->member_link_item=='newleads') && !empty($request->type_lead)){
                        $base_url .= "/type_ad";
                        $data['page_url'] = json_encode(['type_ad'=>$request->type_lead]) ;
                    }else{
                        $data['page_url'] = json_encode([]) ;

                    }
                    $data['metaData']['type_lead'] = !empty($request->type_lead)?$request->type_lead:"";
                    $data['metaData']['member_link_item'] = !empty($request->member_link_item)?$request->member_link_item:"";
                    break;

            }
            $data['base_url'] = $base_url;
            $data['metaData'] = json_encode(isset($request->metaData)?$request->metaData:[]);
            $menu = Menu::created($data);

        }
        return redirect('/admin/menus');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        if($menu== null) abort(404);
        $seller_type = config('global.seller_type');
        $category_menus = CategoryMenu::where('status',1)->get();
        $page=[];
        if(!empty($menu['metaData'])) {
            $page = json_decode($menu['metaData'], true);
        }


        return view('admin.menus.edit',compact('menu','page','category_menus','seller_type'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|max:100',
            'status' => 'required|boolean',
            'locale'=>'required',
            'type'=>'required'
        ]);
        $menu = Menu::find($id);
        if($menu== null) abort(404);
        $base_url = '';
        $data = $request->all();
        if($request->type){
            switch ($request->type){
                case 'category':
                    if(!empty($request->type_category)){
                        $base_url = 'home/'.$request->type_category;
                        $data['metaData']['type_category'] = $request->type_category;

                    }
                    else{
                        $base_url = 'home.categories';
                    }
                    $category = [];
                    if(isset($request->category_item))
                        $category = Category::find($request->category_item);
                    if(isset($request->sub_category))
                        $category = Category::find($request->sub_category);
                    if(isset($request->sub_sub_category))
                        $category = Category::find($request->sub_sub_category);
                    if($category instanceof Category){
                        $data['metaData']['value'] = $category->id;
                        $data['metaData']['title'] = $category->name;
                        $data['metaData']['title_fa'] = $category->name_fa;
                        $data['metaData']['url'] = $base_url.'/'. $category->getCategoryId();
                        $data['page_url'] = json_encode(['id'=>$category->id]) ;
                    }else{
                        $data['metaData']['value'] = "";
                        $data['metaData']['title'] = "";
                        $data['metaData']['url'] = $base_url;
                        $data['page_url'] = json_encode([]) ;
                    }
                    break;
                case 'product':
                    $base_url = 'home.products';
                    if(!empty($request->product)){
                        $product = Lead::find($request->product);
                        if($product instanceof Lead){
                            $data['metaData']['value'] = $product->id;
                            $data['metaData']['title'] = $product->name;
                            $data['metaData']['url'] = $base_url.'/'. $product->id;
                            $data['page_url'] = json_encode(['id'=>$product->id]) ;
                        }else{
                            $data['metaData']['value'] = "";
                            $data['metaData']['title'] = "";
                            $data['metaData']['url'] = $base_url;
                            $data['page_url'] = json_encode([]) ;
                        }
                    }
                    break;
                case 'article':
                    $base_url = 'home.articles';
                    if(!empty($request->article)){
                        $article =Article::find($request->article);
                        if($article instanceof Article){
                            $data['metaData']['value'] = $article->id;
                            $data['metaData']['title'] = $article->titile;
                            $data['metaData']['url'] = $base_url.'/'. $article->id;
                            $data['page_url'] = json_encode(['id'=>$article->id]) ;
                        }else{
                            $data['metaData']['value'] = "";
                            $data['metaData']['title'] = "";
                            $data['metaData']['url'] = $base_url;
                            $data['page_url'] = json_encode([]) ;
                        }
                    }
                    break;
                case 'page':
                    $base_url = 'home.pages';
                    if(!empty($request->page)){
                        $page = Page::find($request->page);
                        if($page instanceof Page){
                            $data['metaData']['value'] = $page->id;
                            $data['metaData']['title'] = $page->name;
                            $data['metaData']['url'] = $base_url.'/'.$page->friendly_url;
                            $data['page_url'] = json_encode(['page'=>$page->friendly_url]) ;
                        }

                    }
                    break;
                case 'url':
                    $base_url = $request->url;

                    break;
                case 'main_page':
                    $base_url = 'home';

                    break;
                case 'sitemap':
                    $base_url = 'sitemap';

                    break;
                case 'testimonials':
                    $base_url = 'testimonials';

                    break;
                case 'help':
                    $base_url = 'help';

                    break;
                case 'newsletter':
                    $base_url = 'newsLetter';

                    break;
                case 'contact_us':
                    $base_url = 'contact_us';

                    break;
                case 'advertisement':
                    $base_url = 'advertisement';

                    break;
                case 'company':
                    $base_url = 'companies';
                    if(!empty($request->sellerType)){
                        $data['page_url'] = json_encode(['type'=>$request->sellerType]) ;
                        $data['metaData']['sellerType'] = $request->sellerType;
                    }
                    break;
                case 'member':
                    $base_url = 'members'.(!empty($request->member_link_item)?"/".$request->member_link_item:"");
                    if(!empty($request->member_link_item) && ($request->member_link_item=='post_lead' || $request->member_link_item=='newleads') && !empty($request->type_lead)){
                        $base_url .= "/type_ad";
                        $data['page_url'] = json_encode(['type_ad'=>$request->type_lead]) ;
                    }else{
                        $data['page_url'] = json_encode([]) ;

                    }
                    $data['metaData']['type_lead'] = !empty($request->type_lead)?$request->type_lead:"";
                    $data['metaData']['member_link_item'] = !empty($request->member_link_item)?$request->member_link_item:"";
                    break;

            }
            $data['base_url'] = $base_url;
            $data['metaData'] = json_encode(isset($request->metaData)?$request->metaData:[]);
            $menu->update($data);

        }
        return redirect('/admin/menus');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
