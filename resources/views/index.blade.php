@extends('layouts.main')

@section('content')
    <section class=" wrappercontent">
        <div class="container">
            <div class="">
                <div id="blog-sidebar" class="col-lg-3 hidden-md  hidden-sm right-sidebar hidden-xs">
                    <p class="morelink"><a href="{{route("home.categories")}}"
                                           title="View All">{{ __("View All") }}</a></p>
                    <h3 class="title-cat">{{ __("Categories") }}</h3>
                    <div class="wrap">
                        <div class="demo-container right clear">
                            <div class="dcjq-vertical-mega-menu">
                                <ul id="mega-2" class="mega-menu ">

                                </ul>
                            </div>
                        </div>
                    </div>
                    @if($banner_right)
                        <div class="right-sideimg">
                            {{$banner_right}}
                        </div>
                    @endif
                </div>
                <div id="blog-main" class="col-lg-9 col-md-12 col-xs-12 col-sm-12 ">
                    <div class="row">

                        <div class="slider col-lg-8 col-md-8 col-xs-12">
                            @if ($home_scrolling)
                                <div class="fluid_container">
                                    <div class="fluid_dg_wrap fluid_dg_charcoal_skin fluid_container"
                                         id="fluid_dg_wrap_1">
                                        @foreach ($home_scrolling as $j => $scroll)
                                            @if (!empty($scroll->src))
                                                <div data-src="{{$scroll->src}}"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if (!empty($articles))
                            <div class="articles col-lg-4 col-md-4 col-xs-12">
                                <p class="morelink"><a href="{{route('articles')}}"
                                                       title="View All">{{__("View All")}}  </a></p>
                                <h3 class="title-cat">{{__("Articles")}}  </h3>
                                <div class="bodyarticles">
                                    <p class="art-title"><a
                                                href="{{route('articles',['id'=>$articles->id])}}">{{$articles->title}}</a>
                                    </p>
                                    <p class="art-date">{{ __("Posted on")}}
                                        : {{$articles->updated_at}}
                                        - {{__("by")}} {{$article->last_modified_by}}</p>

                                    <p class="art-des">{{$article->description}},....</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="leads row">
                        <div class="rightlead col-lg-6 col-md-6 col-xs-12">
                            <div class="leadsbody">
                                <h3 class="title-leads">{{__('New Buying Leads')}}<a
                                            href="{{route("home.products", ['type' => 'buy'])}}"
                                            class="allleads">{{$count_buy}}</a></h3>
                                <a class="morelead_buy"
                                   href="{{route('home.products', ['type' => 'buy'])}}">{{__('View All')}}
                                </a>
                                <div style="height:120px;" class="rel o-hid">
                                    <div class="{{$count_buy>= 10 ?"lead_scroll1":"" }} body-leads">
                                        <ul class="leads_list">
                                            @foreach ($buy_leads as $buy)
                                                <li>
                                                    <a href="{{route('leads',['id'=>$buy->id,'category_id'=> $buy->category->id])}}"
                                                       title="">{{$buy->tittle}}<span
                                                                class="date-lead">{{$buy->publish_at}}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <a class="more-leads {{ auth()->check()?"":"group1"}}"
                                   href="{{auth()->check()?route('members/post_lead/type_ad',['type_ad' => 'buy']):route('singUp') }}"

                                   title="{{auth()->check() ? __('Post Buying Leads') : __('Sign In')}}">{{__('Post Buying Leads')}}</a>

                            </div>
                        </div>
                        <div class="leftlead col-lg-6 col-md-6 col-xs-12">
                            <div class="leadsbody">
                                <h3 class="title-leads">{{__('New Selling Leads')}}<a
                                            href="{{route("home.products", ['type' => 'sell'])}}"
                                            class="allleads">{{$count_sell}}</a></h3>
                                <a class="morelead_sell"
                                   href="{{route('home.products', ['type' => 'buy'])}}">{{__('View All')}}
                                </a>
                                <div style="height:120px;" class="rel o-hid">
                                    <div class="{{$count_buy>= 10 ?"lead_scroll2":"" }}  body-leads">
                                        <ul class="leads_list">
                                            @foreach ($sell_leads as $sell)
                                                <li>
                                                    <a href="{{route('leads',['id'=>$sell->id,'category_id'=> $sell->category->id])}}"
                                                       title=""> {{$sell->title}} <span
                                                                class="date-lead">{{$buy->publish_at}}</span></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <a class="more-leads {{ auth()->check()?"":"group1"}}"
                                   href="{{auth()->check()?route('members/post_lead/type_ad',['type_ad' => 'sell']):route('singUp') }}"

                                   title="{{auth()->check() ? __('Post Selling Leads') : __('Sign In')}}">{{__('Post Selling Leads')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="buttom-lead col-lg-9 col-md-12 col-xs-12 col-sm-9">
                            @if ($products_featured1 || $products_featured2 || $products_featured3)
                                <div class="hidden-xs products-home col-lg-12">
                                    <p class="morelink products-home-more"><a
                                                href="{{route('home/featured',['select'=>'all'])}}"
                                                title="View All">{{ __("View All")}} </a>
                                    </p>
                                    <h3 class="title-cat products-home-title">{{__("Featured Products")}}</h3>
                                    <!--list row 1-->
                                    @include('leads.featured_slider',['products_featured' => $products_featured1, 'index' => 1])
                                    @include('leads.featured_slider',['products_featured' => $products_featured2, 'index' => 2])
                                    @include('leads.featured_slider',['products_featured' => $products_featured3, 'index' => 3])
                                </div>
                        @endif
                        <!-- End Product Home -->
                            <!-- Categories Home -->
                            <div class="categories-home">
                                <p class="morelink"><a href="{{route('home.categories')}}" title="{{ __("View All") }}"
                                                       class="allcat">{{ __("View All") }}</a></p>
                                <h3 class="title-cat">{{__("Category") }}</h3>
                                @if ($categories)
                                    @foreach ($categories as $i => $category):
                                    @if ($i == 6)
                                        @break

                                    @endif
                                    @if ($i % 3 == 0)
                                        <div>
                                            @endif

                                            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 cat-list-home">
                                                <a href="{{route("home.categories", ["id" => $category["categoryId"]])}}"
                                                   title="{{ $category->title}}"
                                                   class="title-cat">{{ $category->title}}</a>
                                                <div class="cat_box">
                                                    <a class="cat-img"
                                                       href="{{route("home.categories", ["id" => $category->id])}}"
                                                       title="{{ $category->title}}">
                                                        <img src="{{url('images/category'.$category->image)}}"
                                                             width="173" height="80"
                                                             alt="{{$category->title}}">
                                                    </a>
                                                    <ul class="cat_links">
                                                        @foreach ($category['subcategory'] as $s=>$subcategory)
                                                            @if ($s == 4)
                                                                @break
                                                            @endif

                                                            <li class="cat-list"><a
                                                                        href="{{route("home.categories", ["id" => $category->id])}}"
                                                                        title="{{$subcategory->title}}">{{$subcategory->title}}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @if ($i % 3 == 2)
                                        </div>
                                    @endif
                                    @endforeach
                                @endif
                            </div>
                            <!-- End Categories -->
                            <!--Special Product -->
                        @include('companies.company_featured',['company_featured' => $companies, 'company_featured_type' => 2])


                        <!-- End Special -->
                        </div>
                        <div class="innerleftsidebar col-lg-3 hidden-md col-xs-12 hidden-sm">
                        @if ($banner_left)
                            <!--Left Sidebar Images -->
                                <div class="imgleftsidebar">
                                    {{$banner_left}}
                                </div>
                                <!-- End Left Sidebar Images -->
                        @endif

                        <!-- Testmonials -->
                        @include('testimonials.scroll-side')

                        <!-- End Testmonials -->
                            <div class="imgleftsidebar">
                                {{$banner_left_2}}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- LEFT ENDS -->
    </section>
    <!-- MIDDLE ENDS -->
    <section id="blog-footer" class="btm-content">
        <div class="container newsletter">
            <p class="title-newsletter">{{__("NEWSLETTER")}}</p>
            <p class="des-newsletter">{{__("Enter your email address to sign up for our special offers and product promotions")}}</p>
            <div class="newletterform">
                <form id="newletterform" action="{{route('newsLetter')}}" method="post">
                    <input name="subscriberName" type="text" class="textbox-newsletter" id="letter_name"
                           placeholder="{{__("FullName")}}">
                    <input name="subscriberEmail" type="email" class="textbox-newsletter" id="letter_email"
                           placeholder="{{__("Email Address")}}">
                    <input name="captcha_newsletter" id="verification_code_newsletter" type="text"
                           autocomplete="off"
                           placeholder="{{__("Enter the security code")}}"
                           class="textbox-newsletter captcha">
                    <img src="{{captcha_src('flat')}}"
                         class="vam ml10" alt="" id="captchaimage"/>
                    <a href="javascript:false;" title="Change Verification Code">
                        <img src="/images/ref2.png"
                             alt="Refresh"
                             onclick="document.getElementById('captchaimage').src='{{ captcha_src('flat')}}'; document.getElementById('verification_code_newsletter').value=''; document.getElementById('verification_code_newsletter').focus(); return true;"
                             class="vam ml5">
                    </a>
                    <button class="btn-sub btn-letter" name="status" value=1
                            type="submit">{{__("Subscribe")}}</button>
                    <button class="btn-sub btn-unsub btn-letter" name="status" value=0
                            type="submit">{{__("Unsubscribe")}}</button>
                    <img src="/images/loading.gif" id="loding_email"
                         style="width: 30px;height: 30px;display: none"/>


                </form>
            </div>
        </div>
        @if ($articles)
            <div class="container aboutus">
                <p class="morelink"><a href="{{route("home/articles", ["id" => $articles->id])}}"
                                       title="Read More" class="more-about">{{__("More")}}</a></p>
                <h3 class="title-cat">{{$articles->title}} </h3>
                <p class="des-about">{{$articles->description}}</div>
        @endif
    </section>
    @if($banner_button)
        <div class="bg-gray">
            <div class="wrapper ac">
                <!--        <img src="/images/b_bnr1.jpg" alt=""> <img src="/images/b_bnr2.jpg" class="ml5" alt="">-->
                {{$banner_button}}
            </div>
        </div>
    @endif
    <!--<script src="/old_js/jssor.slider-25.0.7.min.js" type="text/javascript"></script>-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#mega-2').dcVerticalMegaMenu({
                rowItems: '5',
                speed: '1',
                effect: 'show',
                direction: 'left'
            });

            // var jssor_1_SlideshowTransitions = [
            //     {$Duration: 4200, $Opacity: 5}
            // ];
            //
            // var jssor_1_options = {
            //     $AutoPlay: 1,
            //     $SlideshowOptions: {
            //         $Class: $JssorSlideshowRunner$,
            //         $Transitions: jssor_1_SlideshowTransitions,
            //         $TransitionsOrder: 1
            //     },
            //     $ArrowNavigatorOptions: {
            //         $Class: $JssorArrowNavigator$
            //     },
            //     $BulletNavigatorOptions: {
            //         $Class: $JssorBulletNavigator$
            //     }
            // };
            //
            // var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            //
            // /*#region responsive code begin*/
            //
            // /*remove responsive code if you don't want the slider scales while window resizing*/
            // function ScaleSlider() {
            //     var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            //     if (refSize) {
            //         refSize = Math.min(refSize, 980);
            //         jssor_1_slider.$ScaleWidth(refSize);
            //     }
            //     else {
            //         window.setTimeout(ScaleSlider, 30);
            //     }
            // }
            //
            // ScaleSlider();
            // $(window).bind("load", ScaleSlider);
            // $(window).bind("resize", ScaleSlider);
            // $(window).bind("orientationchange", ScaleSlider);

            /*#endregion responsive code end*/
        });
    </script>
