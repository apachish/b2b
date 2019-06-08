@extends('layouts.admin')

@section('content')

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin')}}">{{ __("messages.Home") }}</a></li>
        <li><a href="{{ route('leads.index')}}">{{ __("messages.Leads") }}</a></li>

        <li class="active"><a href="#">{{ __("messages.Edit") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        @include('admin.error')
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('leads.update', array("id" => $lead->id))}} " id="jvalidate"
                      class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('PATCH')
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <strong>{{__('messages.Edit')}}</strong> {{__("messages.Lead")}} </h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{__("messages.[ ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Best image size 173X80 ) ]")}}
                                }}
                            </p>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="form-group ">

                                    <label class="col-sm-3 control-label"
                                           for="company_name">{{__('messages.Lead Type')}} <b class="red">*</b>
                                        :</label>
                                    <div class="col-sm-9">
                                        <p class="boxlead">
                                            <label>
                                                <input name="ad_type" type="radio"
                                                       value="sell" {{$lead->ad_type == 'sell' ? 'checked' : ""}}
                                                       onclick="$('.sell_only').show(0);" >
                                                {{__('messages.Sell Lead')}}</label>
                                            &nbsp;&nbsp;
                                            <label>
                                                <input name="ad_type" type="radio"
                                                       value="buy" {{$lead->ad_type == 'buy' ? 'checked' : ""}}
                                                       onclick="$('.sell_only').hide(0);">
                                                {{__('messages.Buy Lead')}}</label>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="col-sm-3 control-label"
                                           for="category">{{__('messages.Posted In')}} <b class="red">*</b>
                                        :</label>
                                    <div class="col-sm-9">

                                        <select name="category" id="category" class="form-control selectpicker"
                                                data-show-subtext="true" data-live-search="true">

                                            <option value="">{{__('messages.Select Category')}}</option>
                                            @foreach ($categories as $category)
                                                <option {{$parent_parent__id == $category->id ? "selected" : ""}}
                                                        value="{{ $category->id}}">{{ $category->getCategoryTitle()}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group " id="div_category2"
                                     style="{{ $subcategories  ? "" : "display: none" }}">
                                    <label class="col-sm-3 control-label" for="category2"></label>
                                    <div class="col-sm-9">
                                        <select name="category2" class="form-control" id="category2" class="mt5"
                                                data-show-subtext="true" data-live-search="true">
                                            <option value="">{{__('messages.Select Category')}}</option>
                                            @foreach ($subcategories as $category)
                                                <option {{ $parent_id == $category->id ? "selected" : ""}}
                                                        value="{{ $category->id}}">{{ $category->getCategoryTitle()}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group  " id="div_category3"
                                     style="{{ $sub_sub_categories ? "" : "display: none" }}">
                                    <label class="col-sm-3 control-label" for="category3"></label>
                                    <div class="col-sm-9">
                                        <select name="category3[]" class="form-control" id="category3" class="mt5"
                                                class="js-example-basic-multiple" multiple="multiple">
                                            <option value="">{{__('messages.Select Category')}}</option>
                                            @foreach ($sub_sub_categories as $category)

                                                <option {{ in_array($category->id,$category_lead->pluck('id')->toArray()) ? "selected" : ""}}
                                                        value="{{ $category->id}}">{{ $category->getCategoryTitle()}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"
                                    for="lead_title">{{__('messages.Title')}}
                                        <b class="red">*</b> :</label>
                                    <div class="col-sm-9">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input class="inouttyeptext form-control " name="name"
                                                   id="name"
                                            type="text" value="{{$lead->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{__("messages.meta Keywords") }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="tagsinput  form-control"
                                                  name="meta_keywords"
                                                  cols="40" rows="7" id="meta_keywords"
                                                  class="db full">{{$lead->meta_keywords}}</textarea>
                                        <span class="help-block"><{{__("messages.input different type title lead for search") }}</span>
                                    </div>
                                </div>
                                <div class="form-group sell_only" {{$lead->ad_type == '2' ? 'style="display: none"' : ''}} >
                                    <label class="col-sm-3 control-label"
                                           for="img1">{{__('messages.Product Images')}} <b class="red">*</b>
                                        :</label>
                                    <div class="col-sm-9">

                                        <div class="form-group">
                                            <label class="col-md-1 control-label">1.</label>
                                            <div class="col-md-11">
                                                <input type="file" class="form-control" name="image[0]" id="img1"/>
                                                <span class="help-block"><{{__("messages.Input type file") }}</span>
                                            </div>
                                        </div>
                                        <div class=" form-group gallery">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-9 gallery-item">
                                                <div class="image">
                                                    <a class="image" href="{{ url('images/medias/photos/'.data_get($lead,'medias.0.media','noImage.png')) }}"
                                                       title="{{$lead->id}}"
                                                       data-gallery>
                                                        <img src="{{ url('images/medias/photos/'.data_get($lead,'medias.0.media','noImage.png')) }}"
                                                             alt="{{$lead->id}}"
                                                             width="173px" height="129px"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-1 control-label">2.</label>
                                            <div class="col-md-11">
                                                <input type="file" class="form-control" name="image[1]" id="img2"/>
                                                <span class="help-block"><{{__("messages.Input type file") }}</span>
                                            </div>
                                        </div>
                                        <div class=" form-group gallery">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-9 gallery-item">
                                                <div class="image">
                                                    <a class="image" href="{{ url('images/medias/photos/'.data_get($lead,'medias.1.media','noImage.png')) }}"
                                                       title="{{$lead->id}}"
                                                       data-gallery>
                                                        <img src="{{ url('images/medias/photos/'.data_get($lead,'medias.1.media','noImage.png')) }}"
                                                             alt="{{$lead->id}}"
                                                             width="173px" height="129px"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-1 control-label">3.</label>
                                            <div class="col-md-11">
                                                <input type="file" class="form-control" name="image[2]" id="img3"/>
                                                <span class="help-block"><{{__("messages.Input type file") }}</span>
                                            </div>
                                        </div>
                                        <div class=" form-group gallery">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-9 gallery-item">
                                                <div class="image">

                                                    <a class="image" href="{{ url('images/medias/photos/'.data_get($lead,'medias.2.media','noImage.png')) }}"
                                                       title="{{$lead->id}}"
                                                       data-gallery>
                                                        <img src="{{url('images/medias/photos/'.data_get($lead,'medias.2.media','noImage.png'))  }}"
                                                             alt="{{$lead->id}}"
                                                             width="173px" height="129px"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-1 control-label">4.</label>
                                            <div class="col-md-11">
                                                <input type="file" class="form-control" name="image[3]" id="img4"/>
                                                <span class="help-block"><{{__("messages.Input type file") }}</span>
                                            </div>
                                        </div>
                                        <div class=" form-group gallery">
                                            <label class="col-md-3 control-label"></label>

                                            <div class="col-md-9 gallery-item">
                                                <div class="image">

                                                    <a class="image" href="{{url('images/medias/photos/'.data_get($lead,'medias.3.media','noImage.png')) }}"
                                                       title="{{$lead->id}}"
                                                       data-gallery>
                                                        <img src="{{ url('images/medias/photos/'.data_get($lead,'medias.3.media','noImage.png')) }}"
                                                             alt="{{$lead->id}}"
                                                             width="173px" height="129px"/>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  short_description">
                                    <label class="col-sm-3 control-label"
                                    for="short_description">{{__('messages.Short  Description')}} <b
                                                class="red">*</b> :</label>
                                    <div class=" col-sm-9">
                                        <textarea class="inouttyeptext form-control summernote"
                                                  name="description" cols="40" rows="2" id="productsDescription"
                                                  class="db full">{{$lead->description}}</textarea>
                                        <p class="charlimit"></p>
                                        <p>
                                            <span class="CharacterLimit">{{__('messages.Character Limit')}}: 200</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group  detail_description">
                                    <label class="col-sm-3 control-label"
                                    for="detail_description">{{__('messages.Detailed  Description')}} <b
                                                class="red">*</b> :</label>
                                    <div class=" col-sm-9">
                                        <textarea class="inouttyeptext form-control summernote"
                                                  name="detail_description"
                                                  cols="40" rows="7" id="detailDescription"
                                                  class="db full">{{$lead->detail_description}}</textarea>
                                        <p class="charlimit"></p>
                                        <p>
                                            <span class="CharacterLimit">{{__('messages.Character Limit')}}: 1000</span>
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary" type="reset"
                                    onClick="$('#validate').validationEngine('hide');"><{{__("messages.Clear Form") }}</button>
                            <button class="btn btn-primary submit"
                                    type="submit">{{__("messages.Edit") }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>

@endsection
@section('javascript')
    <link rel="stylesheet" href="{{ asset('select2/select2.css')}}">
    <script type="text/javascript" src="/select2/select2.min.js"></script>
    <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="/js/admin/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
    <script type="text/javascript" src="/js/admin/plugins/tagsinput/jquery.tagsinput.min.js"></script>

    <!-- END PAGE PLUGINS -->
    <script type="text/javascript" src="/js/admin/plugins/summernote/summernote.js"></script>

    <!-- START TEMPLATE -->

    <script>
        $(document).ready(function () {
            $('input[name="adType"]').on('change', function () {
                var val = $(this).val();
                if (val == "1") {
                    $('.sell_only').show()

                } else {
                    $('.sell_only').hide()
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
                            id: "",
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
                                $('#category3_div').show();
                                console.log(parent);
                                $.get("/api/categories/" + parent, function (data) {
                                    console.log(data);
                                    var categories = data.data;
                                    categories.unshift({
                                        id: "",
                                        text: '{{__("messages.SELECT Category")}}'
                                    });

                                    // mostly used event, fired to the original element when the value changes
                                    $("#category3").select2({
                                        placeholder: "{{__("messages.SELECT Category")}}",
                                        width: '70%',
                                        allowClear: true,
                                        data: categories,
                                    });
                                });
                            } else {
                                $('#category3_div').hide();
                                $("#category3").select2({
                                    placeholder: "{{__("messages.SELECT Category")}}",
                                    width: '70%',
                                    allowClear: true,
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
                        data: [],
                    })
                }
            });
            var parent_id = $('#category').val();

            if (parent_id) {
                $('#div_category2').show();
                $("#category2").select2({
                    placeholder: "{{__("messages.SELECT Category")}}",
                    width: '70%',
                    allowClear: false,
                    data: [],
                }).on("change", function (e) {
                    $('#category3 option').remove();
                    var parent = $('#category2').val();

                    if (parent) {
                        $('#div_category3').show();
                        console.log(parent);
                        $.get("/api/categories/"+ parent, function (data) {
                            console.log(data);
                            var categories = data.data;
                            categories.unshift({
                                id: "",
                                text: '{{__("messages.SELECT Category")}}'
                            });

                            // mostly used event, fired to the original element when the value changes
                            $("#category3").select2({
                                placeholder: "{{__("messages.SELECT Category")}}",
                                width: '70%',
                                allowClear: true,
                                data: categories,
                            });
                        });
                    } else {
                        $('#div_category3').hide();
                        $("#category3").select2({
                            placeholder: "{{__("messages.SELECT Category")}}",
                            width: '70%',
                            allowClear: true,
                            data: [],
                        })
                    }

                })
                var parent = $('#category2').val();

                if (parent) {
                    $('#div_category3').show();
                    console.log(parent);
                    // mostly used event, fired to the original element when the value changes
                    $("#category3").select2({
                        placeholder: "{{__("messages.SELECT Category")}}",
                        width: '70%',
                        allowClear: true,
                        data: [],
                    });
                }
            }


        })
        var postForm = function () {
            var content = $('#productsDescription').html($('.summernote').code());
            var content = $('#detailDescription').html($('.summernote').code());
        }
    </script>

@endsection