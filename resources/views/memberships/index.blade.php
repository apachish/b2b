@extends('layouts.main')
@section('css')
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="changepass">

        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{__("messages.You are here")}} :</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{__("messages.Home")}}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="">
                    <span
                            itemprop="title"><strong>{{__("messages.Membership Plan")}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper paynowwrapper">
            <div class="container">
                @include('users.info_user')
                @include('flash::message')

                <div class="row">
                    <div class="reqdiv col-lg-12 col-sm-12 col-xs-12">
                        <h1 class="title-pay">{{__('messages.Membership Plan')}}</h1>
                        <div class="inr_list_req" style="margin-top:0px">

                            @if($plans)
                                @foreach($plans as $plan)


                                    <div class="divmembership">
                                        <p class="pmembership">{{$plan->duration}}<br/>{{__('messages.Month')}}</p>
                                        <div class="inner-memb">
                                            <p class="linkpay" style="font-size: 10px"><a
                                                        href="{{route('members.membership.plans.pay',['plan_id'=>$plan->id])}}">{{__('messages.Pay Now')}}</a>
                                            </p>
                                            <p class="pricepay"
                                               style="color:#2fb6d1; font-size:30px;">{{$plan->price}}</p>
                                            <p class="numpay">{{__('messages.No. of Enquiries')}}
                                                :{{$plan->no_of_enquiry}}</p>
                                        </div>
                                        <p class="cb"></p>
                                    </div>
                                @endforeach
                            @else

                                <div class="ac red b">{{__('messages.No any plan available')}}</div>
                            @endif

                            <p class="cb"></p>
                        </div>
                        <div class="cb"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('javascript')
@endsection

