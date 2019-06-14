@extends('layouts.main')
@section('css')
@endsection
@section('content')
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
                            itemprop="title"><strong>{{__("messages.Pay Now")}}</strong></span>
                </div>
            </div>
        </section>

        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper paynowwrapper">
            <div class="container">
                @include('users.info_user')
                <div class="row">
                    <div class="reqdiv col-lg-12 col-sm-12 col-xs-12">
                        <h1 class="title-pay">{{__("messages.Membership Plan")}}</h1>
                        <div class="inr_list_req">
                            <form action="{{route("members.membership.payment",['order_id'=>$order_id])}}" method="post">
                                {{csrf_field()}}

                                <div class="bodypaynow">
                                    <p class="ftitle">{{__('messages.Select a payment method')}}</p>
                                    <p class="content">{{$content}} </p>
                                    <div class="typepay">
                                        <ul>
                                            <li class="li-pay"><input type="radio" name="pay_method" value="paypal" checked> <img src="/images/mycrd1.png" alt="" class="vam" ></li>
                                            <li class="li-pay"><input type="radio"  name="pay_method"  value="paypal" > <img src="/images/mycrd4.png" alt="" class="vam" ></li>
                                            <li class="li-pay"><input type="radio"  name="pay_method"  value="paypal" > <img src="/images/mycrd3.png" alt="" class="vam" ></li>
                                            <li class="li-pay"><input type="radio"  name="pay_method"  value="paypal"> <img src="/images/mycrd5.png" alt="" class="vam" ></li>
                                            <li class="li-pay"><input type="radio"  name="pay_method"  value="paypal" > <img src="/images/mycrd2.png" alt="" class="vam" ></li>
                                        </ul>
                                    </div>
                                    <p class="cb"></p>

                                    <p class="submitpayment">
                                        <input name="button3" type="submit" class="btn-primary" id="button2" value="{{__('messages.Make Payment')}}"/>
                                    </p>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


                <!-- left ends -->
        </section>
        <!-- MIDDLE ENDS -->
    </div>

@endsection
@section('javascript')
@endsection

