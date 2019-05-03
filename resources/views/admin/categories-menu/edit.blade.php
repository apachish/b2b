@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" type="text/css" href="/select2/select2.css">

@endsection
@section('content')

    <ul class="breadcrumb">
        <li><a href="{{route('admin')}}">{{__("Home")}}</a></li>
        <li ><a href="{{ url('admin/menu/category') }}">{{__("Menu Category")}}  </a></li>
        <li class="active"><a href="#">{{ __("Add")  }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->



    <div class="page-content-wrap">
        @include('admin.error')
        <div class="row">
            <div class="col-md-12">
                <form   action="{{ route('menus.categories.update', ['id' => $category_menu->id]) }}" id="postForm"  class="form-horizontal"  method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PATCH')
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>{{ __("Add") }}</strong> {{ __("Menu Category") }}</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{ __("Enter text to display on the screen here")  }}                        </p>
                        </div>
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("Title Menu") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="title" id="title" value="{{$category_menu->title}}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{ __("Except character:space-#-@-$ min value = 3") }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("Url") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="url" id="url" value="{{$category_menu->url}}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{ __("url for title menu") }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("meta Description") }}</label>
                                        <div class="col-md-9">
                                            <textarea name="meta_description" rows="5" id="meta_description" class=" form-control">{{$category_menu->meta_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("meta keyword") }}</label>
                                        <div class="col-md-9">
                                            <textarea name="meta_keyword" rows="5" id="meta_keyword" class=" form-control">{{$category_menu->meta_keyword}}</textarea>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("Select Domain")  }}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="portal_id[]" multiple>
                                                @foreach ($portals as $portal)
                                                    <option
                                                            {{$category_menu->portals->contains('id',$portal->id) ? 'selected': ''}}
                                                            value='{{$portal['id']}}'>{{$portal['title']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("Select status") }}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="status">
                                                <option {{$category_menu->status =='-1'?'selected':''}} value=0 >{{ __("Unactivated") }}</option>
                                                <option {{$category_menu->status =='1'?'selected':''}} value=1 >{{ __("active") }}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("Select Language") }}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="locale">
                                                <option {{$category_menu->local =='en'?'selected':''}} value="en" >{{ __("en_US") }}</option>
                                                <option {{$category_menu->local =='fa'?'selected':''}} value="fa" >{{ __("fa_IR") }}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("Select Type Default") }}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="type_menu">
                                                <option   value="" >{{ __("Select Type Default Menu") }}</option>
                                                <option {{$category_menu->type_menu =='category'?'selected':''}}  value="category" >{{ __("Category") }}</option>
                                                <option {{$category_menu->type_menu =='product'?'selected':''}} value="product" >{{ __("Lead") }}</option>
                                                <option  {{$category_menu->type_menu =='sell'?'selected':''}} value="sell" >{{ __("Sell Lead") }}</option>
                                                <option  {{$category_menu->type_menu =='buy'?'selected':''}} value="buy" >{{ __("Buy Lead") }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("Position") }}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="position">
                                                <option  value="" >{{ __("Select Type Default Menu") }}</option>
                                                <option  {{$category_menu->position =='main_menu'?'selected':''}} value="main_menu" >{{ __("Main Menu") }}</option>
                                                <option  {{$category_menu->position =='footer_1'?'selected':''}} value="footer_1" >{{ __("Footer 1") }}</option>
                                                <option  {{$category_menu->position =='footer_2'?'selected':''}} value="footer_2" >{{ __("Footer 2") }}</option>
                                                <option  {{$category_menu->position =='footer_3'?'selected':''}} value="footer_3" >{{ __("Footer 3") }}</option>
                                                <option  {{$category_menu->position =='footer_4'?'selected':''}} value="footer_4" >{{ __("Footer 4") }}</option>
                                                <option  {{$category_menu->position =='footer_5'?'selected':''}} value="footer_5" >{{ __("Footer 5") }}</option>
                                                <option  {{$category_menu->position =='footer_6'?'selected':''}} value="footer_6" >{{ __("Footer 6") }}</option>
                                                <option  {{$category_menu->position =='footer_7'?'selected':''}} value="footer_7" >{{ __("Footer 7") }}</option>
                                                <option  {{$category_menu->position =='header_1'?'selected':''}} value="header_1" >{{ __("Header 1") }}</option>
                                                <option  {{$category_menu->position =='header_2'?'selected':''}} value="header_2" >{{ __("Header 2") }}</option>
                                                <option  {{$category_menu->position =='header_3'?'selected':''}} value="header_3" >{{ __("Header 3") }}</option>
                                                <option  {{$category_menu->position =='network'?'selected':''}} value="network" >{{ __("Network") }}</option>
                                            </select>
                                            <span class="help-block">{{ __("If Select not Load menu only load type select") }}</span>
                                        </div>
                                    </div>
                                    <div class="block push-up-10 ">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary" type="reset" onClick="$('#validate').validationEngine('hide');">{{ __("Clear Form") }}</button>
                            <button class="btn btn-primary submit" type="submit">{{ __("Submit")  }}</button>
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

            $('#change_type').on('change',function () {
                var select = $(this).val();
                switch (select){
                    case 'main_page':
                        $('.extend').hide();
                        break;
                    case 'category':
                        $('.extend').hide();
                        $('#'+select).show();
                        $('.select2_category').select2({
                            placeholder: "Select a Category",
                            width: '100%',
                            allowClear: true,
                            minimumInputLength: 2,
                            tags: [],
                            ajax: {
                                url: '/api/category',
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
                                        results: $.map(data, function(obj) {
                                            return { id: obj.friendlyUrl, text: obj.categoryName+'['+obj.categoryNameFa+']' };
                                        })
                                    };
                                }
                            }
                        }).on("change", function (e) {
                            $('#sub_category').show();
                            var parent_id= $('#select_category').val();
                            // mostly used event, fired to the original element when the value changes
                            $(".select2_subcategory").select2({
                                minimumInputLength: 2,
                                tags: [],
                                ajax: {
                                    url: "/api/category?p_pid="+parent_id,
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
                                                return { id: obj.friendlyUrl, text: obj.categoryName+'['+obj.categoryNameFa+']' };
                                            })
                                        };
                                    }
                                }
                            }).on("change", function (e) {
                                $('#sub_sub_category').show();

                                var parent_id= $('#select_category').val();
                                var parent= $('#select_sub_category').val();
                                // mostly used event, fired to the original element when the value changes
                                $(".select2_sub_subcategory").select2({
                                    minimumInputLength: 2,
                                    tags: [],
                                    ajax: {
                                        url: "/api/category?p_pid="+parent_id+"&pid="+parent,
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
                                                    return { id: obj.friendlyUrl, text: obj.categoryName+'['+obj.categoryNameFa+']' };
                                                })
                                            };
                                        }
                                    }
                                });
                            });;
                        });
                        break;
                    case 'article':
                        $('.extend').hide();
                        $('#'+select).show();
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
                                        results: $.map(data, function(obj) {
                                            return { id: obj.categoryId, text: obj.categoryName+'['+obj.categoryNameFa+']' };
                                        })
                                    };
                                }
                            }
                        })
                        break;
                    case 'page':
                        $('.extend').hide();
                        $('#'+select).show();
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
                                        results: $.map(data, function(obj) {
                                            return { id: obj.friendlyUrl, text: obj.pageName };
                                        })
                                    };
                                }
                            }
                        })
                        break;
                    case 'product':
                        $('.extend').hide();
                        $('#'+select).show();
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
                                        results: $.map(data, function(obj) {
                                            return { id: obj.categoryId, text: obj.categoryName+'['+obj.categoryNameFa+']' };
                                        })
                                    };
                                }
                            }
                        })
                        break;
                    case 'url':
                        $('.extend').hide();
                        $('#'+select).show();
                        break;
                }
            })
        })
    </script>

@endsection

