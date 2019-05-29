@extends('layouts.main')
@section('csss')
    <style>
        .intro {
            margin: 10px;
            outline: 1px solid;
            color: #FFF;
            height: auto;
            overflow: auto;
        }

    </style>
@endsection
@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb">
        <div class="container">
            <span class="right-align">{{__('messages.You are here')}} :</span>
            <div class="right-align" itemscope="" itemtype="{{route('home')}}">
                <a href="{{route('home')}}" itemprop="url"><span
                            itemprop="title">{{__('messages.Home')}}</span></a>
            </div>
            <i class="right-align icon-angle-left"></i>
            <div class="right-align divinhere" itemscope="" itemtype="">
                <span itemprop="title"><strong>{{$page->name}}</strong></span>
            </div>
        </div>
    </section>
    <!-- TREE ENDS -->
    <section class="contentinnerwrapper">
        <div class="container">
            <h2 class="title-cat">{{$page->name}}</h2>
            <!-- tree ends -->
            <div class="innercontent">
                <div class="col-lg-8 col-sm-8 col-xs-12 col-md-8 intro">
                    {!!$page->description!!}
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12 col-md-3">
                    <!-- Testmonials -->
                @include('banner_left',['offset'=>0,'limit' => 5])

                <!-- Testmonials -->
                @include('testimonials.scroll-side')

                <!-- End Testmonials -->
                @include('banner_left',['offset'=>5,'limit' => 6])
                <!-- End Testmonials -->
                </div>


            </div>
        </div>
    </section>
    @include('banner_button')

@endsection
@section('javascript')
    <script type="text/javascript" src='{{asset('/js/article.js')}}'></script>
@endsection