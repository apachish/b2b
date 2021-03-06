@extends('layouts.admin')

@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="/select2/select2.css">
</head>
<ul class="breadcrumb">
    <li><a href="{{route('admin')}}">{{__("messages.Home")}}</a></li>
    <li ><a href="{{ url('admin/menu/category') }}">{{__("messages.Menu Category")}}  </a></li>
    <li class="active"><a href="#">{{ __("messages.Add")  }}</a></li>
</ul>
<!-- END BREADCRUMB -->



<div class="page-content-wrap">
    @include('admin.error')

    <div class="row">
        <div class="col-md-12">
            <form   action="{{ route('menus.categories.store')}}" id="postForm"  class="form-horizontal"  method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{ __("messages.Add") }}</strong> {{ __("messages.Menu Category") }}</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <p>
                           {{ __("messages.Enter text to display on the screen here")  }}                        </p>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Title Menu") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="title" id="title" class=" form-control"/>
                                        </div>
                                        <span class="help-block">{{ __("messages.Except character:space-#-@-$ min value = 3") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Url") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="url" id="url" value="" class=" form-control"/>
                                        </div>
                                        <span class="help-block">{{ __("messages.url for title menu") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.meta Description") }}</label>
                                    <div class="col-md-9">
                                            <textarea name="meta_description" rows="5" id="meta_description" class=" form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.meta keyword") }}</label>
                                    <div class="col-md-9">
                                            <textarea name="meta_keyword" rows="5" id="meta_keyword" class=" form-control"></textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Select Domain")  }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control " name="portal_id[]" multiple>
                                            @foreach ($portals as $portal)
                                               <option value='{{$portal['id']}}'>{{$portal['title']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Select status") }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control " name="status">
                                            <option value=0 >{{ __("messages.Unactivated") }}</option>
                                            <option value=1 >{{ __("messages.active") }}</option>

                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Select Language") }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control " name="locale">
                                            <option value="en" >{{ __("messages.en_US") }}</option>
                                            <option value="fa" >{{ __("messages.fa_IR") }}</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Select Type Default") }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control " name="type_menu">
                                            <option  value="" >{{ __("messages.Select Type Default Menu") }}</option>
                                            <option  value="category" >{{ __("messages.Category") }}</option>
                                            <option value="product" >{{ __("messages.Lead") }}</option>
                                            <option  value="sell" >{{ __("messages.Sell Lead") }}</option>
                                            <option  value="buy" >{{ __("messages.Buy Lead") }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Position") }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control " name="position">
                                            <option  value="" >{{ __("messages.Select Type Default Menu") }}</option>
                                            <option  value="main_menu" >{{ __("messages.Main Menu") }}</option>
                                            <option  value="footer_1" >{{ __("messages.Footer 1") }}</option>
                                            <option  value="footer_2" >{{ __("messages.Footer 2") }}</option>
                                            <option  value="footer_3" >{{ __("messages.Footer 3") }}</option>
                                            <option  value="footer_4" >{{ __("messages.Footer 4") }}</option>
                                            <option  value="footer_5" >{{ __("messages.Footer 5") }}</option>
                                            <option  value="footer_6" >{{ __("messages.Footer 6") }}</option>
                                            <option  value="footer_7" >{{ __("messages.Footer 7") }}</option>
                                            <option  value="header_1" >{{ __("messages.Header 1") }}</option>
                                            <option  value="header_2" >{{ __("messages.Header 2") }}</option>
                                            <option  value="header_3" >{{ __("messages.Header 3") }}</option>
                                            <option  value="network" >{{ __("messages.Network") }}</option>
                                        </select>
                                        <span class="help-block">{{ __("messages.If Select not Load menu only load type select") }}</span>
                                    </div>
                                </div>
                                <div class="block push-up-10 ">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary" type="button" onClick="$('#validate').validationEngine('hide');">{{ __("messages.Clear Form") }}</button>
                        <button class="btn btn-primary submit" type="submit">{{ __("messages.Submit")  }}</button>
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

