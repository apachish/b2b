@extends('layouts.admin')

@section('content')

    <ul class="breadcrumb">
        <li><a href="{{route('admin')}}">{{__("messages.Home")}}</a></li>
        <li><a href="{{route('pages.index')}}">{{__("messages.Member")}}</a></li>
        <li class="active"><a href="#">{{__("messages.Edit")}}</a></li>
    </ul>
    <!-- END BREADCRUMB -->



    <div class="page-content-wrap">
        @include('admin.error')

        <div class="row">
            <div class="col-md-12">
                <form action="{{route("articles.update",['id'=>$article->id])}}" id="postForm" class="form-horizontal"
                      method="post" enctype="multipart/form-data">

                    {{csrf_field()}}
                    @method('PATCH')
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>{{__("messages.Edit")}}</strong> {{__("messages.Member")}}
                            </h3>
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
                                        <label class="col-md-3 control-label">{{ __("messages.FirstName") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" name="firstname" id="firstname"
                                                       value="{{ $member->firstName }}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{ __("messages.Except character:space-#-@-$ min value = 3") }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.LastName") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input type="text" name="lastName" id="lastName"
                                                       value="{{ $member->lastName }}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{ __("messages.Except character:space-#-@-$ min value = 3") }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Company Name") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span
                                                        class="fa fa-building-o"></span></span>
                                                <input type="text" name="companyName" id="companyName"
                                                       value="{{ $member->companyName }}" class=" form-control"/>
                                            </div>
                                            <span class="help-block">{{ __("messages.Except character:space-#-@-$ min value = 3") }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Logo Company") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="file" class="fileinput btn-danger" name="companyLogo"
                                                       id="companyLogo" data-filename-placement="inside"
                                                       title="{{ __("messages.Upload Logo Company") }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <a class="image"
                                                   href="{{url('images/logo/'.$member->company_logo)}}"
                                                   title="{{ $member->company_name }}" data-gallery>
                                                    <img src="{{ url('images/logo/'.$member->company_logo) }}"
                                                         alt="{{ $member->company_name }}" width="173px"
                                                         height="129px"/>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Avatar") }}</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="file" class="fileinput btn-danger" name="image_path"
                                                       id="image_path" data-filename-placement="inside"
                                                       title="{{ __("messages.Upload Avatar User") }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-9">
                                            <div class="input-group">

                                                <a class="image"
                                                   href="{{url('images/logo/'.$member->image_path) }}"
                                                   title="{{ $member->first_name }}" data-gallery>
                                                    <img src="{{ url('images/logo/'.$member->image_path) }}"
                                                         alt="{{ $member->first_name }}" width="173px"
                                                         height="129px"/>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Select Seller Type") }}</label>
                                        <div class="col-md-9">
                                            @foreach($sellers as $seller)
                                                <p><input type="checkbox" name="sellerType[]" value="{{$seller->id}}"
                                                            {{in_array($seller->id,$member->sellers->pulck('id')->toArray())?"checked":""}}/>
                                                    <span style="margin-right: 20px;font-size: small">{{__('messages.'.$seller->title)}}</span>
                                                </p>
                                            @endforeach

                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Category") }}</label>
                                        <div class="col-md-9">
                                            <select id="category" name="category" class="demo-default"
                                                    placeholder="{{ __("messages.Select a Category...") }}">
                                                <option value="">{{ __('messages.Select Category') }}</option>
                                                @foreach ($categories as $category)
                                                    <option {{ $member->category == $category->id ? "selected" : "" }}
                                                            value="{{ $category->id }}">{{ $category->getCategoryTitle() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{ __("messages.Deals In") }}</label>
                                        <div class="col-md-9">

                                        <div style="height:200px;overflow:scroll; border:1px solid #ccc">
                                            <input type="text" id="search-criteria" value=""
                                                   placeholder="{{ __("messages.search") }}" style=" width:100%">
                                            <span id="subcat_id_checkbox">
                                 if ($this->countCategory($filter)) {
                    if ($category_name) {
                        $var .= '<p><span  >' . $pad . $category_name . '</span></p>';
                        $var .= $this->get_nested_dropdown_menu_checkbox($parent_id, $parent, $selectId, '&nbsp;&nbsp;&nbsp;' . $pad);
                    }

                } else {
                    if ($category_name) {
                        $sel2 = (in_array($row['id'], $selectId)) ? "checked" : "";
                        $var .= "<div class='contact-cat' ><p >".$pad . '<input type="checkbox" name="dealsIn[]" value="' . $row['id'] . '" ' . $sel2 . ' > &nbsp;' . $category_name . ' </p></div> ';
                    }

                }

        </span></div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Company Details") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <textarea name="companyDetails" id="companyDetails"
                                                      class=" form-control summernote">{{ $member->companyDetails }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Address") }}</label>
                                    <div class="col-md-9">
                                        <textarea name="address" id="address" rows="5"
                                                  class="form-control">{{ $member->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Country") }}</label>
                                    <div class="col-md-9">
                                        <select id="country" name="country" class="demo-default"
                                                placeholder="{{ __("messages.Select a Country...") }}">
                                            <option value="">{{ __('messages.Select Country') }}</option>
                                            <?php foreach ($countries as $country): }}
                                            <option {{ $member->country == (int)$country['id ? "selected" : "" }}
                                                    value="{{ $country['id }}">{{ $country['text }}</option>
                                            <?php endforeach; }}
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.State") }}</label>
                                    <div class="col-md-9">
                                        <select id="State" name="state" class="demo-default"
                                                placeholder="{{ __("messages.Select a State...") }}">
                                            <?php foreach ($states as $state): }}
                                            <option {{ $member->state == (int)$state['id ? "selected" : "" }}
                                                    value="{{ $state['id }}">{{ $state['text }}</option>
                                            <?php endforeach; }}
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.City") }}</label>
                                    <div class="col-md-9">
                                        <select id="City" name="city" class="demo-default"
                                                placeholder="{{ __("messages.Select a City...") }}">
                                            <?php foreach ($cites as $city): }}
                                            <option {{ $member->city == (int)$city['id ? "selected" : "" }}
                                                    value="{{ $city['id }}">{{ $city['text }}</option>
                                            <?php endforeach; }}
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Pin Code") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                            <input type="text" name="pincode" id="pincode"
                                                   onkeypress="return isNumber(event)"
                                                   value="{{ $member->pincode }}" class=" form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Phone Number") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                            <input type="text" name="phoneNumber" id="phoneNumber"
                                                   onkeypress="return isNumber(event)"
                                                   value="{{ $member->phoneNumber }}" class=" form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Mobile") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span class="fa fa-mobile"></span></span>
                                            <input type="text" name="mobile" id="mobile"
                                                   onkeypress="return isNumber(event)"
                                                   value="{{ $member->mobile }}" class=" form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.website") }}</label>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon"><span class="fa fa-globe"></span></span>
                                            <input type="text" name="website" id="mobile"
                                                   value="{{ $member->website }}" class=" form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Bio") }}</label>
                                    <div class="col-md-9">
                                        <textarea name="bio" id="bio"
                                                  class=" form-control summernote">{{ $member->bio }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Select status") }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control select" data-live-search="true" name="status">
                                            <option value="-1"
                                            {{ (isset($member->status) && $member->status == -1) ? 'selected' : '' }}>{{ __("messages.Unactive") }}</option>
                                            <option value="1" {{ (isset($member->status) && $member->status == 1) ? 'selected' : '' }}>{{ __("messages.active") }}</option>
                                            <option value="2" {{ (isset($member->status) && $member->status == 2) ? 'selected' : '' }}>{{ __("messages.Deleted") }}</option>
                                            <option value="3" {{ (isset($member->status) && $member->status == 3) ? 'selected' : '' }}>{{ __("messages.Archive") }}</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ __("messages.Select Role") }}</label>
                                    <div class="col-md-9">
                                        <select class="form-control select" data-live-search="true" name="role">
                                            <option value="customer"
                                            {{ (isset($member->role) && $member->role == 'customer') ? 'selected' : '' }}>{{ __("messages.Customer") }}</option>

                                            <option value="editor" {{ (isset($member->role) && $member->role == 'editor') ? 'selected' : '' }}>{{ __("messages.Editor") }}</option>
                                            <option value="admin" {{ (isset($member->role) && $member->role == 'admin') ? 'selected' : '' }}>{{ __("messages.Admin") }}</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="checkbox pull-left">
                                        <label class="control-label"><input name="featuredCompany"
                                                                            value="1" {{ !empty($member->featuredCompany) ? "checked" : "" }}
                                                                            type="checkbox">{{ __("messages.Featured Company") }}
                                        </label>
                                    </div>

                                </div>
                                <div class="block push-up-10 ">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary" type="reset" onClick="$('#validate').validationEngine('hide');">{{__("messages.Clear Form")}}</button>
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

