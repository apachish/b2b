@extends('layouts.main')
@section('css')
    <style>

        @import "/css/admin/fontawesome/font-awesome.min.css";


        .tag {
            top: 0px;
        }

        div.tagsinput {
            border: 1px solid #D5D5D5;
            background: #FFF;
            width: 100%;
            min-height: 30px;
            /*overflow-y: auto;*/
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            padding-left: 10px;
        }

        div.tagsinput span.tag {
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            display: block;
            float: left;
            text-decoration: none;
            background: #1b1e24;
            color: #FFF;
            margin: 2px 0px 2px 2px;
            line-height: 20px;
            padding: 2px 5px 2px 20px;
            position: relative;
        }

        div.tagsinput span.tag a {
            color: #FFF;
            text-decoration: none;
            position: absolute;
            left: 5px;
            width: 15px;
            height: 20px;
            opacity: 0.5;
            filter: alpha(opacity=50);
        }

        div.tagsinput span.tag a:hover {
            opacity: 1;
            filter: alpha(opacity=100);
        }

        div.tagsinput span.tag a:before {
            position: absolute;
            font-family: "FontAwesome";
            content: "\f00d";
            color: #FFF;
            font-size: 12px;
            line-height: 20px;
        }

        div.tagsinput input {
            width: 80px;
            margin: 4px 5px;
            border: 0px;
            height: 20px;
            line-height: 20px;
        }

        div.tagsinput div {
            display: block;
            float: left;
        }

        .tags_clear {
            clear: both;
            width: 100%;
            height: 0px;
        }

        .not_valid {
            background: #E04B4A !important;
            color: #FFF !important;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            padding: 0px 5px;
        }

        /* END tagsinput */
        .dashboardnav #navigation .nav ul.nav li > a.act {
            color: #fff;
            background: #555;
            padding: 2px 30px 2px 30px;
        }

    </style>
