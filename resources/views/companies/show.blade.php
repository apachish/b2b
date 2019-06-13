@extends('layouts.main')
@section('css')
@endsection
@section('content')
    <div class="changepass">
        <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{ __("messages.You are here") }} :</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{ __("messages.Home") }}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="">
                    <a href="{{ route('home.companies.list') }}" itemprop="url"><span
                                itemprop="title">{{ __("messages.Company") }}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="">
                    <span itemprop="title"><strong>{{ $company->getCompanyName() }}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent leaddetailsdiv details2">
                        <div class="reqdiv">
                            <div class="divcontactinfo divreqinfo">
                                <div class="ts_inr_list_pc">
                                    <figure><img
                                                src="{{url('/images/logo/'.$company->company_logo)}}"
                                                alt="{{$company->company_name}}" width="173px" height="129px"></figure>
                                </div>
                                <p class="nameinfo">{{$company->company_name}}</p>
                                <p class="compnayinfo">
                                @foreach($company->sellers as $seller)
                                    <p> - {{__('messages.'.$seller->title)}}</p>
                                    @endforeach
                                    </p>
                                    <p class="dealinfo"><b class="blue1"><?= __("messages.Deals in") ?>
                                            :</b> <?= !empty($company['categoryTitle']) ? $company['categoryTitle'] : "" ?>
                                    </p>
                                    <p class="titlecontactinfo"><?= __("messages.Company Profile") ?></p>
                                    <p class="textinfo">
                                        <?= $company['companyDetails'] ?>
                                    </p>
                            </div>
                        </div>
                        <h2 class="title-cat">{{__("messages.Leads From this Company")}}</h2>
                        <div class="ads_type">
                            @if ($adType == "buy" && $membership)
                                <a href="{{ route('home.companies.info', ['slug_companies' => $item->slug]) . '?adType=buy' }}" {{$adType == "buy" ? 'class="act"' : ''}} >{{__("messages.Buy Leads")}}</a>

                            @endif
                            @if ($adType == "sell" || $membership)
                                <a href="{{ route('home.companies.info', ['slug_companies' => $item->slug]) . '?adType=sell' }}" {{$adType == "sell" ? 'class="act"' : ''}} >{{__("messages.Sell Leads")}}</a>
                            @endif
                        </div>
                        <div class="ts_inr_list companies">
                            <ul>
                                @foreach ($products as $item)
                                    <li>
                                        <div class="title">
                                            <p class="title-company"><a
                                                        href="<?= $this->url('home/product', ['cat_id' => $item['categoryId'], 'id' => $item['id']]) ?>"
                                                        class="uo"><?= $item['productName'] ?></a></p>
                                            <p class="location"><?= $this->translate($company['cityTitle']) ?>
                                                , <?= $this->translate($company['countryTitle']) ?></p>
                                        </div>
                                        <p class="textcompanies"><b>
                                                @if ( $adType == 'sell' || $membership)
                                                    <a href="{{route('home.companies.info', ['slug_companies' => $company->slug])}}"
                                                       class="uo">{{$company->company_name}}</a>
                                                @elseif ( $adType == 'buy')
                                                    <?= $this->translate('Buyer') . "  " . $company['firstName'] ?>
                                                @endif
                                                -</b> <span
                                                    class="gray">
                                                            "("
                                        @foreach($company->sellers as $seller)
                                            {{__('messages.'.$seller->title).','}}
                                            @endforeach
                                                    ")"
                                        </span></p>
                                        <div class="bodylead">
                                            <p class="typelead">{{__("messages.For")}} {{__('messages.'.$item->ad_type)}}></p>
                                            <p class="textlead">{{$item->description}}</p>
                                            <a href="{{route('home.leads.leads',['slug_categories'=>$item->categories->first()->slug,'slug_leads'=> $item->product_friendly_url])}}"
                                               class="btnsend"><i
                                                        class="icon-email"></i>{{ __("messages.Send Enquiry")}}</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="ordering">
                            <div class="col-sm-3 col-xs-12">
                                <span class="totlpage">{{__("messages.Total Record")}} : {{$countItem}}</span>

                            </div>
                            <div class="col-sm-9 col-xs-12">
                                {{ $items->links()}}

                            </div>
                        </div>


                        <p class="imginnerbtn"> {{$banner_middle_2}}</p>
                    </div>

                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12  left-sidebar-inner details2">
                        <ul class="leftmenu">
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$category->slug_fa:$category->slug])}}">{{$category->getCategoryTitle()}}</a>
                            </li>
                            @endforeach
                            <li><a href="<?= $this->url("home/category"); ?>"><?= __("messages.View All") ?></a></li>

                        </ul>
                        @include('companies/refer_friend')

                        <div class="imgleftsidebar imgleftsidebar2">
                            {{$banner_left}}
                        </div>
                        @include('companies.company_featured',[ 'company_featured_type' => 4,'category_slug'=>null])

                        <div class="imgleftsidebar">
                            {{$banner_left_2}}
                        </div>

                    </div>
                </div>
                <p class="imginnerbtn">{{$banner_middle}}</p>

            </div>
        </section>
    </div>
@endsection
@section('javascript')
@endsection
