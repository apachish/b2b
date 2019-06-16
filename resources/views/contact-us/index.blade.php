@extends('layouts.main')
@section('css')
    <style>
        .ajax-load {
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
@endsection
@section('content')

    <div class="changepass">
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
                    <span itemprop="title"><strong>{{__('messages.Contact Us')}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper container-contact">
            <div class="container">
                <div>
                    @include('contact-us.error')

                </div>
                <form class="contactusform" action="{{route('post_request')}}" method="post">
                    {{csrf_field()}}

                    <fieldset class="contact_form Advertisementform" style="border:none;">
                        <div>
                            <div class="contactform col-lg6 col-md-7 col-xs-12">
                                <h2 class="title-cat">{{__('messages.Have a Query')}}? <b class="">
                                        {{__("messages.Just Fill the Below Information") }}:
                                    </b>
                                </h2>
                                <div class="form-group">
                                    <input class="form-control inouttyeptext" type="text" name="subject"
                                           title="{{__('messages.subject')}}" id="subject" value="{{old('subject')}}"
                                           placeholder="{{__("messages.Subject") }} *">
                                    <div class="form-control inouttyeptext boxenquiry">
                                        <label class="col-sm-3 col-form-label"
                                               for="enquiry_type">{{__('messages.Contact For') }} <b
                                                    class="red">*</b> :</label>

                                        <p>
                                            <label>
                                                <input class="type_contacts" name="type" type="radio" value="1"
                                                       title="{{__('messages.type')}}" {{old('type')==1?"checked":""}} >
                                                {{__('messages.Enquiry') }}</label>
                                            &nbsp;&nbsp;
                                            <label>
                                                <input class="type_contacts" name="type" type="radio" value="2"
                                                       title="{{__('messages.type')}}" {{old('type')==2?"checked":""}} >
                                                {{__('messages.Bug Report') }}
                                                &nbsp;&nbsp;
                                            </label>
                                            <label>
                                                <input class="type_contacts" name="type" type="radio" value="3"
                                                       title="{{__('messages.type')}}" {{old('type')==3?"checked":""}} >
                                                {{__('messages.Advertise Request') }}</label>
                                        </p>

                                    </div>
                                    <input class="form-control inouttyeptext" type="text" name="name"
                                           title="{{__('messages.name')}}" id="name" value="{{old('name')}}"
                                           placeholder="{{__("messages.Full Name") }} *">
                                    <input class="form-control inouttyeptext" type="email" name="email"
                                           title="{{__('messages.email')}}" id="email" value="{{old('email')}}"
                                           placeholder="{{__("messages.Email") }} *">
                                    <input class="form-control inouttyeptext" type="text" name="mobile"
                                           title="{{__('messages.mobile')}}" id="mobile" value="{{old('mobile')}}"
                                           placeholder="{{__("messages.Mobile Number") }} *">

                                    <input class="form-control inouttyeptext" type="text" name="phoneNumber"
                                           title="{{_('messages.phoneNumber')}}" id="phone" value="{{old('phoneNumber')}}"
                                           placeholder="{{__("messages.Phone Number") }}">
                                    <div class="dn adv_only" style="{{old('type')==3?"display: block":""}}">
                                        <p>
                                            <input type="text" name="companyName" id="company"
                                                   title="{{__('messages.companyName')}}"
                                                   placeholder="{{__("messages.Company Name")}}"
                                                   value="{{old('companyName')}}">
                                        </p>
                                        <p class="mt5 fls">
                                            {{__("messages.Upload Banner")}} * :
                                            <input name="bannerImage" type="file" style="border:0" class="w60">
                                        </p>
                                        <select name="bannerPosition" id="position"
                                                title="{{__('messages.bannerPosition')}}"
                                                class="form-control inouttyeptext">

                                            <option value="">{{__("messages.Select position") }}</option>

                                            <option {{old('type')=="Right"?"selected":""}}  value="Right">
                                                {{__("messages.Right Main Page")}} »
                                                {{__("messages.Banner Size In Location (190x275)") }}</option>
                                            >

                                            <option {{old('type')=="Left"?"selected":""}} value="Left">
                                                {{__("messages.Left")}} »
                                                {{__("messages.Banner Size In Location(190x275)") }}</option>

                                            <option {{old('type')=="Middle"?"selected":""}} value="Middle">
                                                {{__("messages.Middle")}} »
                                                {{__("messages.Banner Size In Location(468x60)") }}</option>

                                            <option {{old('type')=="Bottom"?"selected":""}} value="Bottom">
                                                {{__("messages.Bottom")}} »
                                                {{__("messages.Banner Size In Location(470x95)") }}</option>

                                            <option {{old('type')=="Home Scrolling"?"selected":""}} value="Home Scrolling">
                                                {{__("messages.Home Scrolling Main Page")}} »
                                                {{__("messages.Banner Size In Location(480x250)") }}</option>
                                        </select>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#myModal">{{__("messages.help Location")}}</button>
                                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="/img/size_banner.png" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <select name="timeDuration" id="timeDuration"
                                                title="{{__('messages.timeDuration')}}"
                                                class="form-control inouttyeptext">
                                            <option value="">{{__("messages.Select duration in month")}}</option>

                                            @for($i=1;$i<=12;$i++)
                                            <option {{old('timeDuration')==$i?'selected':""}}   value={{$i}} >{{$i}}</option>
                                            @endfor
                                        </select>
                                        <div class="col-md-12">
                                            <p style="text-align: right">
                                                <label>
                                                    {{__("messages.Which page?") }}
                                                </label>
                                            </p>
                                        </div>
                                        @foreach($positions as $position)
                                            <div class="col-md-3">
                                                <label class="check"><input type="checkbox"
                                                                            name="bannerPage[]"
                                                                            {{old('bannerPage') && in_array($position->id, old('bannerPage')) ? "checked" : ""}}
                                                                            value="{{$position->id}}"
                                                                            class="icheckbox"/>
                                                    {{__("messages.".$position->name) }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <textarea class="form-control inouttyeptext" name="message"
                                          title="{{__('messages.message')}}" id="comments" class="db"
                                          cols="45" rows="7" placeholder="{{__("messages.Comment/Messsage") }} *"
                                          style="height:132px">{{old('message')}}</textarea>
                                <div class="col-lg-12">
                                    <input name="captcha_request" id="verification_code_request" type="text"
                                           title="{{__('messages.verification_code')}}"
                                           placeholder="{{__("messages.Enter the security code") }}"
                                           class="inouttyeptext w30 p4 radius-3 vam">
                                    <img src="{{ captcha_src('flat')}}"
                                         class="vam reCaptcha-img" alt="" id="captchaimage_request"/>
                                    <a href="javascript:false;" title="Change Verification Code">
                                        <img src="/images/ref2.png"
                                             alt="Refresh"
                                             onclick="document.getElementById('verification_code_request').value=''; document.getElementById('verification_code_request').focus(); return true;"
                                             width="24" height="23" class="reCaptcha vam ml5">
                                    </a>
                                    <p class="CharacterLimit">{{__("messages.Type the characters shown above") }}
                                        .</p>
                                </div>
                                <div class="col-lg-12">
                                    <input name="input" type="submit" value="{{__("messages.Submit")}}"
                                           class="btn btnprimary-n">
                                    <input name="input" type="reset" value="{{__("messages.Reset")}}"
                                           class="btn btn-dark">
                                </div>

                            </div>

                        </div>
                        <div class="contactdetails col-lg6 col-md-5 col-xs-12">
                            <div class="row">

                                <div class="form-group">
                                    <h2>{{__("messages.How to Reach")}}</h2>

                                    <p class="address">{{__("messages.Address")}}:</p>
                                    <div class="shadow2">
                                        @if(data_get($meta_data,'country'))
                                            <p>{{data_get($meta_data,'country')}}</p>
                                        @endif
                                        @if(data_get($meta_data,'address'))
                                            <p>{{data_get($meta_data,'address')}}</p>
                                        @endif
                                    </div>
                                    @if(data_get($meta_data,'telephone'))
                                        <p class="phone">{{__("messages.Phone Number")}} :
                                            <strong>{{data_get($meta_data,'telephone')}}</strong></p>
                                    @endif
                                    @if(data_get($meta_data,'email'))
                                        <p class="email">{{__("messages.E-mail")}} : <strong><a class="uu"
                                                                                                href="mailto:{{data_get($meta_data,'email')}}?Subject={{__("messages.Hello")}}">{{data_get($meta_data,'email')}}</a></strong><br>
                                            @endif
                                            @if(data_get($meta_data,'site'))
                                                {{__("messages. Website")}} : <strong><a class="b uu"
                                                                                         href="https://{{data_get($meta_data,'site')}}"
                                                                                         target="_blank">{{data_get($meta_data,'site')}}</a></strong>
                                        </p>
                                    @endif

                                </div>


                            </div>

                        </div>
            </div>
            </fieldset>
            </form>
    </div>
    </section>
    <section class="wrappergooglemap">
        @if(data_get($meta_data,'google_map'))
            <div class="">
                <h2 class="mt40 ml15">{{__('messages.Google Map')}}</h2>
                <iframe src="{{data_get($meta_data,'google_map')}}"
                        width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
                <!--                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7005.162131705121!2d77.23107641005573!3d28.612342174491207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce2daa9eb4d0b%3A0x717971125923e5d!2sIndia+Gate!5e0!3m2!1sen!2sin!4v1417505809014" style="border:0; width:100%; height:400px; display:block"></iframe>-->
            </div>
        @endif
    </section>
    </div>

@endsection
@section('javascript')
    <script>
        $('.type_contacts').click(function () {
            var val = $(this).val();
            if ($(".adv_only").is(":hidden") && val == 3) {
                $('.adv_only').show("slow");
            } else {
                $('.adv_only').slideUp(400);
            }
        });
    </script>
@endsection