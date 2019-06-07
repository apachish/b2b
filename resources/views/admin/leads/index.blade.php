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

                        <form id="formtranslator" action="{{route('articles.action')}}" method="post">
                            {{csrf_field()}}
                            <a href="{{route('articles.create')}}" class="btn btn-info "><i
                                        class="fa fa-plus"></i></a>
                            <button type="submit" name="action" value="active"
                                    class="btn btn-success"><i
                                        class="glyphicon glyphicon-info-sign"></i>{{__("messages.Active") }}</button>
                            <button type="submit" name="action" value="deactivate"
                                    class="btn btn-warning"><i
                                        class="glyphicon glyphicon-info-sign"></i>{{__("messages.activate") }}</button>

                            <button type="submit" name="action" value="delete"
                                    class="btn btn-danger"><i
                                        class="glyphicon glyphicon-remove"></i>{{__("messages.Delete") }}</button>
                            <button name="action" type="submit" class="btn btn-info " value="order_submit"><i
                                        class="glyphicon glyphicon-sort-by-order"></i>{{__("messages.Submit Ordering") }}
                            </button>
                            <div class="panel-body">
                                @include('flash::message')

                                <table id="lead_table" class="table ">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox"
                                                   onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);"/>
                                        </th>
                                        <th>{{ __("messages.Title") }}</th>
                                        <th>{{ __("messages.Product Picture") }}</th>
                                        <th>{{ __("messages.Details") }}</th>
                                        <th width="15%">{{ __("messages.Other") }}</th>
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
                                                {{$lead->id}}
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
                                                   data-icon="{{url('images/medias/photos/'.$lead->medias->first()->media)}}"
                                                   data-text="{{ $lead->name }}"><img
                                                            src="{{url('images/medias/photos/'.$lead->medias->first()->media)}}"
                                                            width="100px"
                                                            height="100px"></a>
                                            </td>
                                            <td><a type="button" class=" mb-control details"
                                                   data-details="message-box-info-details"
                                                   data-url="{{ url('management_empty/products_detail', ['id' => $lead['id']]) }}"
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
                                                    : {{ $lead->categories->first()->getCategoryTitle() }}
                                                    @if (sizeof($lead->categories) > 1)
                                                        <a data-toggle="modal" data-target="#message-box-info-Category"
                                                           class="ContinuationCategory"
                                                           data-id="Category_{{$lead->id}}">{{ __("messages.Continuation Category") }}</a>
                                                        <div id="Category_{{$lead->id}}" style="display: none">
                                                            @foreach ($lead->categories as $category)
                                                                {{$category->getCategoryTitle()}}
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endif
                                                <br/>

                                            </td>
                                            <td>{{toJalali($lead->created_at)}}</td>
                                            <td>
                                                <select class="form-control approvalStatus" name="approvalStatus"
                                                        data-id="{{ $lead->id }}" id="approvalStatus_{{ $lead->id }}">
                                                    <option value="1" {{ $lead->approval_status == 1 ? 'selected' : '' }} >{{ __("messages.Pending") }}</option>
                                                    <option value="2" {{ $lead->approval_status == 2 ? 'selected' : '' }} >{{ __("messages.Approved") }}</option>
                                                    <option value="3" {{ $lead->approval_status == 3 ? 'selected' : '' }} >{{ __("messages.Rejected") }}</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control status" name="change_status"
                                                        data-id="{{ $lead->id }}" id="Status_{{ $lead->id }}">
                                                    <option value="0" {{ $lead->status == '0' ? 'selected' : '' }}>{{ __("messages.New Laed") }}</option>
                                                    <option value="0" {{ $lead->status == '-1' ? 'selected' : '' }}>{{ __("messages.Inactive") }}</option>
                                                    <option value="1" {{ $lead->status == '1' ? 'selected' : '' }}>{{ __("messages.Active") }}</option>
                                                </select>
                                            </td>
                                            <td>
                                                <a href="{{ route('leads.edit', ['id' => $lead->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                <a class="delete" data-id="{{  $lead->id }}" href="#"><i
                                                            class="glyphicon glyphicon-remove-circle"></i></a>
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
        function myDelete(id) {
            $('#Delete_id').val(id);

            $('#mb-remove-row').show();
        }

        function changeStatus(object, id) {
            var formUrl = 'leads/status/change/' + id
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: formUrl,
                type: 'POST',
                data: {status: object.value},
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

            var formUrl = '/admin/leads/' + id;//$(this).attr('data-url');

            $('#message-box-info-details_content').html(" <img src='/images/loading.gif'><img>");
            $.ajax({
                url: formUrl,
                type: 'GET',
                success: function (data) {

                    html = '<div class="mb-title"><span class="fa fa-info"></span>' + data.name + '</div>';
                    html += '<div class="mb-content">';
                    if (data.short_description) {
                        html += '<p>' + data.short_description + '</p>';
                    }
                    if (data.description) {
                        html += '<p>' + data.description + '</p>';
                    }
                    html += '</div>';

                    $('#message-box-info-details_content').html(html);
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
                    {"data": "id"},
                    {"data": "info_lead"},
                    {"data": "image"},
                    {"data": "details"},
                    {"data": "other"},
                    {"data": "created_at_col"},
                    {"data": "select_approval_status"},
                    {"data": "select_status"},
                    {"data": "action"}
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
                    url: "articles/" + id,
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
                            window.location.replace("/admin/articles");

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
            $('.page-content').on('click', function () {
                $('#message-box-info-details').hide();

            })




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


        })
    </script>

@endsection

