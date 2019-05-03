@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="/select2/select2.css">
@endsection
@section('content')


    <ul class="breadcrumb">
        <li><a href="{{route('admin')}}">{{__("Home")}}</a></li>
        <li><a href="{{route('menus.index')}}">{{ __("Manage Menu")  }}</a></li>
        <li class="active"><a href="#">{{ __("Add") }}</a></li>
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
                            <h3 class="panel-title"><strong>{{__("Add")}}</strong> {{__("Menu")}}</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{ __("Enter text to display on the screen here") }}                        </p>
                        </div>
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Title Menu")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="text" name="title" id="title" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("Except character:space-#-@-$ min value = 3")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Type Menu")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " id="change_type" name="type">
                                                <option value="main_page">{{__("Main Page")}}</option>
                                                <option value="category">{{__("Category")}}</option>
                                                <option value="product">{{__("Product")}}</option>
                                                <option value="article">{{__("Article")}}</option>
                                                <option value="page">{{__("Page")}}</option>
                                                <option value="url">{{__("Url")}}</option>
                                                <option value="sitemap">{{__("SiteMap")}}</option>
                                                <option value="member">{{__("Member")}}</option>
                                                <option value="testimonials">{{__("Testimonials")}}</option>
                                                <option value="help">{{__("Help Center")}}</option>
                                                <option value="newsletter">{{__("Newsletter")}}</option>
                                                <option value="advertisement">{{__("Advertisement")}}</option>
                                                <option value="contact_us">{{__("Contact Us")}}</option>
                                                <option value="company">{{__("Company")}}</option>

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="parent">
                                        <label class="col-md-3 control-label">{{__("Select Category Menu ")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="parent" name="category">
                                                <option value="">{{__("Select Category Menu")}}</option>

                                                @foreach ($category_menus as $category_menu)
                                                    <option value="{{$category_menu['id']}}">{{$category_menu['title']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group" id="parent">
                                        <label class="col-md-3 control-label">{{__("Select Parent")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="parent" name="parent">
                                                <option value="">{{__("Select Parent")}}</option>

                                                @foreach ($menus as $menu)
                                                    <option value="{{$menu['id']}}">{{$menu['title']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="type_category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Select Category Type")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select_category_type" name="type_category">
                                                <option value="">{{__("Select Category Type")}}</option>
                                                <option value="companies">{{__("Companies")}}</option>
                                                <option value="buyselllead">{{__("Product")}}</option>
                                                <option value="selllead">{{__("Sell")}}</option>
                                                <option value="buylead">{{__("Buy")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group extend" id="member_link" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Type Member Link")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select_member_link"
                                                    name="member_link_item">
                                                <option value="">{{__("Select Mmber Link")}}</option>
                                                <option value="post_lead">{{__("Post New Lead")}}</option>
                                                <option value="newleads">{{__("Newly Added Products")}}</option>
                                                <option value="manage_leads">{{__("Manage Leads")}}</option>
                                                <option value="manage_enquiry">{{__("Manage Enquiries")}}</option>
                                                <option value="edit_account">{{__("Update Profile Info")}}</option>
                                                <option value="logout">{{__("LogOut")}}</option>
                                                <option value="login">{{__("LogIn")}}</option>
                                                <option value="register">{{__("Register")}}</option>
                                                <option value="myaccount">{{__("Profile")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="type_company" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Type Company")}}</label>
                                        <div class="col-md-9">

                                            <select class="form-control inouttyeptext" name="sellerType"
                                                    id="select_type_company">
                                                <option value="">{{__("Select")}}</option>

                                                @foreach($seller_type as $seller)

                                                    <option value="{{$seller}}">{{$seller}}</option>
                                                @endforeach

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="type_lead" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Type Lead")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="select_type_lead" name="type_lead">
                                                <option value="">{{__("Select Type Lead")}}</option>
                                                <option value="buy">{{__("Buy")}}</option>
                                                <option value="sell">{{__("Sell")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Select Category")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_category" id="select_category"
                                                    name="category_item">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="sub_category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Select Sub Category")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_subcategory" id="select_sub_category"
                                                    name="sub_category">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="sub_sub_category" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Select sub sub Category")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_sub_subcategory"
                                                    id="select_sub_sub_category" name="sub_sub_category">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="product" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Select Product")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_product" id="select_product"
                                                    name="product">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="article" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Select Article")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_article" id="select_article"
                                                    name="article">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="page" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Select Page")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control select2_page" id="select_page" name="page">

                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group extend" id="url" style="display: none">
                                        <label class="col-md-3 control-label">{{__("Insert Url")}}</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="url" name="url">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("meta Description")}}</label>
                                        <div class="col-md-9">
                                            <textarea name="meta_description" rows="5" id="meta_description"
                                                      class=" form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("meta keyword")}}</label>
                                        <div class="col-md-9">
                                            <textarea name="meta_keyword" rows="5" id="meta_keyword"
                                                      class=" form-control"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Icon")}}</label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control" name="icon"/>
                                            <span class="help-block">{{__("Input type file")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Class")}}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="class"/>
                                            <span class="help-block">{{__("class for link")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Select status")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="status">
                                                <option value="-1">{{__("Unactive")}}</option>
                                                <option value="1">{{__("active")}}</option>
                                                <option value="2">{{__("Deleted")}}</option>
                                                <option value="3">{{__("Archive")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Order")}}</label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control " name="orderMenu">
                                            <span class="help-block">{{__("after item select location")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Select Language")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="locale">
                                                <option value="en">{{__("en_US")}}</option>
                                                <option value="fa">{{__("fa_IR")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("Select permission")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="permission">
                                                <option value="">{{__("Select Access")}}</option>
                                                <option value="admin">{{__("Admin")}}</option>
                                                <option value="customer">{{__("User")}}</option>
                                                <option value="guest">{{__("Guest")}}</option>
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
                                    onClick="$('#validate').validationEngine('hide');">{{__("Clear Form")}}</button>
                            <button class="btn btn-primary submit" type="submit">{{__("Submit")}}</button>
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
                            placeholder: "{{__('Select a Category')}}",
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

