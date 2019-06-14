@extends('layouts.main')
@section('css')
@endsection
@section('content')


    <div class="changepass">
        <div id="mobile-header" class="dashboard-menu">
            <a id="responsive-menu-button" href="#sidr-main">{{__("messages.Dashboard")}}</a>
        </div>

    @include('menu_profile')
    <!-- breadcrumb -->
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
                            itemprop="title"><strong>{{__("messages.Update Profile")}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->


        @include('users.error')

        <section class="contentinnerwrapper">
            <div class="container">
                @include('users.info_user')
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{__("messages.Update Profile")}}</h2>
                        <form style="margin-top:15px;" class="changpass editlead" enctype="multipart/form-data"
                              method="post" action="{{route('members.update_account')}}" novalidate="novalidate">
                            <div class="error_message red"></div>
                            {{csrf_field()}}
                            @method('PATCH')
                            <fieldset class="pb15" style="border:0;">
                                <p class="titlefieldset">{{__("messages.Company Information")}}</p>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="company_name">{{__("messages.Company Name")}} <b class="red">*</b>
                                        :</label>
                                    <div class="col-sm-9">
                                        <input class="form-control inouttyeptext" name="company_name" id="company_name"
                                               value="{{$user->company_name}}" type="text">
                                        <span class="db i gray fs12 mt5 arial red"></span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="company_logo">{{__("messages.Company Logo")}} <b class="red">*</b>
                                        :</label>
                                    <div class="col-sm-9">
                                        <input class="form-control inouttyeptext" name="company_logo" type="file">
                                        <span class="db i gray fs12 mt5 arial red"></span>

                                    </div>
                                </div>


                                <div class=" form-grou row">
                                    <label class="col-md-3 control-label"></label>

                                    <div class="col-md-9">

                                        <a class="image" href="{{url('images/logo/'.$user->company_logo)}}"
                                           title="{{ $user->username}}" data-gallery>
                                            <img src="{{ url('images/logo/'.$user->company_logo)}}"
                                                 alt="{{ $user->username}}" width="173px" height="129px"/>
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="type">{{__("messages.Seller Type")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">

                                        @foreach($sellers as $seller)
                                            <div class="row">
                                                <div class="col-sm-1"><input type="checkbox" name="sellerType[]"
                                                                             value="{{$seller->title}}" {{in_array($seller->id,$user->sellers->pluck('id')->toArray())?"checked":""}} />
                                                </div>
                                                <div class="col-sm-9 spansellertype">{{__('messages.'.$seller->title)}}</div>
                                            </div>
                                        @endforeach
                                        <span class="db i gray fs12 mt5 arial red"></span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="category">{{__("messages.Category")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">

                                        <select name="category" id="category" class="form-control selectpicker"
                                                data-show-subtext="true" data-live-search="true">

                                            <option value="">{{__("messages.Select Category")}}</option>
                                            @foreach ($categories as $category)
                                                <option {{ $user->category->id == $category->id?"selected":"" }}
                                                        value="{{ $category->id }}">{{ $category->getCategoryTitle()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="dealsIn">{{__("messages.Deals In")}}
                                        <b class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <div style="height:200px;overflow:scroll; border:1px solid #ccc">
                                            <input type="text" id="search-criteria" value=""
                                                   placeholder="{{ __("messages.search")}}"
                                                   style=" width:100%">
                                            <span id="subcat_id_checkbox">
                                                @foreach($deals_in as $deal)

                                                    <div class="row">
                                                         <div class="col-sm-1" style="text-align: left">
                                                                         {{"|__"}}
                                                               </div>
                                                        <div class="col-sm-6">
                                                        <span>{{$deal->getCategoryTitle()}}</span></div>
                                                    </div>
                                                    @if($deal->descendants)
                                                        @foreach($deal->descendants as $descendants)
                                                            <div class='row contact-cat'>
                                                               <div class="col-sm-2" style="text-align: left">
                                                                         {{"|______"}}
                                                               </div>
                                                                <div class="col-sm-6">
                                                                          <input type="checkbox" name="dealsIn[]"
                                                                                 value="{{$descendants->id}}"
                                                                                  {{in_array($descendants->id,$user->categories->pluck('id')->toArray())?"checked":""}}>
                                                                         &nbsp;{{$descendants->getCategoryTitle()}}
                                                                </div>

                                                           </div>
                                                        @endforeach
                                                    @endif


                                                @endforeach
                                        </span></div>
                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="companyDetails">{{__("messages.Company Details")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                                    <textarea class="form-control inouttyeptext" name="companyDetails"
                                                              cols="40" rows="7" id="companyDetails"
                                                              class="db full">{{ $user->company_details  }}</textarea>
                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                            </fieldset>
                            <fieldset>
                                <p class="titlefieldset">{{__("messages.Contact Information")}}</p>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="name">{{__("messages.Owner Name")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <input class="inouttyeptext inputtype2" name="firstName" id="name" type="text"
                                               class="hlf" placeholder="First Name" value="{{$user->first_name}}">
                                        <input class="inouttyeptext inputtype2" name="lastName" id="name2" type="text"
                                               class="hlf" placeholder="Last Name" value="{{$user->last_name}}">
                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="Address">{{__("messages.Address")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control inouttyeptext" name="address" cols="40" rows="2"
                                                  id="Address" class="db full">{{ $user->address  }}</textarea>
                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="country">{{__("messages.Country")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <select name="country" id="country" class="form-control selectpicker"
                                                data-show-subtext="true" data-live-search="true">

                                            <option value="">{{__("messages.Select Country")}}</option>
                                            @foreach($countries as $country)
                                                <option {{ $user->country->id == $country->id ?"selected":"" }} value="{{ $country->id}}">{{$country->getName()}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="State">{{__("messages.State")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <select class="form-control inouttyeptext" name="state" id="State">
                                            @foreach($states as $state)
                                                <option {{ $user->state->id == $state['id']?"selected":"" }} value="{{ $state->id}}">{{$state->getName()}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="City">{{__("messages.City")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <select class="form-control inouttyeptext" name="city" id="City">
                                            @foreach($cites as $city)
                                                <option {{ $user->city->id == $city['id']?"selected":"" }} value="{{ $city->id}}">{{$city->getName()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="db i gray fs12 mt5 arial red"></span>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="pincode">{{__("messages.Pin Code")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <input class="form-control inouttyeptext isNumber" maxlength="10" name="pincode"
                                               id="pincode" value="{{$user->pincode}}" type="text">
                                        <span class="db i gray fs12 mt5 arial red"></span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="mobile">{{__("messages.Mobile No.")}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <input class="form-control inouttyeptext" value="{{ $user->mobile }}"
                                               name="mobile" id="mobile" type="text">
                                        <span class="db i gray fs12 mt5 arial red"></span>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="phone">{{__("messages.Phone No.")}}
                                        :</label>
                                    <div class="col-sm-9">
                                        <input class="form-control inouttyeptext" name="phoneNumber" id="phoneNumber"
                                               type="text" value="{{ $user->phone_number}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="website">{{__("messages.Website URL")}}
                                        :</label>
                                    <div class="col-sm-9">
                                        <input class="form-control inouttyeptext" value="{{ $user->website }}"
                                               name="website" id="website" type="text">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input name="register_me" type="submit" value="{{__("messages.Update Now")}}"
                                       class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        @include('banners.box_create')
                        @include('users.info_profile_user')
                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection
@section('javascript')
    <script type="text/javascript">

        $(document).ready(function (e) {
            var $select2 = $('#category').select2({
                placeholder: "{{__("messages.SELECT Category")}}",
                width: '65%',
                allowClear: true,
                data: [],
            }).on("change", function (e) {
                var parent_id = $('#category').val();
                $.get("/members/listSubCat?pid=" + parent_id, function (data) {
                    $('#subcat_id_checkbox').html(data.data);
                })
            })
            $('#search-criteria').keyup(function () {
                $('.contact-cat').hide();
                var txt = $('#search-criteria').val();
                console.log(txt);
                if (txt) {
                    $('.contact-cat').each(function () {
                        console.log($(this).text());
                        if ($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1) {
                            $(this).show();
                        }
                    });
                } else {
                    $('.contact-cat').show();

                }
            });
            var $select2 = $('#country').select2({
                placeholder: "{{__("messages.SELECT Country")}}",
                width: '65%',
                allowClear: true,
                data: [],
            }).on("change", function (e) {
                var country = $('#country').val();
                $('#State option').remove();
                console.log(country);
                $("#State").val('').trigger('change');
                $("#City").val('').trigger('change');
                if (country) {
                    $.get("/api/states?country=" + country, function (data) {
                        console.log(data);
                        var state = data;
                        console.log(state);
                        state.unshift({
                            id: "",
                            text: '{{__("messages.SELECT State")}}'
                        });
                        $("#State").select2({
                            placeholder: "{{__("messages.SELECT State")}}",
                            width: '65%',
                            allowClear: false,
                            data: state,
                        }).on("change", function (e) {
                            $('#City option').remove();
                            var state = $('#State').val();

                            if (state) {
                                console.log(parent);
                                $.get("/api/city?country=" + country + "&state=" + state, function (data) {
                                    console.log(data);
                                    var city = data;
                                    city.unshift({
                                        id: "",
                                        text: '{{__("messages.SELECT City")}}'
                                    });

                                    // mostly used event, fired to the original element when the value changes
                                    $("#City").select2({
                                        placeholder: "{{__("messages.SELECT City")}}",
                                        width: '65%',
                                        allowClear: true,
                                        data: city,
                                    });
                                });
                            } else {
                                $("#City").select2({
                                    placeholder: "{{__("messages.SELECT City")}}",
                                    width: '65%',
                                    allowClear: true,
                                    data: [],
                                })
                            }

                        })
                    });        // mostly used event, fired to the original element when the value changes
                } else {
                    $("#State").select2({
                        placeholder: "{{__("messages.SELECT State")}}",
                        width: '65%',
                        allowClear: true,
                        data: [],
                    });
                    $("#City").select2({
                        placeholder: "{{__("messages.SELECT City")}}",
                        width: '65%',
                        allowClear: true,

                        data: [],
                    })
                }
            });
            var country = $('#country').val();

            if (country) {
                $("#State").select2({
                    placeholder: "{{__("messages.SELECT State")}}",
                    width: '65%',
                    allowClear: false,
                    data: [],
                }).on("change", function (e) {
                    $('#City option').remove();
                    var state = $('#State').val();

                    if (state) {
                        console.log(state);
                        $.get("/api/city?country=" + country + "&state=" + state, function (data) {
                            console.log(data);
                            var city = data;
                            city.unshift({
                                id: "",
                                text: '{{__("messages.SELECT City")}}'
                            });

                            // mostly used event, fired to the original element when the value changes
                            $("#City").select2({
                                placeholder: "{{__("messages.SELECT City")}}",
                                width: '65%',
                                allowClear: true,
                                data: city,
                            });
                        });
                    } else {
                        $("#City").select2({
                            placeholder: "{{__("messages.SELECT City")}}",
                            width: '65%',
                            allowClear: true,

                            data: [],
                        })
                    }

                })
                var state = $('#State').val();

                if (state) {
                    console.log(state);
                    // mostly used event, fired to the original element when the value changes
                    $("#City").select2({
                        placeholder: "{{__("messages.SELECT City")}}",
                        width: '65%',
                        allowClear: true,
                        data: [],
                    });
                }
            }
        });
    </script>
@endsection
