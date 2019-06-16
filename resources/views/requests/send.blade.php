@extends('layouts.main')
@section('css')

@endsection
@section('content')
    <div class="changepass">
        <!-- breadcrumb -->
        <section class="breadcrumb info-breadcrumb">
            <div class="container">
                <span class="right-align" >{{__("messages.You are here")}} : </span>
                <div class="right-align"  itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span itemprop="title">{{__("messages.Home")}}</span></a>
                </div>
                <i  class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="{{route('leads.request.send',['slug_leads'=>$lead->product_friendly_url])}}">
                    <span itemprop="title"><strong>{{__("messages.Enquiry")}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                <div class="row">
                    <div class="divmaincontent Advertisementwrapper SendEnquiry">
                        <h2 class="title-cat">{{__("messages.Send Enquiry")}}</h2>
                        <h6>{{__("messages.Enquiry For")}} :
                            <a href="{{route('home.leads.show',['slug_categories'=>$lead->categories->first()->getCategorySlug(),'slug_leads'=> $lead->product_friendly_url])}}" class="uu">{{$lead->name}}</a></h6>
                        @include('requests.error')
                        @include('flash::message')

                        <form class="changpass editlead Advertisement" action="{{route('leads.request.store',['slug_leads'=>$lead->product_friendly_url])}}" method="post">
                            {{csrf_field()}}
                            <fieldset class="contact_form Advertisementform" style="border:none;">
                                <div class="row">
                                    <div class="form-group col-md-5 col-xs-12">
                                        <input class="form-control inouttyeptext" type="text" name="name" value="{{old('name')}}" id="name" placeholder="{{__("messages.Full Name")}} *">
                                        <input class="form-control inouttyeptext" type="text" name="email" value="{{old('mail')}}" id="email" placeholder="{{__("messages.Email")}} *">
                                        <input class="form-control inouttyeptext" type="text" name="mobile" value="{{old('obile')}}" id="mobile" placeholder="{{__("messages.Mobile Number")}} *">
                                        <input class="form-control inouttyeptext" type="text" name="phone" value="{{old('hone')}}" id="phone" placeholder="{{__("messages.Phone Number")}}">

                                    </div>
                                    <div class="form-group col-md-7 col-xs-12">
                                        <input class="form-control inouttyeptext" type="text" name="companyName"  value="{{old('ompanyName')}}" id="companyName" placeholder="{{__("messages.Company Name")}}">
                                        <textarea class="form-control inouttyeptext" name="comments" id="comments" class="db" cols="45" rows="7" placeholder="{{__("messages.Comment/Messsage")}} *" style="height:132px">{{old('omments')}}</textarea>
                                    </div>

                                    <div class="col-lg-3">

                                        <input name="verification_code_enquiry" id="verification_code_enquiry" type="text"
                                               title="{{__('messages.verification_code')}}"
                                               placeholder="{{__("messages.Enter the security code") }}"
                                               class="inouttyeptext w30 p4 radius-3 vam">
                                        <img src="{{ captcha_src('flat')}}"
                                             class="vam reCaptcha-img" alt="" id="captchaimage"/>
                                        <a href="javascript:false;" title="Change Verification Code">
                                            <img src="/images/ref2.png"
                                                 alt="Refresh"
                                                 onclick="document.getElementById('verification_code_enquiry').value=''; document.getElementById('verification_code_enquiry').focus(); return true;"
                                                 width="24" height="23" class="reCaptcha vam ml5">
                                        </a>
                                        <p class="CharacterLimit">{{__("messages.Type the characters shown above") }}
                                            .</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <input name="input" type="submit"  value="{{__("messages.Submit")}}" class="btn btn-primary">
                                        <input name="input" type="reset" value="{{__("messages.Reset")}}" class="btn btn-dark">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('javascript')

@endsection
