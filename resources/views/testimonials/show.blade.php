@extends('layouts.main')
@section('css')

@endsection
@section('content')
    <div class="changepass testimonialbody">
        <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{__("messages.You are here")}} :</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{__("messages.Home")}}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="">
                    <a href="{{ route('testimonials') }}" itemprop="url"><span itemprop="title"><strong>{{__("messages.Testimonial")}}</strong></span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="">
                    <span itemprop="title"><strong>{{__("messages.Testimonial Details")}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper testmonialwrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{__("messages.Testimonials")}}</h2>

                        <div class="mp_cont bt news_container_inr">
                            <ul>
                                <li>
                                    <i class="icon-comments"></i>
                                    <div class="news_text">
                                        <p class="title">{{$testimonial->poster_name}}<span> {{__("messages.Says")}}</span>
                                            :</p>
                                        <p class="date">{{__('messages.Posted on')}}
                                            : {{ app()->getLocale()== 'fa'?toJalali($testimonial->created_at):$testimonial->created_at}}</p>
                                        <p class="msgtestmonial">{{$testimonial->description}} </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ordering">
                            <a href="{{route('testimonials')}}"> <b
                                        class="blue1">« {{__("messages.Back to Testimonials")}}</b></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                        <!-- Testmonials -->
                        @include('testimonials.form_testimonial')
                        @include('banner_left',['offset'=>0,'limit' => 5])

                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('banner_button')

@endsection
@section('javascript')

@endsection
