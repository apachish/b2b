@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="/select2/select2.css">
@endsection
@section('content')


    <ul class="breadcrumb">
        <li><a href="{{route('admin')}}">{{__("messages.Home")}}</a></li>
        <li><a href="{{route('menus.index')}}">{{ __("messages.Manage Menu")  }}</a></li>
        <li class="active"><a href="#">{{ __("messages.Add") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->



    <div class="page-content-wrap">
        @include('admin.error')

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('menus.store')}}" id="postForm" class="form-horizontal" method="post"
                      enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>{{__("messages.Add")}}</strong> {{__("messages.Menu")}}</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{ __("messages.Enter text to display on the screen here") }}                        </p>
                        </div>
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Title Menu")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="text" name="title" id="title" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("messages.Except character:space-#-@-$ min value = 3")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Type Menu")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " id="change_type" name="type">
                                                <option value="main_page">{{__("messages.Main Page")}}</option>
                                                <option value="category">{{__("messages.Category")}}</option>
                                                <option value="product">{{__("messages.Product")}}</option>
                                                <option value="article">{{__("messages.Article")}}</option>
                                                <option value="page">{{__("messages.Page")}}</option>
                                                <option value="url">{{__("messages.Url")}}</option>
                                                <option value="sitemap">{{__("messages.SiteMap")}}</option>
                                                <option value="member">{{__("messages.Member")}}</option>
                                                <option value="testimonials">{{__("messages.Testimonials")}}</option>
                                                <option value="help">{{__("messages.Help Center")}}</option>
                                                <option value="newsletter">{{__("messages.Newsletter")}}</option>
                                                <option value="advertisement">{{__("messages.Advertisement")}}</option>
                                                <option value="contact_us">{{__("messages.Contact Us")}}</option>
                                                <option value="company">{{__("messages.Company")}}</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="parent">
                                        <label class="col-md-3 control-label">{{__("messages.Select Category Menu ")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="parent" name="category">
                                                <option value="">{{__("messages.Select Category Menu")}}</option>

                                                @foreach ($category_menus as $category_menu)
                                                    <option value="{{$category_menu['id']}}">{{$category_menu['title']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="parent">
                                        <label class="col-md-3 control-label">{{__("messages.Select Parent")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="parent" name="parent">
                                                <option value="">{{__("messages.Select Parent")}}</option>

                                                @foreach ($menus as $menu)
                                                    <option value="{{$menu['id']}}">{{$menu['title']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="type_category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Select Category Type")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select_category_type" name="type_category">
                                                <option value="">{{__("messages.Select Category Type")}}</option>
                                                <option value="companies">{{__("messages.Companies")}}</option>
                                                <option value="buyselllead">{{__("messages.Product")}}</option>
                                                <option value="selllead">{{__("messages.Sell")}}</option>
                                                <option value="buy-lead">{{__("messages.Buy")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group extend" id="member_link" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Type Member Link")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select_member_link"
                                                    name="member_link_item">
                                                <option value="">{{__("messages.Select Mmber Link")}}</option>
                                                <option value="post_lead">{{__("messages.Post New Lead")}}</option>
                                                <option value="newleads">{{__("messages.Newly Added Products")}}</option>
                                                <option value="manage_leads">{{__("messages.Manage Leads")}}</option>
                                                <option value="manage_enquiry">{{__("messages.Manage Enquiries")}}</option>
                                                <option value="edit_account">{{__("messages.Update Profile Info")}}</option>
                                                <option value="logout">{{__("messages.LogOut")}}</option>
                                                <option value="login">{{__("messages.LogIn")}}</option>
                                                <option value="register">{{__("messages.Register")}}</option>
                                                <option value="my-account">{{__("messages.Profile")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="type_company" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Type Company")}}</label>
                                        <div class="col-md-9">

                                            <select class="form-control inouttyeptext" name="sellerType"
                                                    id="select_type_company">
                                                <option value="">{{__("messages.Select")}}</option>

                                                @foreach($seller_type as $seller)

                                                    <option value="{{$seller}}">{{$seller}}</option>
                                                @endforeach

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="type_lead" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Type Lead")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select_type_lead" name="type_lead">
                                                <option value="">{{__("messages.Select Type Lead")}}</option>
                                                <option value="buy">{{__("messages.Buy")}}</option>
                                                <option value="sell">{{__("messages.Sell")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Select Category")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_category" id="select_category"
                                                    name="category_item">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="sub_category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Select Sub Category")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_subcategory" id="select_sub_category"
                                                    name="sub_category">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="sub_sub_category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Select sub sub Category")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_sub_subcategory"
                                                    id="select_sub_sub_category" name="sub_sub_category">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="product" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Select Product")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_product" id="select_product"
                                                    name="product">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="article" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Select Article")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_article" id="select_article"
                                                    name="article">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="page" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Select Page")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_page" id="select_page" name="page">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="url" style="display: none">
                                        <label class="col-md-3 control-label">{{__("messages.Insert Url")}}</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="url" name="url">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.meta Description")}}</label>
                                        <div class="col-md-9">
                                            <textarea name="meta_description" rows="5" id="meta_description"
                                                      class=" form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.meta keyword")}}</label>
                                        <div class="col-md-9">
                                            <textarea name="meta_keyword" rows="5" id="meta_keyword"
                                                      class=" form-control"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Icon")}}</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="icon"/>
                                            <span class="help-block">{{__("messages.Input type file")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Class")}}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="class"/>
                                            <span class="help-block">{{__("messages.class for link")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Select status")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="status">
                                                <option value="-1">{{__("messages.Unactive")}}</option>
                                                <option value="1">{{__("messages.active")}}</option>
                                                <option value="2">{{__("messages.Deleted")}}</option>
                                                <option value="3">{{__("messages.Archive")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Order")}}</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control " name="orderMenu">
                                            <span class="help-block">{{__("messages.after item select location")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Select Language")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="locale">
                                                <option value="en">{{__("messages.en_US")}}</option>
                                                <option value="fa">{{__("messages.fa_IR")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Select permission")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="permission">
                                                <option value="">{{__("messages.Select Access")}}</option>
                                                <option value="admin">{{__("messages.Admin")}}</option>
                                                <option value="customer">{{__("messages.User")}}</option>
                                                <option value="guest">{{__("messages.Guest")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="block push-up-10 ">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary" type="button"
                                    onClick="$('#validate').validationEngine('hide');">{{__("messages.Clear Form")}}</button>
                            <button class="btn btn-primary submit" type="submit">{{__("messages.Submit")}}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

@section('javascript')
    <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="/select2/select2.min.js"></script>
    <!-- END PAGE PLUGINS -->

    <script type="text/javascript">
        $(document).ready(function () {

            $('#change_type').on('change', function () {
                var select = $(this).val();
                switch (select) {
                    case 'main_page':
                        $('.extend').hide();
                        break;
                    case 'member':
                        $('.extend').hide();
                        $('#member_link').show();
                        var link_member = $('#select_member_link').val();
                        if (link_member == 'post_lead' || link_member == "newleads") {
                            $('#type_lead').show();
                        } else {
                            $('#type_lead').hide();

                        }
                        break;
                    case 'company':
                        $('.extend').hide();
                        $('#type_company').show();
                        break;
                    case 'category':
                        $('.extend').hide();

                        $('#type_category').show();
                        $('#' + select).show();
                        $('.select2_category').select2({
                            placeholder: "{{__('messages.Select a Category')}}",
                            width: '100%',
                            minimumInputLength: 2,
                            tags: [],
                            ajax: {
                                url: '/api/categories',
                                dataType: 'json',
                                type: "GET",
                                quietMillis: 50,
                                data: function (term) {
                                    return {
                                        term: term
                                    };
                                },
                                processResults: function (data) {
                                    console.log(data);
                                    return {
                                        results: $.map(data.data, function (obj) {
                                            return {
                                                id: obj.id,
                                                text: obj.title
                                            };
                                        })
                                    };
                                }
                            }
                        }).on("change", function (e) {
                            $('#sub_category').show();
                            var parent_id = $('#select_category').val();
                            // mostly used event, fired to the original element when the value changes
                            $(".select2_subcategory").select2({
                                minimumInputLength: 2,
                                tags: [],
                                ajax: {
                                    url: "/api/categories/" + parent_id,
                                    dataType: 'json',
                                    type: "GET",
                                    quietMillis: 50,
                                    data: function (term) {
                                        return {
                                            term: term
                                        };
                                    },
                                    processResults: function (data) {
                                        return {
                                            results: $.map(data.data, function (obj) {
                                                return {
                                                    id: obj.id,
                                                    text: obj.title
                                                };
                                            })
                                        };
                                    }
                                }
                            }).on("change", function (e) {
                                $('#sub_sub_category').show();

                                var parent_id = $('#select_category').val();
                                var parent = $('#select_sub_category').val();
                                // mostly used event, fired to the original element when the value changes
                                $(".select2_sub_subcategory").select2({
                                    minimumInputLength: 2,
                                    tags: [],
                                    ajax: {
                                        url: "/api/categories/" + parent,
                                        dataType: 'json',
                                        type: "GET",
                                        quietMillis: 50,
                                        data: function (term) {
                                            return {
                                                term: term
                                            };
                                        },
                                        processResults: function (data) {
                                            return {
                                                results: $.map(data.data, function (obj) {
                                                    return {
                                                        id: obj.id,
                                                        text: obj.title
                                                    };
                                                })
                                            };
                                        }
                                    }
                                });
                            });
                            ;
                        });
                        break;
                    case 'article':
                        $('.extend').hide();
                        $('#' + select).show();
                        $('.select2_article').select2({
                            placeholder: "Select a Article",
                            width: '100%',
                            allowClear: true,
                            minimumInputLength: 2,
                            tags: [],
                            ajax: {
                                url: '/api/articles',
                                dataType: 'json',
                                type: "GET",
                                quietMillis: 50,
                                data: function (term) {
                                    return {
                                        term: term
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: $.map(data, function (obj) {
                                            return {
                                                id: obj.categoryId,
                                                text: obj.categoryName + '[' + obj.categoryNameFa + ']'
                                            };
                                        })
                                    };
                                }
                            }
                        })
                        break;
                    case 'page':
                        $('.extend').hide();
                        $('#' + select).show();
                        $('.select2_page').select2({
                            placeholder: "Select a Page",
                            width: '100%',
                            allowClear: true,
                            minimumInputLength: 2,
                            tags: [],
                            ajax: {
                                url: '/api/pages',
                                dataType: 'json',
                                type: "GET",
                                quietMillis: 50,
                                data: function (term) {
                                    return {
                                        term: term
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: $.map(data, function (obj) {
                                            return {id: obj.friendlyUrl, text: obj.pageName};
                                        })
                                    };
                                }
                            }
                        })
                        break;
                    case 'product':
                        $('.extend').hide();
                        $('#' + select).show();
                        $('.select2_product').select2({
                            placeholder: "Select a product",
                            width: '100%',
                            allowClear: true,
                            minimumInputLength: 2,
                            tags: [],
                            ajax: {
                                url: '/api/products',
                                dataType: 'json',
                                type: "GET",
                                quietMillis: 50,
                                data: function (term) {
                                    return {
                                        term: term
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: $.map(data, function (obj) {
                                            return {
                                                id: obj.categoryId,
                                                text: obj.categoryName + '[' + obj.categoryNameFa + ']'
                                            };
                                        })
                                    };
                                }
                            }
                        })
                        break;
                    case 'url':
                        $('.extend').hide();
                        $('#' + select).show();
                        break;
                }
            });
            $('#select_member_link').on('change', function () {
                var link_member = $(this).val();
                if (link_member == 'post_lead') {
                    $('#type_lead').show();
                } else {
                    $('#type_lead').hide();

                }
            })
        })
    </script>

@endsection

