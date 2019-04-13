@extends('layouts.admin')

@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{ url('admin') }}">{{ __("Home") }}</a></li>
    <li><a href="{{ url('admin/category')}}">{{ __("Category") }}</a></li>
    <li class="active"><a href="#">{{ __("Edit Category") }}</a></li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    @include('admin.categories.error')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ url('admin/categories/'.$category->id) }}"
                  id="jvalidate" class="form-horizontal" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                @method('PATCH')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <strong>{{ __("Edit") }}</strong> {{ __("Category") }}</h3>
                        <ul class="panel-controls">
                        </ul>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ __("[ ( File should be .jpg, .png, .gif format and file size should not be more then 2 MB (2048 KB)) ( Best image size 173X80 ) ]") }}
                        </p>
                    </div>
                    <div class="panel-body">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Name") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="name" id="name"
                                                   class=" form-control" value="{{ $category->name }}"/>
                                        </div>
                                        <span class="help-block">{{ __("Except character:space-#-@-$ min value = 3") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Name Farsi") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="name_fa" id="name_fa"
                                                   class=" form-control" value="{{ $category->name_fa }}"/>
                                        </div>
                                        <span class="help-block">{{ __("Except character:space-#-@-$ min value = 3 only persian") }}</span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Description") }}</label>
                                    <div class="col-md-9 col-xs-12">
                                        <textarea class="form-control" name="description"
                                                  rows="5">{{ $category->description }}</textarea>
                                        <span class="help-block">{{ __("Default textarea field") }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Image") }}</label>
                                    <div class="col-md-9">
                                        <input type="file" class="fileinput btn-primary" name="image"/>
                                        <span class="help-block">{{ __("Input type file") }}</span>
                                    </div>
                                </div>
                                <div class=" form-group gallery" >
                                    <label class="col-md-3 control-label"></label>

                                    <div class="col-md-9 gallery-item">
                                        <div class="image">

                                            <a class="image" href="/images/category/{{ $category->image }}" title="{{ $category->name }}" data-gallery>
                                                <img src="/images/category/{{ $category->image }}" alt="{{ $category->name }}" width="173px" height="129px"/>
                                                @if(!empty($category->image) != 'noImage.png')
                                                    <ul class="gallery-item-controls">
                                                        <li><span class="gallery-item-remove" data-id="{{ $category['categoryId'] }}" data-message="true" ><i class="fa fa-times"></i></span></li>
                                                    </ul>
                                                @endif

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Category") }}</label>
                                    <div class="col-md-9">
                                        <select id="category" class="form-control select" data-live-search="true"
                                                name="category"
                                                placeholder="{{ __("Select a Category...") }}">

                                            <option value="">{{ __("Select a Category...") }}</option>

                                            @foreach ($categories as $cat)
                                            <option {{ $parent[0]->id == $cat->id ? 'selected' : '' }}
                                                    value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Sub Category") }}</label>
                                    <div class="col-md-9">
                                        <select name="category2" id="category2" class="form-control select"
                                                data-show-subtext="true" data-live-search="true">
                                            <option value=''>{{ __('Select  Sub Category') }}</option>

                                            @if (!empty($subcategories))
                                                @foreach ($subcategories as $sub_cat)
                                                    <option {{  $parent[1]->id == $sub_cat->id ? 'selected' : '' }}
                                                            value="{{ $sub_cat->id }}">{{ $sub_cat->title }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Description Farsi") }}</label>
                                    <div class="col-md-9 col-xs-12">
                                        <textarea class="form-control" name="description_fa"
                                                  rows="5">{{ $category->description_fa }}</textarea>
                                        <span class="help-block">{{ __("Default textarea field") }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("Select status") }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control " name="status">
                                            <option value="0" {{$category->status == 0 ? 'selected' : '' }}>{{ __("Unactivated") }}</option>
                                            <option value="1" {{$category->status == 1 ? 'selected' : '' }}>{{ __("active") }}</option>
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
                                                                    @if ($category->feature)
                                                                        checked="checked"
                                                                    @endif
                                            />{{ __("Feature") }}</label>
                                        <span class="help-block">{{ __("Selected For Feature Category") }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{__("meta Keywords")}}</label>
                                    <div class="col-md-9">
                                        <input type="text" name="metaKeywords" class="tagsinput" value="{{$category->metaKeywords}}"/>

                                        <span class="help-block">{{__("input different type title category for search")}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary" type="button"
                                onClick="$('#validate').validationEngine('hide');">{{ __("Clear Form") }}</button>
                        <button class="btn btn-primary submit" type="submit">{{ __("Submit") }}</button>
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
<div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-times"></span> {{ __("Remove")}} <strong>{{ __("Data")}}</strong> ?</div>
            <div class="mb-content">
                <p>{{ __("Are you sure you want to remove this row?")}}</p>
                <p>{{ __("Press Yes if you sure.")}}</p>
                <input type="hidden" value="" id="Delete_id">

            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <button class="btn btn-success btn-lg mb-control-yes">{{ __("Yes")}}</button>
                    <button class="btn btn-default btn-lg mb-control-close">{{ __("No")}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
@endsection
@section('javascript')
    <script type='text/javascript' src={{ asset('/js/admin/plugins/icheck/icheck.min.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/plugins/bootstrap/bootstrap-select.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/plugins/bootstrap/bootstrap-file-input.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/settings.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/plugins/blueimp/jquery.blueimp-gallery.min.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/plugins/tagsinput/jquery.tagsinput.min.js')}} defer></script>

    <script type="text/javascript" src={{ asset('/js/admin/plugins.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/actions.js')}} defer></script>
    <script type="text/javascript" src={{ asset('/js/admin/category.js')}} defer></script>

@endsection