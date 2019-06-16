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
                    <span itemprop="title"><strong>{{__("messages.Testimonial")}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper testmonialwrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{__('messages.Testimonials')}}</h2>
                        <div class="ordering">
                            <div class="col-sm-6 col-xs-12">
                                {{__("messages.Filter Records")}} :
                                <select name="filter" class="selectordering">
                                    <option selected value="15">15 {{__("messages.Records")}}</option>
                                    <option {{ $limit == "30" ? "selected" : "" }} value="30">
                                        30 {{__("messages.Records")}}</option>
                                    <option {{ $limit == "45" ? "selected" : "" }} value="45">
                                        45 {{__("messages.Records")}}</option>
                                    <option {{ $limit == "60" ? "selected" : "" }} value="60">
                                        60 {{__("messages.Records")}}</option>
                                    <option
                                        {{ $limit == "all" ? "selected" : "" }} value="all">{{__("messages.All Records")}}</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                {{$testimonials->links()}}
                            </div>
                        </div>
                        <div class="mp_cont bt news_container_inr">
                            <ul>
                                @foreach ($testimonials as $testimonial)
                                <li>
                                    <i class="icon-comments"></i>
                                    <div class="news_text">
                                        <p class="title">{{ $testimonial->poster_name}} {{__("messages.Says")}}
                                            :</p>
                                        <p class="date">{{__("messages.Posted on")}}
                                            : {{ app()->getLocale()== 'fa'?toJalali($testimonial->created_at):$testimonial->created_at}}</p>
                                        <p class="msgtestmonial">"{{$testimonial->description}}<b
                                                    class="blue1"><a
                                                        href="{{route('testimonials.show', ['slug' => $testimonial->slug])}}"> {{__("messages.read the rest")}}</a></b>
                                        </p>
                                    </div>
                                </li>


                                @endforeach
                            </ul>
                        </div>
                        <div class="ordering">
                            <div class="col-sm-6 col-xs-12">
                                {{__("messages.Filter Records")}} :
                                <select name="filter" class="selectordering">
                                    <option selected value="15">15 {{__("messages.Records")}}</option>
                                    <option {{ $limit == "30" ? "selected" : "" }} value="30">
                                        30 {{__("messages.Records")}}</option>
                                    <option {{ $limit == "45" ? "selected" : "" }} value="45">
                                        45 {{__("messages.Records")}}</option>
                                    <option {{ $limit == "60" ? "selected" : "" }} value="60">
                                        60 {{__("messages.Records")}}</option>
                                    <option
                                        {{ $limit == "all" ? "selected" : "" }} value="all">{{__("messages.All Records")}}</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                {{$testimonials->links()}}
                            </div>
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
    <script>
        $(document).ready(function () {
            $('.selectordering').on('change', function () {
                var limit = $(this).val();
                window.location = '{{route('testimonials')}}?limit=' + limit;
            })
        })
    </script>
@endsection
