@extends('layouts.admin')

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ url('admin') }}">{{ __("messages.Home") }}</a></li>
        <li><a href="{{ url('admin/category')}}">{{ __("messages.Category") }}</a></li>
        <li class="active"><a href="#">{{ __("messages.Create Category") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        @include('admin.categories.error')
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/categories) }}"
                      id="jvalidate" class="form-horizontal" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <strong>{{ __("messages.Create") }}</strong> {{ __("messages.Category") }}</h3>
                            <ul class="panel-controls">
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{ __("messages.[ ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Best image size 173X80 ) ]") }}
                            </p>
                        </div>
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Name") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="name" id="name"
                                                       class=" form-control" value="{{ old('name') }}"/>
                                            </div>
                                            <span class="help-block">{{ __("messages.Except character:space-#-@-$ min value = 3") }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Name Farsi") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="name_fa" id="name_fa"
                                                       class=" form-control" value="{{ old('name_fa') }}"/>
                                            </div>
                                            <span class="help-block">{{ __("messages.Except character:space-#-@-$ min value = 3 only persian") }}</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Description") }}</label>
                                        <div class="col-md-9 col-xs-12">
                                        <textarea class="form-control" name="description"
                                                  rows="5">{{ old('description') }}</textarea>
                                            <span class="help-block">{{ __("messages.Default textarea field") }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Image") }}</label>
                                        <div class="col-md-9">
                                            <input type="file" class="fileinput btn-primary" name="image"/>
                                            <span class="help-block">{{ __("messages.Input type file") }}</span>
                                        </div>
                                    </div>
                                    <div class=" form-group gallery" >
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-9 gallery-item">
                                            <div class="image">
                                                <a class="image" href="/images/category/noImage.png" title="" data-gallery>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Category") }}</label>
                                        <div class="col-md-9">
                                            <select id="category" class="form-control select" data-live-search="true"
                                                    name="category"
                                                    placeholder="{{ __("messages.Select a Category...") }}">

                                                <option value="">{{ __("messages.Select a Category...") }}</option>

                                                @foreach ($categories as $cat)
                                                    <option
                                                            value="{{ $cat->id }}">{{ $cat->title }}</option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Sub Category") }}</label>
                                        <div class="col-md-9">
                                            <select name="category2" id="category2" class="form-control select"
                                                    data-show-subtext="true" data-live-search="true">
                                                <option value=''>{{ __('messages.Select  Sub Category') }}</option>
                                            </select>

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Description Farsi") }}</label>
                                        <div class="col-md-9 col-xs-12">
                                        <textarea class="form-control" name="description_fa"
                                                  rows="5">{{ old('description_fa') }}</textarea>
                                            <span class="help-block">{{ __("messages.Default textarea field") }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Select status") }}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="status">
                                                <option value="0" >{{ __("messages.Unactivated") }}</option>
                                                <option value="1" >{{ __("messages.active") }}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-9">
                                            <label class="check"><input type="checkbox" class="icheckbox"
                                                                        name="feature"
                                                                        value="1"
                                                />{{ __("messages.Feature") }}</label>
                                            <span class="help-block">{{ __("messages.Selected For Feature Category") }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.meta Keywords")}}</label>
                                        <div class="col-md-9">
                                            <input type="text" name="metaKeywords" class="tagsinput" value="{{old('metaKeywords')}}"/>

                                            <span class="help-block">{{__("messages.input different type title category for search")}}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-primary" type="button"
                                    onClick="$('#validate').validationEngine('hide');">{{ __("messages.Clear Form") }}</button>
                            <button class="btn btn-primary submit" type="submit">{{ __("messages.Submit") }}</button>
                        </div>
                    </div>
                </form>
                <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
                <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
                <script type="text/javascript" src="/js/admin/plugins/bootstrap/bootstrap-select.js"></script>
                <script type="text/javascript" src="/js/admin/plugins/bootstrap/bootstrap-file-input.js"></script>
                <script type="text/javascript" src="/js/admin/settings.js"></script>
                <script type="text/javascript" src="/js/admin/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
                <script type="text/javascript" src="/js/admin/plugins/tagsinput/jquery.tagsinput.min.js"></script>

                <script type="text/javascript" src="/js/admin/plugins.js"></script>
                <script type="text/javascript" src="/js/admin/actions.js"></script>
                <script>
                    $(document).on('ready', function (e) {

                        $('#category').on("change", function (e) {
                            $("#category2").val('');
                            $("#category3").val('');
                            var parent_id = $('#category').val();
                            console.log(parent_id);
                            if (!parent_id) {
                                $("#div_category3").hide();
                                $("#div_category2").hide();
                            }
                            $("#div_category3").hide();
                            if (parent_id) {
                                $("#div_category2").show();
                                // mostly used event, fired to the original element when the value changes
                                $.ajax({
                                    url: "/api/categories/" + parent_id,
                                    type: 'Get',
                                    success: function (data) {
                                        var option = "<option value=''>{{__('messages.Select  Sub Category')}}</option>";
                                        if (data) {
                                            $.each(data, function (index, value) {
                                                option += "<option value='" + value.categoryId + "'>" + value.title + "</option>"
                                            });
                                            $('#category2').html(option);
                                            $('#category2').selectpicker('refresh');

                                        }
                                    }
                                    , error: function (jqXHR, textStatus, errorThrown) {

                                        //if fails
                                    }
                                });

                            }


                        });

                    });
                </script>
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
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-times"></span> {{ __("messages.Remove")}} <strong>{{ __("messages.Data")}}</strong> ?</div>
                <div class="mb-content">
                    <p>{{ __("messages.Are you sure you want to remove this row?")}}</p>
                    <p>{{ __("messages.Press Yes if you sure.")}}</p>
                    <input type="hidden" value="" id="Delete_id">

                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button class="btn btn-success btn-lg mb-control-yes">{{ __("messages.Yes")}}</button>
                        <button class="btn btn-default btn-lg mb-control-close">{{ __("messages.No")}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->

@endsection
