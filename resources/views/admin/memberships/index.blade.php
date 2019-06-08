@extends('layouts.admin')
@section('css')
    <style href="{{asset('css/jquery.dataTables.min.css')}}"></style>
@endsection
@section('content')
    <!-- START PAGE CONTAINER -->

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin')}}">{{ __("messages.Home") }}</a></li>
        <li><a href="{{ route('admin.members.index')}}">{{ __("messages.Members Management") }}</a></li>
        <li class="active"><a href="#">{{ __("messages.Membership") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>{{ __("messages.Membership") }}</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <!-- START DATATABLE EXPORT -->
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <form id="formtranslator" action="#" method="post">
                            {{csrf_field()}}
                            <a href="{{route('admin.members.memberships.create')}}" class="btn btn-info "><i
                                        class="fa fa-plus"></i></a>
                            <div class="panel-body">
                                @include('flash::message')

                                <table id="membership_table" class="table ">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox"
                                                   onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);"/>
                                        </th>
                                        <th>{{ __("messages.Plan Name") }}</th>
                                        <th>{{ __("messages.Price") }}</th>
                                        <th>{{ __("messages.Duration") }}</th>
                                        <th>{{ __("messages.Allow Select Category") }}</th>
                                        <th>{{ __("messages.Allow Create Lead") }}</th>
                                        <th>{{ __("messages.No. Of Enquiry") }}</th>
                                        <th>{{ __("messages.created") }}</th>
                                        <th>{{ __("messages.modified") }}</th>
                                        <th>{{ __("messages.Status") }}</th>
                                        <th>{{ __("messages.Action") }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($memberships as $i=>$membership)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="arr_ids[]" value="{{$membership->id}}" />

                                            </td>
                                            <td>{{$membership->plan_name}}</td>
                                            <td>
                                                {{$membership->price}}
                                            </td>
                                            <td>{{$membership->duration}}</td>
                                            <td>{{$membership->no_of_category}}</td>
                                            <td>{{$membership->product_upload}}</td>
                                            <td>{{$membership->no_of_enquiry}}</td>
                                            <td>{{app()->getLocale()=='fa'?toJalali($membership->created_at):$membership->created_at}}</td>
                                            <td>{{app()->getLocale()=='fa'?toJalali($membership->updated_at):$membership->updated_at}}</td>
                                            <td>
                                                <select class="form-control status" name="change_status"
                                                        onchange="changeStatus(this,'{{$membership->id}}','status')"
                                                        data-id="{{ $membership->id }}" id="Status_{{ $membership->id }}">
                                                    <option value=0 {{ $membership->status == '0' ? 'selected' : '' }}>{{ __("messages.Inactive") }}</option>
                                                    <option value=1 {{ $membership->status == '1' ? 'selected' : '' }}>{{ __("messages.Active") }}</option>
                                                </select>
                                            </td>
                                            <td><a href="{{route('admin.members.memberships.edit',['id'=>$membership->id])}}"><i
                                                            class="fa fa-pencil"></i></a>
                                                <a class="delete" href="#" onclick="myDelete({{$membership->id}})" data-id="{{$membership->id}}"><i
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
        @endsection
        @section('javascript')

            <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
            <script type="text/javascript"
                    src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

            <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
            <!-- END PAGE PLUGINS -->

            <!-- START TEMPLATE -->

            <script type="text/javascript">
                function myDelete(id) {
                    $('#Delete_id').val(id);

                    $('#mb-remove-row').show();
                }

                function changeStatus(object, id) {
                    var formUrl = 'memberships/status/change/' + id
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


                $(document).ready(function () {

                    var table = $('#membership_table').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "deferLoading": '{{$count}}',
                        "ajax": '/admin/memberships/get/dataTable',
                        "columns": [
                            {"data": "col_id"},
                            {"data": "plan_name"},
                            {"data": "price"},
                            {"data": "duration"},
                            {"data": "no_of_category"},
                            {"data": "product_upload"},
                            {"data": "no_of_enquiry"},
                            {"data": "created_at_col"},
                            {"data": "updated_at_col"},
                            {"data": "select_status"},
                            {"data": "action"},
                        ],
                        columnDefs: [
                            { orderable: false, targets: [ 0] }
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
                            url: "memberships/" + id,
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
                                    window.location.replace("/admin/memberships");

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


                })
            </script>

@endsection

