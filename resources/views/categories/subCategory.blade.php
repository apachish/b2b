@extends('layouts.main')
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection
@section('content')
    <!-- breadcrumb -->
    <section class="breadcrumb">
        <div class="container">
            <span class="right-align">{{__("messages.You are here")}}   :</span>
            <div class="right-align" itemscope="" itemtype="{{route('home')}}">
                <a href="{{route('home')}}" itemprop="url"><span
                            itemprop="title">{{ __("messages.Home")}}</span></a>
            </div>
            <i  class="p-2 right-align icon-angle-left"></i>
            @if($title_menu)
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route($routeName) }}" itemprop="url"><span
                                itemprop="title"> {{ $title_menu }}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
            @endif

            @foreach ($breadcrumbs as $breadcrumb)
            <i class="right-align icon-angle-left"></i>
            <div class="right-align left-margin" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="{{route($routeName)}}"
                   itemprop="url">
                    <span itemprop="title">{{$breadcrumb['title']}}</span></a>
            </div>
            @endforeach
            <i class="right-align icon-angle-left"></i>
            <div class="right-align divinhere" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <span itemprop="title"><strong>{{$page_name}}</strong></span>
            </div>
        </div>
    </section>
    <!-- breadcrumb ENDS -->
    <section class="contentinnerwrapper listchar">
        @switch(app()->getLocale())
            @case('en')
            <div class="alphabet">
                <div class="container">
                    <div class="letter_sort">
                        <b class="blue1">{{ __("messages.Browse by Alphabets") }} :</b>
                        <a href="{{ route($routeName, $params) . '?character=' }}">A</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">B</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">C</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">D</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">E</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">F</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">G</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">H</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">I</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">J</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">K</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">L</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">M</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">N</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">O</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">P</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">Q</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">R</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">S</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">T</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">U</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">V</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">W</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">X</a> <a
                                href="{{ route($routeName, $params) . '?character=' }}">Y</a>
                        <a href="{{ route($routeName, $params) . '?character=' }}">Z</a>
                    </div>
                </div>
            </div>
            @break
            @case('fa')
            <div class="alphabet">
                <div class="container">
                    <div class="letter_sort">
                        <b class="blue1">{{ __("messages.Browse by Alphabets") }} :</b>
                        <a href="{{ route($routeName, $params)  }}">{{__('messages.All')}}</a>
                        <a href="{{ route($routeName, $params) . '?character=ا' }}">ا</a>
                        <a href="{{ route($routeName, $params) . '?character=ب' }}">ب</a> <a
                                href="{{ route($routeName, $params) . '?character=پ' }}">پ</a>
                        <a href="{{ route($routeName, $params) . '?character=ت' }}">ت</a> <a
                                href="{{ route($routeName, $params) . '?character=ث' }}">ث</a>
                        <a href="{{ route($routeName, $params) . '?character=ج' }}">ج</a> <a
                                href="{{ route($routeName, $params) . '?character=چ' }}">چ</a>
                        <a href="{{ route($routeName, $params) . '?character=ح' }}">ح</a> <a
                                href="{{ route($routeName, $params) . '?character=خ' }}">خ</a>
                        <a href="{{ route($routeName, $params) . '?character=د' }}">د</a> <a
                                href="{{ route($routeName, $params) . '?character=ذ' }}">ذ</a>
                        <a href="{{ route($routeName, $params) . '?character=ر' }}">ر</a> <a
                                href="{{ route($routeName, $params) . '?character=ز' }}">ز</a>
                        <a href="{{ route($routeName, $params) . '?character=ژ' }}">ژ</a> <a
                                href="{{ route($routeName, $params) . '?character=س' }}">س</a>
                        <a href="{{ route($routeName, $params) . '?character=ش' }}">ش</a> <a
                                href="{{ route($routeName, $params) . '?character=ص' }}">ص</a>
                        <a href="{{ route($routeName, $params) . '?character=ض' }}">ض</a> <a
                                href="{{ route($routeName, $params) . '?character=ط' }}">ط</a>
                        <a href="{{ route($routeName, $params) . '?character=ظ' }}">ظ</a> <a
                                href="{{ route($routeName, $params) . '?character=ع' }}">ع</a>
                        <a href="{{ route($routeName, $params) . '?character=غ' }}">غ</a> <a
                                href="{{ route($routeName, $params) . '?character=ف' }}">ف</a>
                        <a href="{{ route($routeName, $params) . '?character=ق' }}">ق</a> <a
                                href="{{ route($routeName, $params) . '?character=ک' }}">ک</a>
                        <a href="{{ route($routeName, $params) . '?character=گ' }}">گ</a><a
                                href="{{ route($routeName, $params) . '?character=ل' }}">ل</a>
                        <a href="{{ route($routeName, $params) . '?character=م' }}">م</a><a
                                href="{{ route($routeName, $params) . '?character=ن' }}">ن</a>
                        <a href="{{ route($routeName, $params) . '?character=و' }}">و</a><a
                                href="{{ route($routeName, $params) . '?character=ه' }}">ه</a>
                        <a href="{{ route($routeName, $params) . '?character=ی' }}">ی</a>
                    </div>
                </div>
            </div>

            @break
        @endswitch

        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent categorylist">
                    <h2 class="title-cat titleorder2">{{$page_name ?: __("messages.Browse by Category")}}</h2>
                    <div class="row sub_cat_links_alpha">
                        @if ($categories)
                        @foreach ($categories as $i => $item)

                        <div class="col-lg-3 col-sm-2 col-xs-12 col-md-4">
                            <a class="subcatlink"
                               href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$item->slug_fa:$item->slug]) }}"
                               title="{{app()->getLocale()=='fa'?$item->name_fa:$item->name}}"
                            >
                                {{app()->getLocale()=='fa'?$item->name_fa:$item->name}}<b>({{sizeof($item->descendants)}})</b>
                            </a>
                            <div class="cat_box_inr">
                                <div class="cat_pc"></div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="row rowimginnerbtn">
                        <p class="imginnerbtn">{{$banner_middle}}</p>
                    </div>
                    @include('companies.company_featured',['company_featured' => $companies, 'company_featured_type' => 2,'category'=>$id])

                    @include('leads.featured_horizontal',['products_featured' => $products_featured1, 'type_featured' => $type_featured,'id'=>$id])
                    <div class="row rowimginnerbtn">
                        <p class="imginnerbtn">{{$banner_middle_2}}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <form action="{{ route($routeName, $params)}}" method="post">
                        <div class="col-xs-12 divfilter">
                            <input type="checkbox" checked data-toggle="toggle" name="filter[image]">
                            <label>{{__('messages.have picture')}}</label>
                        </div>
                        <div class="col-xs-12 divfilter">
                            @if($locations)
                            <h4>{{__('messages.location')."(".$count_location."):"}}</h4>
                            <div class="col-xs-12 divfilter">
                                @foreach ($locations as $location):?>
                                <p><input type="checkbox" value="{{$location}}" name="filter[location]"><label>{{strtolower($location)}}</label></p>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="col-xs-12 divfilter">

                            @if($seller_type)
                            <h4><?= __('messages.Type Active').":" ?></h4>
                            <div class="col-xs-12 divfilter">
                                @foreach ($seller_type as $seller)
                                <p><input type="checkbox" value="{{$seller }}" name="filter[seller_type]"><label>{{strtolower(__('messages.'.$seller))}}</label></p>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="col-xs-12 divfilter">
                            @if($companies)
                            <h4>{{ __('messages.Companies')."(".$count_company."):" }}</h4>
                            <div class="col-xs-12 divfilter">
                                @foreach ($companies as $company)
                                <p><input type="checkbox" value="{{$company->id}}" name="filter[company]"><label>{{ strtolower($company->companyName?:$company->firstName." ".$company->lastName)}}</label></p>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div class="col-xs-12 divfilter">
                            <h4><?= __('messages.Type Lead')?></h4>
                            <div class="col-xs-12 divfilter">
                                <p><input {{($type == 'buyselllead' || $type == 'selllead') ? "checked" : ""}} type="checkbox" value="1" name="filter[adType]"><label>{{__('messages.Sell')}}</label></p>
                                <p><input {{ ($type == 'buyselllead' || $type == 'buy-lead') ? "checked" : "" }} type="checkbox" value="2" name="filter[adType]"><label>{{__('messages.Buy')}}</label></p>
                            </div>
                        </div>
                        <!--          <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12 divfilter divfilter5">-->
                        <!--              <label>--><?//= __('messages.From')?><!--</label>-->
                        <!---->
                        <!--              <input type="text" name="filter[from]">-->
                        <!--              <label>--><?//= __('messages.To')?><!--</label>-->
                        <!---->
                        <!--              <input type="text" name="filter[to]">-->
                        <!---->
                        <!--          </div>-->
                        <div  style="float: left" class="col-lg-1 col-sm-2 col-md-2 col-xs-12 divfilter divfilter6">
                            <input type="submit" value="{{ __('messages.Filter')}}">

                        </div>
                    </form>
                    <div class="imgleftsidebar">
                        {{$banner_left}}
                    </div>
                    @include('testimonials.scroll-side')

                    <div class="imgleftsidebar">
                        {{$banner_left_2}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    @if($banner_button){?>
    <div class="bg-gray">
        <div class="wrapper ac">
            <!--        <img src="/images/b_bnr1.jpg" alt=""> <img src="/images/b_bnr2.jpg" class="ml5" alt="">-->
            {{$banner_button}}
        </div>
    </div>
    @endif



@endsection
@section('javascript')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@endsection