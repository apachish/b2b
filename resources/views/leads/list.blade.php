@extends('layouts.main')
@section('css')
@endsection
@section('content')

    <div class="changepass">
        <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{__("messages.You are here")}} :</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{__("messages.Home")}}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="{{ route('search') }}">
                    <span itemprop="title"><strong>{{$title_page}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent leaddetailsdiv">
                        <h2 class="title-cat">{{$title_page}}</h2>
                        <div class="ts_inr_list companies">
                            <ul>
                                @if($result)
                                    @foreach ($result as $lead)
                                    <li>
                                        <div class="title">
                                            <p class="title-company"><a
                                                        href="{{route('home.leads.show',['slug_categories'=>$lead->categories->first()->getCategorySlug(),'slug_leads'=> $lead->product_friendly_url])}}"
                                                        class="uo">{{$lead->name}}</a></p>
                                            <p class="location">{{$lead->city->getName()}}
                                                ,
{{--                                                {{$lead->city->country->getName()}}--}}
                                            </p>
                                        </div>
                                        <div class="fullwith">
                                            <p class="textcompanies"><b><a
                                                            href="{{ route('home.companies.info', ['slug_companies'=>$lead->user->slug])}}"
                                                            class="uo">
                                                        @if ($lead->ad_type == 'sell' || $membership)
                                                            <a href="{{route('home.companies.info', ['slug_companies'=>$lead->user->slug])}}"
                                                               class="uo">{{ $lead->user->getCompanyName() }}</a>
                                                        @elseif ( $lead->ad_type == 'buy')
                                                            {{ __('messages.Buyer') . "  " . $lead->user->first_name }}
                                                        @endif
                                                    </a> -</b> <span class="gray">
                                            @if($lead->user->sellers )

                                                        @foreach($lead->user->sellers as $i=>$seller)
                                                            <span>  {{$i!=0?'-':""}}{{__('messages.'.$seller->title)}}</span>
                                                        @endforeach
                                                    @endif
                                                    </span></p>
                                            <div class="col-lg-3">
                                                <figure>
                                                    <a href="{{route('home.leads.show',['slug_categories'=>$lead->categories->first()->getCategorySlug(),'slug_leads'=> $lead->product_friendly_url])}}">
                                                        <img src="{{url('images/medias/photos/'.data_get($lead,'medias.0.media','noImage.png'))}}"
                                                             alt="{{$lead->name}}}">
                                                    </a></figure>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="bodylead">
                                                    <p class="typelead">{{ __("messages.For")}} {{__('messages'.$lead->ad_type)}}</p>
                                                    <p class="textlead">{{$lead->description}}</p>
                                                    <a href="{{route('leads.request.send',['slug_leads'=>$lead->product_friendly_url])}}"
                                                       class="btnsend"><i
                                                                class="icon-email"></i>{{__("messages.Send Enquiry")}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                @else
                                    <p class="ac b">{{ __('messages.No record(s) Found !')}}</p>
                                @endif
                            </ul>
                        </div>
                        <div class="ordering">
                            <div class="col-sm-3 col-xs-12">
                                <span class="totlpage">{{__("messages.Total Leads")}} : {{$countItem}}</span>
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                {{$result->links()}}
                            </div>
                        </div>

                        <p class="imginnerbtn"><img src="/images/mb3.gif" width="468" height="60" alt=""></p>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12  left-sidebar-inner ">
                        <ul class="leftmenu">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$category->slug_fa:$category->slug]) }}">
                                        {{$category->getCategoryTitle()}}
                                    </a>
                                </li>
                            @endforeach
                            <li><a href="{{ route("home.categories")}}">{{__("messages.View All")}}</a></li>

                        </ul>
                        @include('banner_left',['offset'=>0,'limit' => 5])

                        @include('companies.company_featured',[ 'company_featured_type' => 3,'category_slug'=>null])

                        @include('banner_left',['offset'=>5,'limit' => 6])

                    </div>


                </div>
            </div>
        </section>
    </div>
    @include('banner_button')


@endsection
@section('javascript')
@endsection

