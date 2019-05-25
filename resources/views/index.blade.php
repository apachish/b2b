@extends('layouts.main')

@section('content')
    <section class=" wrappercontent">
        <div class="container">
            <div class="">
                <div id="blog-sidebar" class="col-lg-3 hidden-md  hidden-sm right-sidebar hidden-xs">

                    @include('menu_category')
                    @include('banner_right')

                </div>
                <div id="blog-main" class="col-lg-9 col-md-12 col-xs-12 col-sm-12 ">
                    <div class="row">
                        @include('home_scrolling')
                        @include('articles')
                    </div>
                    <div class="leads row">
                        @include('leads_list',['leads'=>$leads_buy,'class'=>'rightlead','title_lead'=>__('messages.New Buying Leads'),'type'=>'buy','scroll_class'=>'lead_scroll1'])
                        @include('leads_list',['leads'=>$leads_sell,'class'=>'leftlead','title_lead'=>__('messages.New Selling Leads'),'type'=>'sell','scroll_class'=>'lead_scroll2'])
                    </div>
                    <div class="row">
                        <div class="buttom-lead col-lg-9 col-md-12 col-xs-12 col-sm-9">
                            @if ($products_featured)
                                <div class="hidden-xs products-home col-lg-12">
                                    <p class="morelink products-home-more"><a
                                                href="{{route('home.featured',['select'=>'all'])}}"
                                                title="View All">{{ __("messages.View All")}} </a>
                                    </p>
                                    <h3 class="title-cat products-home-title">{{__("messages.Featured Products")}}</h3>
                                    <!--list row 1-->
                                    @include('leads.featured_slider',['offset' => 0, 'limit' => 10,'index'=>1])
                                    @include('leads.featured_slider',['offset' => 10, 'limit' => 20,'index'=>2])
                                    @include('leads.featured_slider',['offset' => 20, 'limit' => 300,'index'=>3])
                                </div>
                        @endif
                        <!-- End Product Home -->
                            <!-- Categories Home -->
                        @include('box_category')
                        <!-- End Categories -->
                            <!--Special Product -->
                        @include('companies.company_featured',[ 'company_featured_type' => 2,'category_slug'=>null])


                        <!-- End Special -->
                        </div>
                        <div class="innerleftsidebar col-lg-3 hidden-md col-xs-12 hidden-sm">

                        @include('banner_left',['offset'=>0,'limit' => 5])

                        <!-- Testmonials -->
                        @include('testimonials.scroll-side')

                        <!-- End Testmonials -->
                            @include('banner_left',['offset'=>5,'limit' => 6])

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
            <p class="title-newsletter">{{__("messages.NEWSLETTER")}}</p>
            <p class="des-newsletter">{{__("messages.Enter your email address to sign up for our special offers and product promotions")}}</p>
            <div class="newletterform">
                <form id="newletterform" action="{{route('newsLetter')}}" method="post">
                    <input name="subscriberName" type="text" class="textbox-newsletter" id="letter_name"
                           placeholder="{{__("messages.FullName")}}">
                    <input name="subscriberEmail" type="email" class="textbox-newsletter" id="letter_email"
                           placeholder="{{__("messages.Email Address")}}">
                    <input name="captcha_newsletter" id="verification_code_newsletter" type="text"
                           autocomplete="off"
                           placeholder="{{__("messages.Enter the security code")}}"
                           class="textbox-newsletter captcha">
                    <img src="{{captcha_src('flat')}}"
                         class="vam ml10 reCaptcha-img" alt="" id="captchaimage"/>
                    <a href="javascript:false;" title="Change Verification Code">
                        <img src="/images/ref2.png"
                             alt="Refresh"
                             onclick=" document.getElementById('verification_code_newsletter').value=''; document.getElementById('verification_code_newsletter').focus(); return true;"
                             class="vam ml5 reCaptcha">
                    </a>
                    <button class="btn-sub btn-letter" name="status" value=1
                            type="submit">{{__("messages.Subscribe")}}</button>
                    <button class="btn-sub btn-unsub btn-letter" name="status" value=0
                            type="submit">{{__("messages.Unsubscribe")}}</button>
                    <img src="/images/loading.gif" id="loding_email"
                         style="width: 30px;height: 30px;display: none"/>


                </form>
            </div>
        </div>
        @if (data_get($articles,1))
            <div class="container aboutus">
                <p class="morelink"><a href="{{route("home.articles.details", ["slug" => $articles[1]->slug])}}"
                                       title="Read More" class="more-about">{{__("messages.More")}}</a></p>
                <h3 class="title-cat">{{$articles[1]->title}} </h3>
                <p class="des-about">{{$articles[1]->description}}</div>
        @endif

        @include('banner_button')
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