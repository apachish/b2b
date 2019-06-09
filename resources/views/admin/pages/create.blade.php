@extends('layouts.admin')

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{route('admin')}}">{{__("messages.Home")}}</a></li>
        <li ><a href="{{route('pages.index')}}">{{__("messages.Pages")}}</a></li>
        <li class="active"><a href="#">{{__("messages.Add")}}</a></li>
    </ul>
    <!-- END BREADCRUMB -->



    <div class="page-content-wrap">
        @include('admin.error')

        <div class="row">
            <div class="col-md-12">
                <form   action="{{route("pages.store")}}" id="postForm"  class="form-horizontal"  method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>{{__("messages.Add")}}</strong> {{__("messages.Page")}}</h3>
                            <ul class="panel-controls">
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>{{__("messages.Enter text to display on the screen here")}}</p>
                        </div>
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Title")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="name" id="name" value="{{old('name')}}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("messages.Except character:space-#-@-$ min value = 3")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.page Short Description")}}</label>
                                        <div class="col-md-9 col-xs-12">
                                            <textarea class="form-control" name="short_description" rows="5">{{old('short_description')}}</textarea>
                                            <span class="help-block">{{__("messages.short text view description")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Page Description")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <textarea name="description" id="description" class=" form-control summernote">{{  old('description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Image")}}</label>
                                        <div class="col-md-9">
                                            <input type="file" multiple class="file" name="image" data-preview-file-type="any"/>
                                            <span class="help-block">{{__("messages.Input type file")}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Select status")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="status">
                                                <option value="0" {{old('status')==0?"selected":""}} >{{__("messages.Unactivated")}}</option>
                                                <option value="1" {{old('status')?"selected":""}} >{{__("messages.active")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Select Language")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="language">
                                                <option value="en" {{old('language')=='en'?"selected":""}}>{{__("messages.en_US")}}</option>
                                                <option value="fa"  {{old('language')=='fa'?"selected":""}}>{{__("messages.fa_IR")}}</option>
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
                            <button class="btn btn-primary" type="button" onClick="$('#validate').validationEngine('hide');">{{__("messages.Clear Form")}}</button>
                            <button class="btn btn-primary submit" type="submit">{{__("messages.Edit")}}</button>
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
    <script type="text/javascript" src="/js/admin/plugins/fileinput/fileinput.min.js"></script>

    <script type="text/javascript" src="/js/admin/plugins/summernote/summernote.js"></script>
    <!-- END PAGE PLUGINS -->

    <!-- START TEMPLATE -->

    <script type="text/javascript">
        $(function(){
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });
            // $("#filetree").fileTree({
            //     root: '/',
            //     script: 'assets/filetree/jqueryFileTree.php',
            //     expandSpeed: 100,
            //     collapseSpeed: 100,
            //     multiFolder: false
            // }, function(file) {
            // }, function(dir){
            //     setTimeout(function(){
            //         page_content_onresize();
            //     },200);
            // });
        });
        var postForm = function() {
            var content = $('textarea[name="description"]').html($('.summernote').code());

        }
    </script>

@endsection