@endsection
@section('javascript')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#mega-2').dcVerticalMegaMenu({
                rowItems: '5',
                speed: '1',
                effect: 'show',
                direction: 'left'
            });

            // var jssor_1_SlideshowTransitions = [
            //     {$Duration: 4200, $Opacity: 5}
            // ];
            //
            // var jssor_1_options = {
            //     $AutoPlay: 1,
            //     $SlideshowOptions: {
            //         $Class: $JssorSlideshowRunner$,
            //         $Transitions: jssor_1_SlideshowTransitions,
            //         $TransitionsOrder: 1
            //     },
            //     $ArrowNavigatorOptions: {
            //         $Class: $JssorArrowNavigator$
            //     },
            //     $BulletNavigatorOptions: {
            //         $Class: $JssorBulletNavigator$
            //     }
            // };
            //
            // var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            //
            // /*#region responsive code begin*/
            //
            // /*remove responsive code if you don't want the slider scales while window resizing*/
            // function ScaleSlider() {
            //     var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            //     if (refSize) {
            //         refSize = Math.min(refSize, 980);
            //         jssor_1_slider.$ScaleWidth(refSize);
            //     }
            //     else {
            //         window.setTimeout(ScaleSlider, 30);
            //     }
            // }
            //
            // ScaleSlider();
            // $(window).bind("load", ScaleSlider);
            // $(window).bind("resize", ScaleSlider);
            // $(window).bind("orientationchange", ScaleSlider);

            /*#endregion responsive code end*/
        });
    </script>

@endsection