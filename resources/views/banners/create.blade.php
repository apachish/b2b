@extends('layouts.main')
@section('css')
@endsection
@section('content')


    <div class="changepass">
        <!-- breadcrumb -->
        <section class="breadcrumb info-breadcrumb">
            <div class="container">
                <span class="right-align">{{ __("messages.You are here") }} : </span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{ __("messages.Home") }}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="{{ route('advertisement.create') }}">
                    <span itemprop="title"><strong>{{ __("messages.Advertise with Us") }}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                <div class="row">
                    <div class="divmaincontent Advertisementwrapper">
                        <h2 class="title-cat">{{ __("messages.Advertise with Us") }}</h2>
                        <form class="changpass editlead Advertisement" action="{{ route('advertisement.store') }}"
                              method="post" enctype="multipart/form-data" method="post">
                            {{csrf_field()}}

                            <h6>{{ __("messages.Have an Advertisement Related Query?") }}</h6>
                            <p>{{ __("messages.Just Give the Below Information:") }}</p>
                            @include('admin.error')
                            @include('flash::message')


                            <fieldset class="contact_form Advertisementform" style="border:none;">
                                <div class="form-group col-md-5 col-xs-12">
                                    <input class="form-control inouttyeptext" type="text" name="name" id="name" value="{{old('name')}}"
                                           placeholder="{{ __("messages.Full Name") }} *">
                                    <input class="form-control inouttyeptext" type="text" name="email" id="email" value="{{old('email')}}"
                                           placeholder="{{ __("messages.Email") }} *">
                                    <input class="form-control inouttyeptext" type="text" name="mobile" id="mobile" value="{{old('mobile')}}"
                                           placeholder="{{ __("messages.Mobile Number") }} *">
                                    <input class="form-control inouttyeptext" type="text" name="phoneNumber" value="{{old('phoneNumber')}}"
                                           id="phoneNumber" placeholder="{{ __("messages.Phone Number") }}">
                                    <input class="form-control inouttyeptext" type="text" name="companyName" value="{{old('companyName')}}"
                                           id="companyName" placeholder="{{ __("messages.Company Name") }}">
                                    <div class="inouttyeptext spanuploadbanner">
                                        <span> {{ __("messages.Upload Banner") }} * :</span><input name="bannerImage"
                                                                                                         type="file"
                                                                                                         style="border:0">
                                    </div>

                                    <select name="parentId" id="category" class="form-control inouttyeptext">
                                        <option value="">{{__("messages.SELECT Category")}}</option>
                                        @foreach ($categories as $category)
                                        <option  value="{{$category->id}}">{{$category->getCategoryTitle()}}</option>
                                        @endforeach
                                    </select>
                                    <div id="div_category2" style="display: none">

                                        <select name="parent" id="category2" class="form-control inouttyeptext">
                                        </select>
                                    </div>
                                    <div id="div_category3"  style="display: none">

                                        <select name="category" id="category3" class="form-control inouttyeptext">
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group col-md-7 col-xs-12">
                                    <select name="bannerPosition" id="position" title="{{__('messages.bannerPosition')}}" class="form-control inouttyeptext">

                                        <option value="">{{ __("messages.Select position") }}</option>

                                        <option {{old('bannerPosition')=="Right"?"selected":""}}  value="Right" >{{ __("messages.Right Main Page")}} » {{ __("messages.Banner Size In Location (190x275)") }}</option>

                                        <option {{old('bannerPosition')=="Left"?"selected":""}} value="Left" >{{ __("messages.Left")}} » {{ __("messages.Banner Size In Location(190x275)") }}</option>

                                        <option {{old('bannerPosition')=="Middle"?"selected":""}} value="Middle" >{{ __("messages.Middle")}} » {{ __("messages.Banner Size In Location(468x60)") }}</option>

                                        <option {{old('bannerPosition')=="Bottom"?"selected":""}} value="Bottom" >{{ __("messages.Bottom")}} » {{ __("messages.Banner Size In Location(470x95)") }}</option>

                                        <option {{old('bannerPosition')=="Home Scrolling"?"selected":""}} value="Home Scrolling" >{{ __("messages.Home Scrolling Main Page")}} » {{ __("messages.Banner Size In Location(480x250)") }}</option>
                                    </select>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">{{ __("messages.help Location")}}</button>
                                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="/images/size_banner.png" class="img-responsive">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <select name="timeDuration" id="timeDuration" title="{{__('messages.timeDuration')}}" class="form-control inouttyeptext">
                                        <option value="">{{ __("messages.Select duration in month")}}</option>
                                        
                                        @for($i=1;$i<=12;$i++)
                                            <option  {{old('timeDuration')==$i?"selected":""}}   value='{{$i}}'>{{$i}}</option>
                                        @endfor
                                        
                                    </select>
                                    <input class="form-control inouttyeptext" type="text" name="bannerUrl" id="bannerUrl" value="{{old('bannerUrl')}}"
                                           placeholder="{{ __("messages.Banner URL") }}">
                                    <textarea class="form-control inouttyeptext" name="comment" id="comment" class="db" title="{{__('messages.comment')}}"
                                              cols="45" rows="7" placeholder="{{ __("messages.Comment/Messsage") }} *"
                                              style="height:132px">{{old('comment')}}</textarea>

                                </div>
                                <div class="col-lg-12">

                                    <div class="col-md-12">
                                        <p style="text-align: right">
                                            <label>
                                                {{ __("messages.Which page?") }}
                                            </label>
                                        </p>
                                    </div>
                                    @foreach($positions as $position)
                                    <div class="col-md-3">
                                        <label class="check"><input type="checkbox"
                                                                    name="bannerPage[]" {{old('bannerPage') && in_array($position->id, old('bannerPage')) ? "checked" : "" }}
                                                                    value="{{$position->id}}"
                                                                    class="icheckbox"/> {{ __("messages.".$position->name) }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <input name="verification_code_advertisement" id="verification_code_advertisement" type="text"
                                           title="{{__('messages.verification_code')}}"
                                           placeholder="{{__("messages.Enter the security code") }}"
                                           class="inouttyeptext w30 p4 radius-3 vam">
                                    <img src="{{ captcha_src('flat')}}"
                                         class="vam reCaptcha-img" alt="" id="captchaimage_advertisement"/>
                                    <a href="javascript:false;" title="Change Verification Code">
                                        <img src="/images/ref2.png"
                                             alt="Refresh"
                                             onclick="document.getElementById('verification_code_advertisement').value=''; document.getElementById('verification_code_advertisement').focus(); return true;"
                                             width="24" height="23" class="reCaptcha vam ml5">
                                    </a>
                                    <p class="CharacterLimit">{{__("messages.Type the characters shown above") }}
                                        .</p>
                                </div>

                                <div class="col-lg-12">
                                    <input name="input" type="submit" value="{{ __('messages.Submit')}}" class="btn btn-primary">
                                    <input name="input" type="reset" value="{{ __('messages.Reset')}}" class="btn btn-dark">
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
    <script type="text/javascript">
        jQuery(document).ready(function() {

            var $select2 = $('#category').select2({
                placeholder: "{{__("messages.SELECT Category")}}",
                width: '100%',
                allowClear: true,
                data: [],
            }).on("change", function (e) {
                var parent_id = $('#category').val();
                $('#category2 option').remove();
                console.log(parent_id);
                $("#category2").val('').trigger('change');
                $("#category3").val('').trigger('change');
                if (parent_id) {
                    $('#div_category2').show();
                    $.get("/api/categories/" + parent_id, function (data) {
                        console.log(data);
                        var categories = data.data;
                        console.log(categories);
                        categories.unshift({
                            id: "0",
                            text: '{{__("messages.SELECT Category")}}'
                        });
                        $("#category2").select2({
                            placeholder: "{{__("messages.SELECT Category")}}",
                            width: '100%',
                            allowClear: false,
                            data: categories,
                        }).on("change", function (e) {
                            $('#category3 option').remove();
                            var parent = $('#category2').val();

                            if (parent) {
                                $('#div_category3').show();
                                console.log(parent);
                                $.get("/api/categories/" + parent, function (data) {
                                    console.log(data);
                                    var categories = data.data;
                                    categories.unshift({
                                        id: "0",
                                        text: '{{__("messages.SELECT Category")}}'
                                    });

                                    // mostly used event, fired to the original element when the value changes
                                    $("#category3").select2({
                                        placeholder: "{{__("messages.SELECT Category")}}",
                                        width: '100%',
                                        allowClear: true,
                                        maximumSelectionLength: "3",

                                        data: categories,
                                    });
                                });
                            } else {
                                $('#div_category3').hide();
                                $("#category3").select2({
                                    placeholder: "{{__("messages.SELECT Category")}}",
                                    width: '100%',
                                    allowClear: true,
                                    maximumSelectionLength: "3",

                                    data: [],
                                })
                            }

                        })
                    });        // mostly used event, fired to the original element when the value changes
                } else {
                    $('#div_category2').hide();
                    $('#div_category3').hide();
                    $("#category2").select2({
                        placeholder: "{{__("messages.SELECT Category")}}",
                        width: '100%',
                        allowClear: true,

                        data: [],
                    });
                    $("#category3").select2({
                        placeholder: "{{__("messages.SELECT Category")}}",
                        width: '100%',
                        allowClear: true,
                        maximumSelectionLength: "3",

                        data: [],
                    })
                }
            });

            $select2.data('select2').$container.addClass("form-control");
            $select2.data('select2').$container.addClass("inouttyeptext");

        });
    </script>
@endsection

