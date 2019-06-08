@extends('layouts.admin')
@section('css')
    <style href="{{asset('css/jquery.dataTables.min.css')}}"></style>
    <style>
        td {
            text-align: right;
        }
    </style>
@endsection
@section('content')
    <!-- START PAGE CONTAINER -->

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin')}}">{{ __("messages.Home") }}</a></li>
        <li class="active"><a href="#">{{ __("Other Management") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>{{ __("messages.Static Pages") }}</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <!-- START DATATABLE EXPORT -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form class="form-horizontal" action="#" method="post">
                            <div class="row">

                                <div class="form-group">
                                    @if(app()->getLocale() == 'fa')
                                        <div class="col-xs-12 col-md-3">

                                            <input id="from" value="{{$data['startDate']}}" name="startDate"
                                                   class="form-control" placeholder="{{ __("messages.From Date")}}"/>


                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <input id="to" value="{{$data['endDate']}}" name="endDate"
                                                   class="form-control" placeholder="{{ __("messages.To Date")}}"/>

                                        </div>
                                    @else
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" placeholder="{{ __("messages.From")}}" id="startdate"
                                                       name="startDate" class="form-control datepicker"
                                                       value="{{$data['startDate']}}" data-date="{{date('d-m-Y')}}"
                                                       data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" id="enddate" placeholder="{{ __("messages.To")}}"
                                                       name="endDate" class="form-control " value="{{$data['endDate']}}"
                                                       data-date="{{date('d-m-Y')}}" data-date-format="dd-mm-yyyy"
                                                       data-date-viewmode="years">
                                                <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-3">
                                        <select class="form-control select" data-live-search="true" name="city">
                                            <option value="">{{ __("messages.City") }}</option>

                                            @foreach($cities as $city)
                                                <option {{ (!empty($data['city']) && $data['city'] == $city['id']) ? "selected" : "" }} value='{{$city['id']}}' > {{$city['cityName']}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" data-live-search="true" name="member">
                                            <option value="">{{ __("messages.Select Member") }}</option>
                                            @foreach ($members as $key=>$member)
                                                <option {{(!empty($data['member'] == $member['id']))?"selected":""}} value='{{$member['id']}}'>{{$member['firstName']." ".$member['lastName']." ".$member['companyName']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <select class="form-control select" name="featured">
                                            <option value="">{{ __("messages.Featured") }}</option>
                                            <option value="1" {{ isset($data['featured']) && $data['featured']=='1'?'selected':''}}>{{ __("messages.Yes") }}</option>
                                            <option value="0" {{ isset($data['featured']) && $data['featured']=='0'?'selected':''}}>{{ __("messages.NO") }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" name="adType">
                                            <option value="">{{ __("messages.Lead Type") }}</option>
                                            <option value="1" {{ !empty($data['adType']) && $data['adType']=='1'?'selected':''}}>{{ __("messages.Sale") }}</option>
                                            <option value="2" {{ !empty($data['adType']) && $data['adType']=='2'?'selected':''}}>{{ __("messages.Buy") }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" name="approvalStatus_filter">
                                            <option value="">{{ __("messages.Approval Status") }}</option>
                                            <option {{ !empty($data['approvalStatus_filter']) && $data['approvalStatus_filter']=='1'?'selected':''}} value="1">{{ __("messages.Pending") }}</option>
                                            <option {{ !empty($data['approvalStatus_filter']) && $data['approvalStatus_filter']=='2'?'selected':''}} value="2">{{ __("messages.Approved") }}</option>
                                            <option {{ !empty($data['approvalStatus_filter']) && $data['approvalStatus_filter']=='3'?'selected':''}} value="3">{{ __("messages.Rejected") }}</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" name="status_filter">
                                            <option value="">{{ __("messages.Status") }}</option>
                                            <option {{ isset($data['status_filter']) && $data['status_filter']=='0'?'selected':''}} value="0">{{ __("messages.Inactive") }}</option>
                                            <option {{ isset($data['status_filter']) && $data['status_filter']=='1'?'selected':''}} value="1">{{ __("messages.Active") }}</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">

                                        <select class="form-control select" name="category" id="category"
                                                data-show-subtext="true" data-live-search="true">
                                            <option value="">{{ __("messages.Select Category") }}</option>
                                            @foreach ($categories as $key=>$category)
                                                <option {{(!empty($data['category'] == $category['categoryId']))?"selected":""}} value='{{$category['categoryId']}}'>{{$category['title']}}</option>
                                                }
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" id="category2" data-live-search="true"
                                                name="subcategory">
                                            <option value="">{{ __("messages.Select Sub Category") }}</option>
                                            @foreach ($subcategories as $key=>$category){
                                            <option {{(!empty($data['subcategory'] == $category['categoryId']))?"selected":""}} value='{{$category['categoryId']}}'>{{$category['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" id="category3" data-live-search="true"
                                                name="subsubcategory">
                                            <option value="">{{ __("messages.Select sub sub Category") }}</option>
                                            @foreach ($subsubcategories as $key=>$category){
                                            <option {{(!empty($data['subsubcategory'] == $category['categoryId']))?"selected":""}} value='{{$category['categoryId']}}'>{{$category['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit"
                                                class="btn btn-primary pull-right">{{ __("messages.Search") }}</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <form id="formtranslator" action="{{route('admin.leads.index')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3 block">
                                        <p style="text-align: right">
                                            <label>
                                                {{ __("messages.Do you want  Featured product?") }}
                                            </label>
                                        </p>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="1"
                                                                                    class="icheckbox"/> {{ __("messages.in Home") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="2"
                                                                                    class="icheckbox"/> {{ __("messages.in Main Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="3"
                                                                                    class="icheckbox"/> {{ __("messages.in Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="4"
                                                                                    class="icheckbox"/> {{ __("messages.in Sub Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="5"
                                                                                    class="icheckbox"/> {{ __("messages.in Sub Sub Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="6"
                                                                                    class="icheckbox"/> {{ __("messages.in Lead") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="7"
                                                                                    class="icheckbox"/> {{ __("messages.in Search") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="submit" name="action" value="update_featured"
                                                                class="btn btn-info"><i
                                                                    class="glyphicon glyphicon-check"></i>{{ __("messages.Update Featured") }}
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <button type="submit" name="action" value="active_approved"
                                                class="btn btn-success"><i
                                                    class="glyphicon glyphicon-arrow-up"></i>{{ __("messages.Active and Approved Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="active"
                                                class="btn btn-primary"><i
                                                    class="glyphicon glyphicon-arrow-up"></i>{{ __("messages.Active Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="deactivate"
                                                class="btn btn-warning"><i
                                                    class="glyphicon glyphicon-arrow-down"></i>{{ __("messages.Deactivate Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="approved"
                                                class="btn btn-outline-info"><i
                                                    class="glyphicon glyphicon-chevron-up"></i>{{ __("messages.Approved Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="reject"
                                                class="btn btn-dark"><i
                                                    class="glyphicon glyphicon-chevron-down"></i>{{ __("messages.Reject Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="delete"
                                                class="btn btn-danger"><i
                                                    class="glyphicon glyphicon-remove"></i>{{ __("messages.Delete Selected Item") }}
                                        </button>

                                    </div>
                                </div>
                            </div>
                            @include('flash::message')

                            <table id="lead_table" class="table ">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" />
                                    </th>
                                    <th>{{ __("messages.Title") }}</th>
                                    <th>{{ __("messages.Product Picture") }}</th>
                                    <th>{{ __("messages.Details") }}</th>
                                    <th width="25%">{{ __("messages.Other") }}</th>
                                    <th>{{ __("messages.postage date") }}</th>
                                    <th width="15%">{{ __("messages.Approval Status") }}</th>
                                    <th width="15%">{{ __("messages.Status") }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($leads as $i=>$lead)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="arr_ids[]" value="{{$lead->id}}" />
                                        </td>
                                        <td>
                                            <p>{{ $lead->name }}</p>
                                            <p>
                                                {{ __("messages.Ad Type") }}
                                                : {{$type = $lead->ad_type == '1' ? __("messages.Sell") : __("messages.Buy") }}
                                            </p>
                                            <p>
                                                <a href="{{ route('home.companies.info',['slug_companies'=>$lead->user->slug])}}"
                                                   class="btn btn-dark"
                                                   target="_blank">{{$lead->user->getCompanyName()}}</a>: {{ __("messages.Sender Name") }}
                                            </p>
                                            <p>
                                                @if($lead->user->featured_company)
                                                    <span class="label label-default label-form">{{ __("messages.Featured")}}</span>
                                                @endif
                                            </p>
                                            <div style="margin-top:3px; color:#F00">
                                                <strong>{{ __("messages.No of visits") }}
                                                    : {{$lead->no_of_visits }}</strong></div>

                                            <div style="margin-top:3px; color:#F00">
                                                <strong> {{$request = $lead->push_request == '1' ? "Push Request" : "" }}</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal_image" class=" image-preview"
                                               onclick="imagePreview(this)"
                                               data-icon="{{url('images/medias/photos/'.$lead->medias->first()->media)}}"
                                               data-text="{{ $lead->name }}">
                                                <img
                                                        src="{{url('images/medias/photos/'.$lead->medias->first()->media)}}"
                                                        width="100px"
                                                        height="100px"></a>
                                        </td>
                                        <td><a type="button" class=" mb-control details"
                                               data-details="message-box-info-details"
                                               onclick="myDetails({{$lead->id}})"
                                               data-box="#message-box-info-details">{{ __("messages.View Details") }}</a>
                                        </td>
                                        <td>
                                            {{ __("messages.Featured") }}
                                            :

                                            @if($lead->featured)
                                                {{ __("Yes")}}
                                                <p>:{{ __("messages.featured in page")}}</p>
                                                <ul dir="rtl">
                                                    @foreach($lead->featured as $featured)
                                                        <li>{{__('messages.'.$featured->name)}}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {{ __(("No"))}}
                                            @endif
                                            <br/>
                                            @if ($lead->categories)
                                                {{ __("messages.Category") }}
                                                :
                                                @foreach($lead->categories->first()->ancestors as $i=>$parent_cat)
                                                    <p>

                                                    <div style="margin-right: {{$i*20}}px"><a target="_blank"
                                                                                              href="{{route('admin.categories.show',['id'=> $parent_cat->id])}}">{{$parent_cat->getCategoryTitle()}}</a>
                                                    </div>
                                                    <div style="margin-right: {{$i*20}}px">_|</div>


                                                    </p>
                                                @endforeach

                                                <p>
                                                <div style="margin-right: 60px"><a target="_blank"
                                                                                   href="{{route('admin.categories.show',['id'=> $lead->categories->first()->id])}}">{{ $lead->categories->first()->getCategoryTitle() }}</a>
                                                </div></p>
                                                @if (sizeof($lead->categories) > 1)
                                                    <a data-toggle="modal" data-target="#model_Category"
                                                       onclick="ContinuationCategory(this)"
                                                       class="ContinuationCategory"
                                                       data-text="{{__('messages.continues category')." ".$lead->name }}"
                                                       title="{{__('messages.continues category')." ".$lead->name }}"
                                                       data-id="Category_{{$lead->id}}">{{ __("messages.Continuation Category") }}</a>



                                                    <div id="Category_{{$lead->id}}" style="display: none">
                                                        @foreach ($lead->categories as $category)
                                                            @foreach($category->ancestors as $i=>$parent_cat)
                                                                <p>

                                                                <div style="margin-right: {{$i*20}}px"><a target="_blank"
                                                                                                          href="{{route('admin.categories.show',['id'=>$parent_cat->id])}}"> {{$parent_cat->getCategoryTitle()}}</a>
                                                                </div>
                                                                <div style="margin-right: {{$i*20}}px">_|</div>


                                                                </p>

                                                            @endforeach
                                                            <p>
                                                            <div style="margin-right: 60px"><a target="_blank"
                                                                                               href="{{route('admin.categories.show',['id'=>$category->id])}}">{{$category->getCategoryTitle()}}</a>
                                                            </div></p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endif
                                            <br/>

                                        </td>
                                        <td>{{toJalali($lead->created_at)}}</td>
                                        <td>
                                            <select class="form-control approvalStatus" name="approvalStatus"
                                                    onchange="changeStatus(this,'{{$lead->id}}','approval_status')"
                                                    data-id="{{ $lead->id }}" id="approvalStatus_{{ $lead->id }}">
                                                <option value="1" {{ $lead->approval_status == 1 ? 'selected' : '' }} >{{ __("messages.Pending") }}</option>
                                                <option value="2" {{ $lead->approval_status == 2 ? 'selected' : '' }} >{{ __("messages.Approved") }}</option>
                                                <option value="3" {{ $lead->approval_status == 3 ? 'selected' : '' }} >{{ __("messages.Rejected") }}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control status" name="change_status"
                                                    onchange="changeStatus(this,'{{$lead->id}}','status')"
                                                    data-id="{{ $lead->id }}" id="Status_{{ $lead->id }}">
                                                <option value="0" {{ $lead->status == '0' ? 'selected' : '' }}>{{ __("messages.New Laed") }}</option>
                                                <option value="-1" {{ $lead->status == '-1' ? 'selected' : '' }}>{{ __("messages.Inactive") }}</option>
                                                <option value="1" {{ $lead->status == '1' ? 'selected' : '' }}>{{ __("messages.Active") }}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.leads.edit', ['id' => $lead->id]) }}"><i
                                                        class="fa fa-pencil"></i></a>
                                            <a class="delete" data-id="{{  $lead->id }}" href="#"
                                               onclick="myDelete({{$lead->id}})"><i
                                                        class="glyphicon glyphicon-remove-circle"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                </div>


            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <div class="modal" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">{{ __("messages.Close")}}</span>
                    </button>
                    <h4 class="modal-title" id="defModalHead"></h4>
                </div>
                <div class="modal-body">
                    <p><img id="image_preview" width="850px" src=""></p>

                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __("messages.Close")}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="model_Category" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span
                                class="sr-only">{{ __("messages.Close")}}</span>
                    </button>
                    <h4 class="modal-title" id="catModalHead"></h4>
                </div>
                <div class="modal-body">
                    <p>
                    <div id="message-box-info-Category_content" style="text-align: right"></div>
                    </p>

                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ __("messages.Close")}}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="message-box message-box-info-details animated fadeIn" id="message-box-info-details">

        <div class="mb-container">
            <div class="mb-middle">
                <div id="message-box-info-details_content"></div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-times"></span> {{__("messages.Remove") }}
                    <strong>{{__("messages.Data") }}</strong> ?
                </div>
                <div class="mb-content">
                    <p>{{__("messages.Are you sure you want to remove this row?") }}</p>
                    <p>{{__("messages.Press Yes if you sure.") }}</p>
                    <input type="hidden" value="" id="Delete_id">

                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button class="btn btn-success btn-lg mb-control-yes">{{__("messages.Yes") }}</button>
                        <button class="btn btn-default btn-lg mb-control-close">{{__("messages.NO") }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="message-box message-box-info-details animated fadeIn" id="message-box-info-details">
        <div class="mb-container">
            <div class="mb-middle">
                <div id="message-box-info-details_content"></div>
                <div class="mb-footer">
                    <button class="btn btn-default btn-lg pull-right mb-details-close">
                        {{__("messages.Close")}}
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('javascript')




    <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="/js/admin/plugins/bootstrap/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/js/admin/plugins/bootstrap/bootstrap-select.js"></script>
    <script type="text/javascript" src="/js/admin/persian-date.min.js"></script>
    <script type="text/javascript" src="/js//admin/persian-datepicker.js"></script>
    <!-- END PAGE PLUGINS -->

    <!-- START TEMPLATE -->

    <script type="text/javascript">
        function ContinuationCategory(object) {
            var id = $(object).attr('data-id');
            $('#catModalHead').html($(object).attr('title'));

            $('#message-box-info-Category_content').html($("#" + id).html());

        }

        function imagePreview(object) {
            $('#defModalHead').html($(object).attr('data-text'));
            $('#image_preview').attr('src', $(object).attr('data-icon'));
        }

        function myDelete(id) {
            $('#Delete_id').val(id);

            $('#mb-remove-row').show();
        }

        function changeStatus(object, id, filed) {
            var formUrl = 'leads/status/change/' + id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: formUrl,
                type: 'POST',
                data: {status: object.value, filed: filed},
                success: function (response) {
                    if (response.status == 'failed') {
                        var message = response.meta.message;
                        if (message && (typeof message === 'object' || typeof message === 'Array')) {

                            $.each(message, function (index, value) {
                                $.each(value, function (key, item) {
                                    toastr.error(item);

                                });

                            });
                        } else {
                            toastr.error(message);
                        }
                    }
                    if (response.status == 'success') {

                        toastr.success(response.meta.message);

                    }
                }
                , error: function (jqXHR, textStatus, errorThrown) {

                    //if fails
                }
            });
        }

        function myDetails(id) {

            var formUrl = '/admin/leads/details/form/' + id;//$(this).attr('data-url');

            $('#message-box-info-details_content').html(" <img src='/images/loading.gif'><img>");
            $.ajax({
                url: formUrl,
                type: 'GET',
                success: function (data) {

                    $('#message-box-info-details_content').html(data);
                    $('#message-box-info-details').show();

                }
                , error: function (jqXHR, textStatus, errorThrown) {

                    //if fails
                }
            });
        }

        $(document).ready(function () {

            var table = $('#lead_table').DataTable({
                "processing": true,
                "serverSide": true,
                "deferLoading": '{{$count}}',
                "ajax": '/admin/leads/get/dataTable',
                "columns": [
                    {"data": "col_id"},
                    {"data": "info_lead"},
                    {"data": "image"},
                    {"data": "details"},
                    {"data": "other"},
                    {"data": "created_at_col"},
                    {"data": "select_approval_status"},
                    {"data": "select_status"},
                    {"data": "action"}
                ],

                columnDefs: [
                    { orderable: false, targets: [ 0,7] }
                ],
            })

            $('.mb-control-close').on('click', function () {
                $('#mb-remove-row').hide();

            })
            $('.mb-control-yes').on('click', function () {
                var id = $('#Delete_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "leads/" + id,
                    type: 'Delete',
                    data: {status: $(this).val()},
                    success: function (response) {
                        if (response.status == 'failed') {
                            var message = response.meta.message;
                            if (message && (typeof message === 'object' || typeof message === 'Array')) {

                                $.each(message, function (index, value) {
                                    $.each(value, function (key, item) {
                                        toastr.error(item);

                                    });

                                });
                            } else {
                                toastr.error(message);
                            }
                        }
                        if (response.status == 'success') {

                            toastr.success(response.meta.message);
                            window.location.replace("/admin/leads");

                        }
                    }
                    , error: function (jqXHR, textStatus, errorThrown) {

                        //if fails
                    }
                });
            })


            $('.mb-details-close').on('click', function () {
                $('#message-box-info-details').hide();

            })
            // $('.page-content').on('click', function () {
            //     $('#message-box-info-details').hide();
            //
            // })


            $('#category').on("change", function (e) {
                $("#category2").val('');
                $("#category3").val('');
                $('#category2').selectpicker('refresh');
                $('#category3').selectpicker('refresh');

                var parent_id = $('#category').val();
                console.log(parent_id);
                if (parent_id) {
                    $("#div_category2").show();
// mostly used event, fired to the original element when the value changes
                    $.ajax({
                        url: "/api/category?p_pid=" + parent_id,
                        type: 'Get',
                        success: function (data) {
                            var option = "<option value=''>{{__('messages.Select Category')}}</option>";
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
            $('#category2').on("change", function (e) {
                $("#category3").val('');
                $('#category3').selectpicker('refresh');
                var parent_id = $('#category').val();
                var subcat = $('#category2').val();
                console.log(parent_id);
                if (parent_id && subcat) {
                    $.ajax({
                        url: "/api/category?p_pid=" + parent_id + "&pid=" + subcat,
                        type: 'Get',
                        success: function (data) {
                            var option = "<option value=''>{{__('messages.Select Category')}}</option>";
                            if (data) {
                                $.each(data, function (index, value) {
                                    option += "<option value='" + value.categoryId + "'>" + value.title + "</option>"
                                });
                                $('#category3').html(option);
                                $('#category3').selectpicker('refresh');

                            }
                        }
                        , error: function (jqXHR, textStatus, errorThrown) {

//if fails
                        }
                    });


                }

            })


            $('.mb-control-close').on('click', function () {
                $('#mb-remove-row').hide();

            })
            $('.mb-control-yes').on('click', function () {
                var id = $('#Delete_id').val();
                window.location.replace("products/delete/" + id);


            })


            $('.mb-view').on('click', function () {
                var view = $(this).attr('data-box');
                $(view).show();

            })


        })
    </script>

@endsection

