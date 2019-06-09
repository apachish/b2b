@extends('layouts.admin')

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{route('admin')}}">{{__("messages.Home")}}</a></li>
        <li><a href="{{ route('admin.members.index')}}">{{ __("messages.Members Management") }}</a></li>
        <li><a href="{{ route('admin.members.memberships.index')}}">{{ __("messages.Membership") }}</a></li>
        <li class="active"><a href="#">{{__("messages.Add")}}</a></li>
    </ul>
    <!-- END BREADCRUMB -->



    <div class="page-content-wrap">
        @include('admin.error')

        <div class="row">
            <div class="col-md-12">
                <form action="{{route("admin.members.memberships.store")}}" id="postForm" class="form-horizontal"
                      method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <strong>{{__("messages.Add")}}</strong> {{__("messages.MemberShip")}}</h3>
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
                                        <label class="col-md-3 control-label">{{__("messages.Membership Name")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="text" name="plan_name" id="plan_name"
                                                       value="{{ old('plan_name') }}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("messages.Except character:space-#-@-$ min value = 3")}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Membership Price")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="text" name="price" id="price" value="{{old('price')}}"
                                                       class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("messages.insert only number")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Membership Duration")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <select name="duration" id="duration" data-live-search="true"
                                                        class="form-control">
                                                    <option value="">{{__("messages.Select Membership Duration")}}</option>

                                                    @for($i=1;$i<=12;$i++)
                                                        <option {{ old('duration')?'selected':''}} value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <span class="help-block">{{__("messages.select number")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Allow Select Category")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="number" name="no_of_category" id="no_of_category"
                                                       value="{{ old('no_of_category') }}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("messages.insert only number")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Allow Create Lead")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="number" name="product_upload" id="product_upload"
                                                       value="{{ old('product_upload') }}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("messages.insert only number")}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.No. Of Enquiry")}}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span
                                                            class="fa fa-pencil"></span></span>
                                                <input type="number" name="no_of_enquiry" id="no_of_enquiry"
                                                       value="{{ old('no_of_enquiry') }}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{__("messages.insert only number")}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Select status")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="status">
                                                <option value="0" {{ old('status')== 0?'selected':'' }}>{{__("messages.Inactive")}}</option>
                                                <option value="1" {{ old('status')== 1?'selected':'' }}>{{__("messages.active")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{__("messages.Select Language")}}</label>
                                        <div class="col-md-9">
                                            <select class="form-control " name="language">
                                                <option {{  old('language')== 'fa'?'selected':'' }} value="fa">{{__("messages.fa")}}</option>
                                                <option {{ old('language') == 'en'?'selected':'' }} value="en">{{__("messages.en")}}</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="block push-up-10 ">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-primary" type="button"
                                        onClick="$('#validate').validationEngine('hide');">{{__("messages.Clear Form")}}</button>
                                <button class="btn btn-primary submit" type="submit">{{__("messages.Edit")}}</button>
                            </div>
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
        $(function () {
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
        var postForm = function () {
            var content = $('textarea[name="description"]').html($('.summernote').code());

        }
    </script>

@endsection

