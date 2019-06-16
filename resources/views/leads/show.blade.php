@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="/css/normalize.min.css">

    <link rel='stylesheet prefetch' href='/css/jquery-ui.css'>
    <link rel="stylesheet" href="{{url('/css/lead_show.css')}}">
@endsection
@section('content')



    <div class="changepass">
        <section class="breadcrumb info-breadcrumb">
            <div class="container">
                <span class="right-align">{{__("messages.You are here")}} : </span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span itemprop="title">{{ __("messages.Home")}}</span></a>
                </div>

                @foreach ($category->ancestors as $breadcrumb)
                    <i class="right-align icon-angle-left"></i>
                    <div class="right-align left-margin" itemscope=""
                         itemtype="{{route('home.categories',['slug_categories'=>$breadcrumb->getCategorySlug()])}}">
                        <a href="{{route('home.categories',['slug_categories'=>$breadcrumb->getCategorySlug()])}}"
                           itemprop="url">
                            <span itemprop="title">{{$breadcrumb->getCategoryTitle()}}</span></a>
                    </div>
                @endforeach
                <i class="right-align icon-angle-left"></i>
                <div class="right-align left-margin" itemscope=""
                     itemtype="{{route('home.categories',['slug_categories'=>$category->getCategorySlug()])}}">
                    <a href="{{route('home.categories',['slug_categories'=>$category->getCategorySlug()])}}"
                       itemprop="url">
                        <span itemprop="title">{{$category->getCategoryTitle()}}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="#">
                    <span itemprop="title"><strong>{{$lead->name}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="Buyer-Info-wrapper">
            <div class="container">
                @if($lead['ad_type']==1 || $membership)
                    <div class="img">
                        <figure><a href="{{ route('home.companies.info', ['slug_companies'=>$lead->user->slug])}}">
                                <img src="{{url('images/logo/'.$lead->user->company_logo)}}"
                                     width="120px" height="120px" alt="">
                            </a></figure>
                    </div>
                @endif

                @if($lead['ad_type']==1)
                    <p class="info">{{ __("messages.Seller Info")}}:</p>
                @elseif($lead['ad_type']==2)
                    <p class="info">{{ __("messages.Buyer Info")}}:</p>
                @endif
                <p class="company"><b>
                        @if($lead['ad_type'] == 1 || $lead['ad_type']=='sell' || $membership)
                            <a href="{{ route('home.companies.info', ['slug_companies'=>$lead->user->slug])}}"
                               class="uo">{{$lead->user->getCompanyName()}}</a>
                        @elseif ($lead['ad_type'] == 2 || $lead['ad_type']=='buy')
                            {{__('messages.Buyer')."  ".$lead->user->first_name}}
                        @endif
                        -</b> <i class="weight300">
                        @if($lead->user->sellers )

                            @foreach($lead->user->sellers as $i=>$seller)
                                <span>  {{$i!=0?'-':""}}{{__('messages.'.$seller->title)}}</span>
                            @endforeach
                        @endif
                    </i></p>
                <a href="{{route('members.request.send',['slug_leads'=>$lead->product_friendly_url])}}" class="btnsend">
                    <i class="icon-email"></i>{{ __("messages.Send Enquiry")}}</a>
            </div>
        </section>
        <section class="contentinnerwrapper">
            <div class="container">
                <div class="row">
                    <div class="{{($lead->ad_type = "sell")?"col-lg-9 col-sm-9 col-md-9":"col-lg-12 col-sm-12 col-md-12"}} col-xs-12">

                        <div class="topboxinner">
                            <h3>{{$lead->name}}</h3>
                            <p class="typep">{{ __("messages.For")}} {{__("messages.".$lead->ad_type)}}</p>
                            <div class="bodyboxinner">
                                <p> {!! $lead->deascription !!}</p>
                                <p> {!! $lead->detail_description !!}</p>
                            </div>
                        </div>
                    </div>
                    @if($lead->ad_type == "sell")
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                            <!-- Gallery -->
                            <div id="js-gallery" class="gallery">
                                <img id="zoom_03"
                                     src="{{url('/images/medias/photos/'.$lead->medias->first()->media)}}"
                                     data-zoom-image="{{url('/images/medias/photos/'.$lead->medias->first()->media)}}"/>

                                <div id="gallery_01">
                                    @foreach ($lead->medias as $media)
                                        <a href="#"
                                           data-image="{{url('/images/medias/photos/'.$media->media)}}"
                                           data-zoom-image="{{url('/images/medias/photos/'.$media->media)}}">
                                            <img id="img_0{{$media->sort_order}}"
                                                 src="{{url('/images/medias/photos/'.$media->media)}}"
                                                 width="100" height="100"/>
                                        </a>
                                    @endforeach


                                </div>
                            </div><!--.gallery-->
                            <!-- Gallery -->

                        </div>
                    @endif
                </div>
                <div class="container">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent leaddetailsdiv">
                        <h2 class="title-cat">{{ __("messages.Other Leads from this Company")}}</h2>
                        <div class="ads_type">
                            @if($ad_type == "buy" || $membership)
                                <a href="{{url()->current().'?ad_type=buy'}}" {{ $ad_type == "buy"? 'class=act':''}} >{{ __("messages.Buy Leads")}}</a>
                                @endif
                                @if($ad_type == "sell" || $membership)
                                    <a href="{{url()->current().'?ad_type=sell'}}" {{ $ad_type == "sell"? 'class=act':''}}>{{ __("messages.Sell Leads")}}</a>
                                @endif
                        </div>
                        <div class="ts_inr_list companies">
                            <ul>
                                @foreach ($leads as $item)
                                    <li>
                                        <div class="title">
                                            <p class="title-company"><a
                                                        href="{{route('home.leads.show',['slug_categories'=>$item->categories->first()->getCategorySlug(),'slug_leads'=> $item->product_friendly_url])}}"
                                                        class="uo">{{$item['productName']}}</a></p>
                                            <p class="location">{{$lead->user->city->getName()}}
                                                , {{$lead->user->country->getName()}}</p>
                                        </div>
                                        <p class="textcompanies"><b>
                                                @if($item->ad_type =='sell' || $membership)
                                                    <a href="{{ route('home.companies.info', ['slug_companies'=>$item->user->slug])}}"
                                                       class="uo">{{$item->user->getCompanyName()}}</a>
                                                @elseif ( $item->ad_type =='buy')
                                                    {{__('messages.Buyer')."  ".$item->user->first_name}}
                                                @endif
                                                -</b> <span class="gray">
                                                    @if($lead->user->sellers )

                                                    @foreach($lead->user->sellers as $i=>$seller)
                                                        <span>  {{$i!=0?'-':""}}{{__('messages.'.$seller->title)}}</span>
                                                    @endforeach
                                                @endif
                                                </span></p>
                                        <div class="bodylead">
                                            <p class="typelead">{{ __("messages.For")}} {{__("messages.".($item->ad_type))}}</p>
                                            <p class="textlead">{{$item->description}}</p>
                                            <a href="{{route('members.request.send',['slug_leads'=>$lead->product_friendly_url])}}"
                                               class="btnsend"><i
                                                        class="icon-email"></i>{{ __("messages.Send Enquiry")}}</a>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="ordering">
                            <div class="col-sm-3 col-xs-12">
                                <span class="totlpage">{{ __("messages.Totals Lead")}} : {{$countItem}}</span>

                            </div>
                            <div class="col-sm-9 col-xs-12">
                                <!--                        <div class="two paging">-->
                                <!--                            <a href="#" class="act">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a>... <a href="#">&lt;&lt;</a> <a href="#">&gt;&gt;</a>-->
                                <!--                        </div>-->
                                {{$leads->links()}}
                            </div>
                        </div>

                        @include('banner_middle',['offset'=>0,'limit' => 1])
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12  left-sidebar-inner">
                        @include('leads.featured_vertical')
                        @include('banner_left',['offset'=>0,'limit' => 5])
                    </div>


                </div>

            </div>

        </section>

    </div>
    @include('banner_button')




@endsection
@section('javascript')
    <script>
        var App = (function () {

            //=== Use Strict ===//
            'use strict';

            //=== Private Variables ===//
            var gallery = $('#js-gallery');

            //=== Gallery Object ===//
            var Gallery = {
                zoom: function (imgContainer, img) {
                    var containerHeight = imgContainer.outerHeight(),
                        src = img.attr('src');

                    if (src.indexOf('/products/normal/') != -1) {
                        // Set height of container
                        imgContainer.css("height", containerHeight);

                        // Switch hero image src with large version
                        img.attr('src', src.replace('/products/normal/', '/products/zoom/'));

                        // Add zoomed class to gallery container
                        gallery.addClass('is-zoomed');

                        // Enable image to be draggable
                        img.draggable({
                            drag: function (event, ui) {
                                ui.position.left = Math.min(100, ui.position.left);
                                ui.position.top = Math.min(100, ui.position.top);
                            }
                        });
                    } else {
                        // Ensure height of container fits image
                        imgContainer.css("height", "auto");

                        // Switch hero image src with normal version
                        img.attr('src', src.replace('/products/zoom/', '/products/normal/'));

                        // Remove zoomed class to gallery container
                        gallery.removeClass('is-zoomed');
                    }
                },
                switch: function (trigger, imgContainer) {
                    var src = trigger.attr('href'),
                        thumbs = trigger.siblings(),
                        img = trigger.parent().prev().children();

                    // Add active class to thumb
                    trigger.addClass('is-active');

                    // Remove active class from thumbs
                    thumbs.each(function () {
                        if ($(this).hasClass('is-active')) {
                            $(this).removeClass('is-active');
                        }
                    });

                    // Reset container if in zoom state
                    if (gallery.hasClass('is-zoomed')) {
                        gallery.removeClass('is-zoomed');
                        imgContainer.css("height", "auto");
                    }

                    // Switch image source
                    img.attr('src', src);
                }
            };

            //=== Public Methods ===//
            function init() {

                // Listen for clicks on anchors within gallery
                gallery.delegate('a', 'click', function (event) {
                    var trigger = $(this);
                    var triggerData = trigger.data("gallery");

                    if (triggerData === 'zoom') {
                        var imgContainer = trigger.parent(),
                            img = trigger.siblings();
                        Gallery.zoom(imgContainer, img);
                    } else if (triggerData === 'thumb') {
                        var imgContainer = trigger.parent().siblings();
                        Gallery.switch(trigger, imgContainer);
                    } else {
                        return;
                    }

                    event.preventDefault();
                });

            }

            //=== Make Methods Public ===//
            return {
                init: init
            };

        })();

        App.init();
    </script>
    <script src='/js/jquery.elevatezoom.js'></script>
    <script>
        //initiate the plugin and pass the id of the div containing gallery images
        $("#zoom_03").elevateZoom({
            gallery: 'gallery_01',
            cursor: 'pointer',
            galleryActiveClass: 'active',
            imageCrossfade: true,
            loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
        });

        //pass the images to Fancybox
        $("#zoom_03").bind("click", function (e) {
            var ez = $('#zoom_03').data('elevateZoom');
            $.fancybox(ez.getGalleryList());
            return false;
        });
    </script>
@endsection
