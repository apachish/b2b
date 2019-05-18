@extends('layouts.main')

@section('content')
    <div class="changepass selllead">
        <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{__("messages.You are here")}}   :</span>
                <div class="right-align" itemscope="" itemtype="{{route('home')}}">
                    <a href="{{route('home')}}" itemprop="url"><span
                                itemprop="title">{{ __("messages.Home")}}</span></a>
                </div>
                <i class="p-2 right-align icon-angle-left"></i>
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

        <section class="contentinnerwrapper ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent leaddetailsdiv listselldiv1">
                        <h2 class="title-cat listsell">{{app()->getLocale()=='fa'?$category->name_fa:$category->name}}</h2>
                        <div class="textselllist">
                            @if($category->image)
                                <figure><img
                                            src="{{url('images/category/'.$category->image)}}"
                                            width="173" height="80" alt=""></figure>
                            @endif
                            <p class="i fs14 gray">{{$category->description}}</p>

                        </div>
                        <div class="ads_type">
                            <a href="{{ route('home.companies', $params) }}" {{ $type == 'companies' ? 'class="act"' : '' }}>{{ __("messages.Companies") }}</a>
                            <a href="{{ route('home.buyselllead', $params) }}" {{ ($type == 'buyselllead' || $type == 'category') ? 'class="act"' : '' }}>{{ __("messages.Products") }}</a>
                            <a href="{{ route('home.buylead', $params) }}" {{ $type == 'buylead' ? 'class="act"' : '' }}>{{ __("messages.Buy Leads") }}</a>
                            <a href="{{ route('home.selllead', $params) }}" {{ $type == 'selllead' ? 'class="act"' : '' }}>{{ __("messages.Sell Leads") }}</a>
                        </div>
                        @if ($type == 'companies')
                            <form action="{{route($routeName,$paramss)}}" method="post" id="form_filter">
                                <div class="col-sm-12">

                                    <div class="col-sm-8 col-xs-12">
                                        <p class="boxlead">

                                            @foreach ($seller_type as $seller_item)
                                                <label>
                                                    <input name="seller[]" class="form_filter" type="checkbox"
                                                           value="{{$seller_item}}" {{ in_array($seller_item, $seller) ? "checked" : "" }}>
                                                    {{__('messages.'.$seller_item)}}
                                                </label>
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        | <label class="label_filter">{{ __("messages.Sort by") }}</label>
                                        <select class="form-control form_filter select" data-live-search="true"
                                                name="city">
                                            <option value="">{{ __("messages.City") }}</option>

                                            @foreach ($cities as $key => $city)
                                                <option {{$city_filter == $key?'selected':''}} value='{{$key}}'>{{$ciy}}</option>
                                                ";

                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </form>
                        @endif
                        <div class="ts_inr_list companies">
                            <ul>
                                @if ($items)
                                    @foreach ($items as $item)
                                        @if ($type == 'companies')
                                            <li>
                                                <div class="title">
                                                    <p class="title-company"><a
                                                                href="{{ route('company/detail', ['id' => $item['id']]) }}"
                                                                class="uo">{{ $item['companyName'] }}</a></p>
                                                    <p class="location">{{ $item['cityTitle'] }}
                                                        , {{ $item['countryTitle'] }}</p>
                                                </div>
                                                <div class="fullwith">
                                                    <div class="col-lg-3">
                                                        <figure>
                                                            <a href="{{ route('company/detail', ['id' => $item['id']]) }}"><img
                                                                        src="{{ !empty($item['companyLogo']) ? $this->baseUrl . '/uploaded_files/company_logo/' . $item['companyLogo'] : '/images/noimg.jpg' }}"
                                                                        alt=""></a></figure>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="bodylead">
                                                            <p class="typelead">{{ __("messages.Deals in") }}
                                                                : {{ !empty($item['dealsInTitle']) ? implode(',', $item['dealsInTitle']) : "" }}</p>
                                                            <p class="textlead">{{ $item['companyDetails'] }}</p>
                                                            <a href="{{ route('company/detail', ['id' => $item['id']]) }}"
                                                               class="btnsend">{{ __("messages.Leads") }}
                                                                -{{ $item['countLead'] }} <i
                                                                        class="icon-align-center"></i></a>
                                                            <a href="{{ route('company/detail', ['id' => $item['id']]) }}"
                                                               class="abtnmore">معالعه بیشتر<i
                                                                        class="icon-android-more-horizontal"></i></a>
                                                            <a href="{{ route('refer-friend') . "?link=" . base64_encode(CURRENT_URL) . "&text=" . base64_encode($page['title']) }}"
                                                               class="btnsend ajax group1 refer_friend">
                                                                <i class="icon-email"></i>{{ __("messages.Refer to Friend") }}
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @elseif ($type == 'buyselllead' || $type == 'selllead' || $type == 'buylead' || $type == 'category')
                                            <li>
                                                <div class="title">
                                                    <p class="title-company"><a
                                                                href="{{ route('home/product', ['cat_id' => $this->id, 'id' => $item['id']]) }}"
                                                                class="uo">{{ $item['productName'] }}</a></p>
                                                    <p class="location">{{ $item['cityTitle'] }}
                                                        , {{ $item['countryTitle'] }}</p>
                                                </div>
                                                <div class="fullwith">
                                                    <p class="textcompanies"><b>
                                                            @if ($item['adType'] == 1 || $item['adType'] == 'sell' || $membership)
                                                                <a href="{{ route('company/detail', ['id' => $item['memberId']]) }}"
                                                                   class="uo">{{ $item['companyName'] }}</a>
                                                            @elseif ($item['adType'] == 2 || $item['adType'] == 'buy')
                                                                {{ __('messages.Buyer') . "  " . $item['firstName'] }}
                                                            @endif
                                                            -</b> <span
                                                                class="gray">
                                                @if ($item['sellerType'])
                                                                ({{$item['sellerType']}})
                                                            @endif

                                                    </span>
                                                    </p>
                                                    <div class="col-lg-3">
                                                        <figure>
                                                            <a href="{{ route('home/product', ['cat_id' => $this->id, 'id' => $item['id']]) }}"><img
                                                                        src="{{ $item['image'] }}" alt=""></a>
                                                        </figure>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="bodylead">
                                                            <p class="typelead">{{ __("messages.For") }} {{ __('messages.'.$item['type_lead']) }}</p>
                                                            <p class="textlead">{{ mb_substr($item['productsDescription'], 0, 1000) }}</p>
                                                            <a href="{{route('home/product', ['cat_id' => $item['categoryId'], 'id' => $item['id']])}}"
                                                               class="abtnmore">{{__("messages.Read More")}}<i
                                                                        class="icon-android-more-horizontal"></i></a>

                                                            <a href="{{ route('home/product/enquiry', ['cat_id' => $this->id, 'id' => $item['id']]) }}"
                                                               class="btnsend"><i
                                                                        class="icon-email"></i>{{ __("messages.Send Enquiry") }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <p class="ac b">{{__('messages.No record(s) Found !')}}</p>
                                @endif
                            </ul>
                        </div>
                        <div class="ordering">
                            <div class="col-sm-3 col-xs-12">
                                    <span class="totlpage">{{ __("messages.Total") . " " . __(ucfirst($type))  }}
                                        : {{ $countItem }}</span>
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                pagination
                            </div>
                        </div>
                        <div class="ts_inr_list companies">
                            <p class="imginnerbtn">
                                {{$banner_middle}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12  left-sidebar-inner leftsidebarwithmenu listselldiv2">
                        <h2 class="title-cat titlecat">
                            {{app()->getLocale()=='fa'?$list_Categories_side->ancestors[0]->name_fa:$list_Categories_side->ancestors[0]->name}}
                        </h2>
                        <ul class="leftmenu">
                            <li>
                                <a
                                        href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$list_Categories_side->slug_fa:$list_Categories_side->slug]) }}"
                                        class="act"
                                >
                                    {{app()->getLocale()=='fa'?$list_Categories_side->name_fa:$list_Categories_side->name}}

                                </a>
                            </li>
                            @foreach ($list_Categories_side->siblings as $siblings)
                                <li>
                                    <a
                                            href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$siblings->slug_fa:$siblings->slug]) }}"
                                    >
                                    {{app()->getLocale()=='fa'?$siblings->name_fa:$siblings->name}}

                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="imgleftsidebar">
                            {{$banner_left_2}}
                        </div>

                        @if($type == 'companies')
                            @include('companies.company_featured',['company_featured' => $companies, 'company_featured_type' => 1,'category'=>$id])

                        @elseif($type == 'buyselllead' || $type == 'selllead' || $type == 'buylead' || $type == 'category')

                            @include('leads.featured_vertical',['products_featured' => $products_featured1, 'type_featured' => $type_featured,'membership' => $membership])

                        @endif
                        <div class="imgleftsidebar">
                            {{$banner_left}}
                        </div>
                    </div>


                </div>
            </div>
    </div>
    </div>
    </section>
    </div>
    @if($banner_button)
        <div class="bg-gray">
            <div class="wrapper ac">
                {{$banner_button}}
            </div>
        </div>
    @endif



@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {

            $('.form_filter').on('change', function () {
                $('#form_filter').submit();
            })


        })
    </script>
@endsection