@endsection
@section('content')



    <!-- TOP dashbord menu -->
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
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{__("messages.Manage Leads")}}</span></a>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->

        <section class="contentinnerwrapper">
            <div class="container">
                @include('users.info_user')
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{__('messages.Post New Lead')}}</h2>
                        <form class="changpass editlead" id="create_lead" enctype="multipart/form-data" method="post"
                              action="{{route('members.leads.post.store')}}">
                            {{csrf_field()}}
                            <fieldset>
                                <p class="textform">{{__('messages.Insert Your Lead Information')}} </p>
                                <div class="row">
                                    @include('leads.error')

                                </div>
                                <div class="form-group row">

                                    <label class="col-sm-3 col-form-label" for="adType">{{ __('messages.Lead Type')}} <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <p class="boxlead">
                                            <label>
                                                <input name="ad_type" type="radio" value="sell"
                                                       {{($type_ad=='sell')?'checked':""}} onclick="$('.sell_only').show(0);"
                                                       title="{{__('messages.adType')}}">
                                                {{__('messages.Sell Lead')}}</label>
                                            &nbsp;&nbsp;
                                            <label>
                                                <input name="ad_type" type="radio" value="buy"
                                                       {{($type_ad=='buy')?'checked':""}} onclick="$('.sell_only').hide(0);"
                                                       title="{{__('messages.adType')}}">
                                                {{__('messages.Buy Lead')}}</label>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="category">{{__('messages.Posted In')}}
                                        <b class="red">*</b> :</label>
                                    <div class="col-sm-9">

                                        <select name="category" id="category" class="selectpicker form-control"
                                                data-show-subtext="true" data-live-search="true"
                                                title="{{__('messages.categoryId')}}">

                                            <option value="">{{__('messages.Select Category')}}</option>
                                            @foreach ($categories as $category)
                                            <option {{sizeof($categories)==1?"selected":""}} value="{{$category->id}}">{{$category->getCategoryTitle()}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row" id="div_category2"
                                     style="{{$subcategories ? "" : "display: none"}}">
                                    <label class="col-sm-3 col-form-label" for="category2"></label>
                                    <div class="col-sm-9">
                                        <select name="category2" id="category2" class="mt5 form-control"
                                                data-show-subtext="true" data-live-search="true">
                                            <option value="">{{__('messages.Select Category')}}</option>
                                            @foreach ($subcategories as $category):?>
                                            <option {{sizeof($categories)==1?"selected":""}} value="{{$category->id}}">{{$category->getCategoryTitle()}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row " id="div_category3" style="display: none">
                                    <label class="col-sm-3 col-form-label" for="category3"></label>
                                    <div class="col-sm-9">
                                        <select name="category3[]" id="category3" class="mt5 form-control"
                                                class="js-example-basic-multiple" multiple="multiple">
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"
                                           for="lead_title"><?=__('messages.Product Name/Service')?> <b
                                                class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <input class="inouttyeptext form-control " name="name" id="name"
                                               type="text" value="{{old('name')}}">
                                        <input type="hidden" name="sort_order" value="{{$sort_order}}">
                                    </div>
                                </div>

                                <div class="form-group row sell_only" style="{{($type_ad == 'buy' ) ? "display: none" : ''}}" >
                                    <label class="col-sm-3 col-form-label" for="img1">{{__('messages.Product Images')}}
                                        <b class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <p class="boxlead"> 1.
                                            <input name="image[0]" id="img1" type="file" class="w90 form-control"
                                                   style="border:0" title="{{__('messages.Image')}}">
                                        </p>
                                        <p class="boxlead"> 2.
                                            <input name="image[1]" id="img2" type="file" class="w90 form-control"
                                                   style="border:0" title="{{__('messages.Image')}}">
                                        </p>
                                        <p class="boxlead"> 3.
                                            <input name="image[2]" id="img3" type="file" class="w90 form-control"
                                                   style="border:0" title="{{__('messages.Image')}}">
                                        </p>
                                        <p class="boxlead"> 4.
                                            <input name="image[4]" id="img4" type="file" class="w90 form-control"
                                                   style="border:0" title="{{__('messages.Image')}}">
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row short_description">
                                    <label class="col-sm-3 col-form-label"
                                           for="short_description">{{__('messages.Short Description')}} <b
                                                class="red">*</b>
                                        :</label>
                                    <div class=" col-sm-9">
                                        <textarea class="inouttyeptext form-control " name="description"
                                                  cols="40" rows="2" id="productsDescription" class="db full"
                                                  title="{{__('messages.productsDescription')}}">{{old('description')}}</textarea>
                                        <p class="charlimit"></p>
                                        <p><span class="CharacterLimit">{{__('messages.Character Limit')}}: 40</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group row detail_description">
                                    <label class="col-sm-3 col-form-label"
                                           for="detail_description">{{__('messages.Detailed Description')}} <b
                                                class="red">*</b> :</label>
                                    <div class=" col-sm-9">
                                        <textarea class="inouttyeptext form-control " name="detail_description"
                                                  cols="40"
                                                  rows="7" id="detailDescription" class="db full"
                                                  title="{{__('messages.detailDescription')}}">{{old('detail_description')}}</textarea>
                                        <p class="charlimit"></p>
                                        <p><span class="CharacterLimit">{{__('messages.Character Limit')}}: 1000</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row detail_description">
                                    <label class="col-sm-3 col-form-label"
                                           for="detail_description">{{__('messages.meta Keywords')}} <b
                                                class="red">*</b> :</label>
                                    <div class=" col-sm-6">
                                        <input type="text" id="metaKeywords" name="meta_keywords"
                                               value="{{old('meta_keywords')}}"
                                               class=" inouttyeptext  form-control tagsinput"/>
                                        <p>{{__('messages.Different types of writing this product')}} </p>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    @if($AllowedUploadProduct)
                                        <input name="register_me" type="submit" value="{{__('messages.Post Now')}}"
                                               class="btn btn-primary">
                                    @else

                                        <input name="register_me"
                                               onclick="location.href='{{url('members/membership_plans')}}'"
                                               value="{{__('messages.Upgrade MemberShip')}}" class="btn btn-primary">
                                    @endif
                                    <input name="reset" type="reset" value="{{__('messages.Reset')}}"
                                           class="btn btn-dark">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                        @include('banners.box_create')
                        @include('users.info_profile_user')


                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('javascript')

    <script type="text/javascript" src="/js/admin/plugins/tagsinput/jquery.tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('input[name="adType"]').on('change', function () {
                var val = $(this).val();

                if (val == "sell") {
                    $('.sell_only').show()
                    $('#div_category2').hide();
                    $('#div_category3').hide();

                    $('#category option').remove();
                    $('#category2 option').remove();
                    $('#category3 option').remove();
                    $.get("/api/categories/show/{{$id_category_user}}", function (data) {
                        console.log(data);
                        var categories = data.data;
                        console.log(categories);
                        categories.unshift({
                            id: "",
                            text: '{{__("messages.SELECT Category")}}'
                        });
                        $("#category").select2({
                            placeholder: "{{__("messages.SELECT Category")}}",
                            width: '70%',
                            allowClear: false,
                            data: categories,
                        })
                    });
                } else {
                    $('.sell_only').hide();
                    $('#div_category2').hide();
                    $('#div_category3').hide();

                    $('#category option').remove();
                    $('#category2 option').remove();
                    $('#category3 option').remove();
                    $.get("/api/categories", function (data) {
                        console.log(data);
                        var categories = data.data;
                        console.log(categories);
                        categories.unshift({
                            id: "",
                            text: '{{__("messages.SELECT Category")}}'
                        });
                        $("#category").select2({
                            placeholder: "{{__("messages.SELECT Category")}}",
                            width: '70%',
                            allowClear: false,
                            data: categories,
                        })
                    });
                }
            })

            var $select2 = $('#category').select2({
                placeholder: "{{__("messages.SELECT Category")}}",
                width: '70%',
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
                            width: '70%',
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
                                        width: '70%',
                                        allowClear: true,
                                        maximumSelectionLength: "{{$selectItem}}",

                                        data: categories,
                                    });
                                });
                            } else {
                                $('#div_category3').hide();
                                $("#category3").select2({
                                    placeholder: "{{__("messages.SELECT Category")}}",
                                    width: '70%',
                                    allowClear: true,
                                    maximumSelectionLength: "{{$selectItem}}",

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
                        width: '70%',
                        allowClear: true,

                        data: [],
                    });
                    $("#category3").select2({
                        placeholder: "{{__("messages.SELECT Category")}}",
                        width: '70%',
                        allowClear: true,
                        maximumSelectionLength: "{{$selectItem}}",

                        data: [],
                    })
                }
            });
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
                        width: '70%',
                        allowClear: false,
                        data: categories,
                    }).on("change", function (e) {
                        $('#category3 option').remove();
                        var parent = $('#category2').val();

                        if (parent) {
                            $('#div_category3').show();
                            console.log(parent);
                            $.get("/api/categories/" + parent_id, function (data) {
                                console.log(data);
                                var categories = data.data;
                                categories.unshift({
                                    id: "0",
                                    text: '{{__("messages.SELECT Category")}}'
                                });

                                // mostly used event, fired to the original element when the value changes
                                $("#category3").select2({
                                    placeholder: "{{__("messages.SELECT Category")}}",
                                    width: '70%',
                                    allowClear: true,
                                    maximumSelectionLength: "{{$selectItem}}",

                                    data: categories,
                                });
                            });
                        } else {
                            $('#div_category3').hide();
                            $("#category3").select2({
                                placeholder: "{{__("messages.SELECT Category")}}",
                                width: '70%',
                                allowClear: true,
                                maximumSelectionLength: "{{$selectItem}}",

                                data: [],
                            })
                        }

                    })
                });        // mostly used event, fired to the original element when the value changes
            }
            if ($(".tagsinput").length > 0) {

                $(".tagsinput").each(function () {

                    if ($(this).data("placeholder") != '') {
                        var dt = "{{__("messages.add a Meta Keyword")}}";
                    } else
                        var dt = "{{__("messages.add a Meta Keyword")}}";

                    $(this).tagsInput({width: '100%', height: 'auto', defaultText: dt});
                });

            }
        })

    </script>
@endsection
