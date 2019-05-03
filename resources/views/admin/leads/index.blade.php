@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('/css/admin/persian-datepicker.css')}}"/>

@endsection
@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ url('admin')}}">{{ __("Home") }}</a></li>
        <li class="active"><a href="#">{{ __("Manage Leads") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>{{ __("Leads Lists") }}</h2>
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
                                                   class="form-control" placeholder="{{ __("From Date")}}"/>


                                        </div>
                                        <div class="col-xs-12 col-md-3">
                                            <input id="to" value="{{$data['endDate']}}" name="endDate"
                                                   class="form-control" placeholder="{{ __("To Date")}}"/>

                                        </div>
                                    @else
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" placeholder="{{ __("From")}}" id="startdate"
                                                       name="startDate" class="form-control datepicker"
                                                       value="{{$data['startDate']}}" data-date="{{date('d-m-Y')}}"
                                                       data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <span class="input-group-addon"><span
                                                            class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" id="enddate" placeholder="{{ __("To")}}"
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
                                            <option value="">{{ __("City") }}</option>

                                            @foreach($cities as $city)
                                                <option {{ (!empty($data['city']) && $data['city'] == $city['id']) ? "selected" : "" }} value='{{$city['id']}}' > {{$city['cityName']}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" data-live-search="true" name="member">
                                            <option value="">{{ __("Select Member") }}</option>
                                            @foreach ($members as $key=>$member)
                                                <option {{(!empty($data['member'] == $member['id']))?"selected":""}} value='{{$member['id']}}'>{{$member['firstName']." ".$member['lastName']." ".$member['companyName']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <select class="form-control select" name="featured">
                                            <option value="">{{ __("Featured") }}</option>
                                            <option value="1" {{ isset($data['featured']) && $data['featured']=='1'?'selected':''}}>{{ __("Yes") }}</option>
                                            <option value="0" {{ isset($data['featured']) && $data['featured']=='0'?'selected':''}}>{{ __("No") }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" name="adType">
                                            <option value="">{{ __("Lead Type") }}</option>
                                            <option value="1" {{ !empty($data['adType']) && $data['adType']=='1'?'selected':''}}>{{ __("Sale") }}</option>
                                            <option value="2" {{ !empty($data['adType']) && $data['adType']=='2'?'selected':''}}>{{ __("Buy") }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" name="approvalStatus_filter">
                                            <option value="">{{ __("Approval Status") }}</option>
                                            <option {{ !empty($data['approvalStatus_filter']) && $data['approvalStatus_filter']=='1'?'selected':''}} value="1">{{ __("Pending") }}</option>
                                            <option {{ !empty($data['approvalStatus_filter']) && $data['approvalStatus_filter']=='2'?'selected':''}} value="2">{{ __("Approved") }}</option>
                                            <option {{ !empty($data['approvalStatus_filter']) && $data['approvalStatus_filter']=='3'?'selected':''}} value="3">{{ __("Rejected") }}</option>

                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" name="status_filter">
                                            <option value="">{{ __("Status") }}</option>
                                            <option {{ isset($data['status_filter']) && $data['status_filter']=='0'?'selected':''}} value="0">{{ __("Inactive") }}</option>
                                            <option {{ isset($data['status_filter']) && $data['status_filter']=='1'?'selected':''}} value="1">{{ __("Active") }}</option>

                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">

                                        <select class="form-control select" name="category" id="category"
                                                data-show-subtext="true" data-live-search="true">
                                            <option value="">{{ __("Select Category") }}</option>
                                            @foreach ($categories as $key=>$category)
                                                <option {{(!empty($data['category'] == $category['categoryId']))?"selected":""}} value='{{$category['categoryId']}}'>{{$category['title']}}</option>
                                                }
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" id="category2" data-live-search="true"
                                                name="subcategory">
                                            <option value="">{{ __("Select Sub Category") }}</option>
                                            @foreach ($subcategories as $key=>$category){
                                            <option {{(!empty($data['subcategory'] == $category['categoryId']))?"selected":""}} value='{{$category['categoryId']}}'>{{$category['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control select" id="category3" data-live-search="true"
                                                name="subsubcategory">
                                            <option value="">{{ __("Select sub sub Category") }}</option>
                                            @foreach ($subsubcategories as $key=>$category){
                                            <option {{(!empty($data['subsubcategory'] == $category['categoryId']))?"selected":""}} value='{{$category['categoryId']}}'>{{$category['title']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit"
                                                class="btn btn-primary pull-right">{{ __("Search") }}</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3 block">
                                        <p style="text-align: right">
                                            <label>
                                                {{ __("Do you want  Featured product?") }}
                                            </label>
                                        </p>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="1"
                                                                                    class="icheckbox"/> {{ __("in Home") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="2"
                                                                                    class="icheckbox"/> {{ __("in Main Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="3"
                                                                                    class="icheckbox"/> {{ __("in Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="4"
                                                                                    class="icheckbox"/> {{ __("in Sub Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="5"
                                                                                    class="icheckbox"/> {{ __("in Sub Sub Category") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="6"
                                                                                    class="icheckbox"/> {{ __("in Lead") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="check"><input type="checkbox"
                                                                                    name="featured_input[]" value="7"
                                                                                    class="icheckbox"/> {{ __("in Search") }}
                                                        </label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="submit" name="action" value="update_featured"
                                                                class="btn btn-info"><i
                                                                    class="glyphicon glyphicon-check"></i>{{ __("Update Featured") }}
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
                                                    class="glyphicon glyphicon-arrow-up"></i>{{ __("Active and Approved Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="active"
                                                class="btn btn-primary"><i
                                                    class="glyphicon glyphicon-arrow-up"></i>{{ __("Active Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="deactivate"
                                                class="btn btn-warning"><i
                                                    class="glyphicon glyphicon-arrow-down"></i>{{ __("Deactivate Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="approved"
                                                class="btn btn-outline-info"><i
                                                    class="glyphicon glyphicon-chevron-up"></i>{{ __("Approved Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="reject"
                                                class="btn btn-dark"><i
                                                    class="glyphicon glyphicon-chevron-down"></i>{{ __("Reject Selected Item") }}
                                        </button>
                                        <button type="submit" name="action" value="delete"
                                                class="btn btn-danger"><i
                                                    class="glyphicon glyphicon-remove"></i>{{ __("Delete Selected Item") }}
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="customers2" class="table ">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox"
                                                   onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);"/>
                                        </th>
                                        <th>{{ __("Title") }}</th>
                                        <th>{{ __("Product Picture") }}</th>
                                        <th>{{ __("Details") }}</th>
                                        <th width="15%">{{ __("Other") }}</th>
                                        <th>{{ __("postage date") }}</th>
                                        <th width="15%">{{ __("Approval Status") }}</th>
                                        <th width="15%">{{ __("Status") }}</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($leads as $lead)

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="arr_ids[]" value="{{$lead['id']}}"/>
                                            </td>
                                            </td>
                                            <td style="text-align: right">
                                                <p>{{ $lead['title'] }}</p>
                                                {{--                                            $lead_set_in = array();--}}

                                                {{--                                            if ($lead['featuredProduct'] != "" || $lead['featuredProduct'] != '0'|| $lead['featuredProduct'] != null) {--}}
                                                {{--                                                $lead_set_in[] = "<b>" . $this->translate("Featured") . "  : </b> " . $this->translate("Yes");--}}
                                                {{--                                            }--}}

                                                {{--                                            if ($lead['noOfVisits'] == '')--}}
                                                {{--                                                $lead['noOfVisits'] = 0;--}}

                                                {{--                                            ?>--}}
                                                <p>
                                                    {{ __("Ad Type") }}
                                                    : {{$type = $lead['adType'] == '1' ? __("Sell") : __("Buy") }}
                                                </p>
                                                <p>
                                                    <a href="{{ $this->url('company/detail',['id'=>$lead['user']['id']])}}"
                                                       class="btn btn-dark"
                                                       target="_blank">{{$lead['user']['fullName']}}</a>: {{ __("Sender Name") }}
                                                </p>
                                                <p>
                                                    @if($lead['user']['featuredCompany'])
                                                        <span class="label label-default label-form">{{ __("Featured")}}</span>
                                                    @endif
                                                </p>
                                                <div style="margin-top:3px; color:#F00">
                                                    <strong>{{ __("No of visits") }}
                                                        : {{$lead['noOfVisits'] }}</strong></div>

                                                <div style="margin-top:3px; color:#F00">
                                                    <strong> {{$request = $lead['pushRequest'] == '1' ? "Push Request" : "" }}</strong>
                                                </div>

                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal_image" class=" image-preview"
                                                   data-icon="{{ $lead['picture'] }}"
                                                   data-text="{{ $lead['productName'] }}"><img
                                                            src="{{ $lead['picture'] }}" width="100px"
                                                            height="100px"></a>
                                            </td>
                                            <td>
                                                <a type="button" class=" mb-control details"
                                                   data-details="message-box-info-details"
                                                   data-url="{{ url('management_empty/products_detail', ['id' => $lead['id']]) }}"
                                                   data-box="#message-box-info-details">{{ __("View Details") }}</a>


                                                <!-- info -->
                                                <div class="message-box message-box-info animated fadeIn"
                                                     id="message-box-info-{{$lead['id']}}">
                                                    <div class="mb-container">
                                                        <div class="mb-middle">
                                                            <div class="mb-title"><span
                                                                        class="fa fa-info"></span> {{ $lead['title'] }}
                                                            </div>
                                                            <div class="mb-content">
                                                                <p>{{ $lead['description'] }}</p>
                                                                <p>{{ $lead['detail'] }}</p>
                                                            </div>
                                                            <div class="mb-footer">
                                                                <button class="btn btn-default btn-lg pull-right mb-control-close">
                                                                    {{__("Close")}}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end info -->
                                            </td>
                                            <td style="text-align: right">
                                                {{ __("Featured") }}
                                                :

                                                @if($lead['featuredProduct'])
                                                    {{ __(("Yes"))}}
                                                    @if(in_array(1,$lead['featuredProduct']))
                                                        {{"/".__("in Home")}}
                                                    @endif

                                                    @if(in_array(2,$lead['featuredProduct'])){
                                                    {{"/".__("in main Category")}}

                                                    @endif

                                                    @if(in_array(3,$lead['featuredProduct'])){
                                                    {{"/".__("in Category")}}
                                                    @endif

                                                    @if(in_array(4,$lead['featuredProduct'])){
                                                    {{"/".__("in Sub Category")}}
                                                    @endif

                                                    @if(in_array(5,$lead['featuredProduct'])){
                                                    {{"/".__("in Sub Sub Category")}}
                                                    @endif

                                                    @if(in_array(6,$lead['featuredProduct'])){
                                                    {{"/".__("in Product")}}

                                                    @endif

                                                    @if(in_array(7,$lead['featuredProduct'])){
                                                    {{"/".__("in Search")}}

                                                    @endif
                                                @else
                                                    {{ __(("No"))}}
                                                @endif
                                                <br/>
                                                @if (!empty($lead['categoryName']))
                                                    {{ __("Category") }} : {{ $lead['categoryName'][0]}}
                                                    @if (sizeof($lead['categoryName']) > 1)
                                                        <a data-toggle="modal" data-target="#message-box-info-Category"
                                                           class="ContinuationCategory"
                                                           data-id="Category_{{$lead['id']}}">{{ __("Continuation Category") }}</a>
                                                        <div id="Category_{{$lead['id']}}" style="display: none">
                                                            @foreach ($lead['categoryName'] as $category)
                                                                {{$category}}
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endif
                                                    <br/>
                                            </td>
                                            <td>
                                                <p>{{ $lead['productAddedDate'] }}</p>

                                            </td>
                                            <td>
                                                <select class="form-control approvalStatus" name="approvalStatus"
                                                        data-id="{{ $lead['id'] }}"
                                                        id="approvalStatus_{{ $lead['id'] }}"
                                                >
                                                    <option value="1"
                                                            {{ (isset($lead['approvalStatus']) && $lead['approvalStatus'] == 'Pending') ? 'selected' : '' }} >{{ __("Pending") }}</option>
                                                    <option
                                                            value="2" {{ (isset($lead['approvalStatus']) && $lead['approvalStatus'] == 'Approved') ? 'selected' : '' }}>{{ __("Approved") }}</option>
                                                    <option
                                                            value="3" {{ (isset($lead['approvalStatus']) && $lead['approvalStatus'] == 'Rejected') ? 'selected' : '' }}>{{ __("Rejected") }}</option>
                                                </select>
                                            </td>
                                            <td>

                                                <select class="form-control status" name="change_status"
                                                        data-id="{{ $lead['id'] }}"
                                                        id="Status_{{ $lead['id'] }}"
                                                >
                                                    <option value="0"
                                                            {{ (isset($lead['status']) && $lead['status'] == 'inactive') ? 'selected' : '' }}>{{ __("Inactive") }}</option>
                                                    <option
                                                            value="1" {{ (isset($lead['status']) && $lead['status'] == 'active') ? 'selected' : '' }}>{{ __("Active") }}</option>
                                                </select></td>
                                            <td>
                                                <a href="{{ $this->url('admin/products/edit', ['id' => $lead['id']]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                <a class="delete" data-id="{{ $lead['id'] }}" href="#"><i
                                                            class="glyphicon glyphicon-remove-circle"></i></a>
                                                <a class="thumb_mail" data-id="{{ $lead['id'] }}" href="#"><i
                                                            class="glyphicon glyphicon-picture"></i></a>
                                                @if($lead['newStatus']=="1")
                                                    <a class="see" id="see_{{ $lead['id'] }}"
                                                       data-id="{{ $lead['id'] }}" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                                    aria-hidden="true">&times;</span><span class="sr-only">{{ __("Close")}}</span>
                        </button>
                        <h4 class="modal-title" id="defModalHead"></h4>
                    </div>
                    <div class="modal-body">
                        <p><img id="image_preview" width="850px" src=""></p>

                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Close")}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="message-box-info-Category" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">{{ __("Close")}}</span>
                        </button>
                        <h4 class="modal-title" id="defModalHead"></h4>
                    </div>
                    <div class="modal-body">
                        <div id="message-box-info-Category_content" style="text-align: right"></div>

                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("Close")}}</button>
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
                    <div class="mb-title"><span class="fa fa-times"></span> {{ __("Remove") }}
                        <strong>{{ __("Data") }}</strong> ?
                    </div>
                    <div class="mb-content">
                        <p>{{ __("Are you sure you want to remove this row?") }}</p>
                        <p>{{ __("Press Yes if you sure.") }}</p>
                        <input type="hidden" value="" id="Delete_id">

                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">{{ __("Yes") }}</button>
                            <button class="btn btn-default btn-lg mb-control-close">{{ __("No") }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('javascript')
            <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
            <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

            <script type="text/javascript" src="/js/admin/plugins/datatables/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="/js/admin/plugins/bootstrap/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="/js/admin/plugins/bootstrap/bootstrap-select.js"></script>
            <script type="text/javascript" src="/js/admin/persian-date.min.js"></script>
            <script type="text/javascript" src="/js//admin/persian-datepicker.js"></script>
            <!-- END PAGE PLUGINS -->

            <!-- Datepicker main script -->
            <!-- ------------------------------------------------------------------------------------ -->

            <script type="text/javascript">
                $(document).ready(function () {
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
                                    var option = "<option value=''>{{__('Select Category')}}</option>";
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
                                    var option = "<option value=''>{{__('Select Category')}}</option>";
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
                    $('.image-preview').on('click', function () {
                        $('#defModalHead').html($(this).attr('data-text'));
                        $('#image_preview').attr('src', $(this).attr('data-icon'));
                    })
                    $('.ContinuationCategory').on('click', function () {
                        var id = $(this).attr('data-id');
                        $('#message-box-info-Category_content').html($("#" + id).html());

                        $('#message-box-info-Category').show();

                    })
                    $('.delete').on('click', function () {
                        $('#Delete_id').val($(this).attr('data-id'));

                        $('#mb-remove-row').show();

                    })
                    $('.mb-control-close').on('click', function () {
                        $('#mb-remove-row').hide();

                    })
                    $('.mb-control-yes').on('click', function () {
                        var id = $('#Delete_id').val();
                        window.location.replace("products/delete/" + id);


                    })
                    $('.thumb_mail').on('click', function () {
                        var id = $(this).attr('data-id');
                        window.location.replace("products/thumb_mail/" + id);


                    })

                    $('.details').on('click', function () {
                        var formUrl = $(this).attr('data-url');
                        $.noty.closeAll();
                        $('#message-box-info-details_content').html(" <img src='/img/blueimp/loading.gif'><img>");
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

                    })


                    $('.mb-view').on('click', function () {
                        var view = $(this).attr('data-box');
                        $(view).show();

                    })
                    $('.see').on('click', function () {
                        var id = $(this).attr('data-id');
                        var id_div = $(this).attr('id');
                        $.ajax({
                            url: 'products/see/' + id,
                            type: 'POST',
                            data: {},
                            success: function (data) {
                                console.log(data);
                                if (data.status == 200) {
                                    toastr.success(data.message);

                                    $('#' + id_div).hide();
                                } else {
                                    toastr.error(data.message);
                                }

                            }
                            , error: function (jqXHR, textStatus, errorThrown) {

//if fails
                            }
                        });
                    })
                    $('.status').on('change', function () {
                        var status = $(this).val();
                        var id = $(this).attr('data-id');
                        $.ajax({
                            url: 'products/active/' + id,
                            type: 'POST',
                            data: {status: status},
                            success: function (data) {
                                console.log(data);
                                if (data.status) {
                                    window.location = "/admin/products";
                                } else {
                                    toastr.error(data.error);
                                }

                            }
                            , error: function (jqXHR, textStatus, errorThrown) {

//if fails
                            }
                        });
                    })
                    $('.approvalStatus').on('change', function () {
                        var approval_Status = $(this).val();
                        var id = $(this).attr('data-id');
                        $.ajax({
                            url: 'products/approvalStatus/' + id,
                            type: 'POST',
                            data: {approval_Status: approval_Status},
                            success: function (data) {
                                console.log(data);
                                if (data.status) {
                                    window.location = "/admin/products";
                                } else {
                                    toastr.error(data.error);
                                }

                            }
                            , error: function (jqXHR, textStatus, errorThrown) {

//if fails
                            }
                        });
                    })
                    var table = $('#customers2').DataTable({
                        "language": {
                            "lengthMenu": "{{__('Display')}} _MENU_ {{__('records per page')}}",
                            "zeroRecords": "{{__('Nothing found - sorry')}}",
                            "info": "{{__('Showing page')}}  _PAGE_ {{__('of')}} _PAGES_",
                            "infoEmpty": "{{__('No records available')}}",
                            "infoFiltered": "({{__('filtered from')}} _MAX_ {{__('total records')}})",
                            "search": "{{__('Search')}}:",
                            "paginate": {
                                "previous": "{{__('Previous')}}",
                                "next": "{{__('Next')}}",
                            }


                        },
                        columnDefs: [
                            {orderable: false, targets: [0, 7]}
                        ],
                        "order": [0, "asc"]
                    });

                })
            </script>
@endsection
