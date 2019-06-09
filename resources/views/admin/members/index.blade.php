@extends('layouts.admin')
@section('css')
    <style href="{{asset('css/jquery.dataTables.min.css')}}"></style>
@endsection
@section('content')
    <!-- START PAGE CONTAINER -->

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="{{ route('admin')}}">{{ __("messages.Home") }}</a></li>
        <li class="active"><a href="#">{{ __("messages.Members Management") }}</a></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span>{{ __("messages.Members") }}</h2>
    </div>
    <!-- END PAGE TITLE -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <!-- START DATATABLE EXPORT -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form action="#" method="post">

                            <div class="row">
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-1" style="text-align: right">
                                    <label>{{__("messages.Filter")}}:</label>
                                </div>
                                <div class="col-md-2">
                                    <select name="filter[featuredCompany_filter]" class="form-control"
                                            onchange="this.form.submit()">
                                        <option {{ empty(old('featuredCompany_filter'))?"selected":"" }} value="">{{__("messages.featured Company") }}</option>
                                        <option {{old('featuredCompany_filter')==1?"selected":"" }} value="1">{{__("messages.Yes") }}</option>
                                        <option {{old('featuredCompany_filter')==="0"?"selected":"" }} value="0">{{__("messages.NO") }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="filter[status]" class="form-control" onchange="this.form.submit()">
                                        <option {{empty(old('status'))?"selected":"" }} value="">{{__("messages.status") }}</option>
                                        <option {{old('status')==-1?"selected":"" }} value="-1">{{__("messages.inactive") }}</option>
                                        <option {{old('status')==1?"selected":"" }} value="1">{{__("messages.active") }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="filter[long_offline]" class="form-control"
                                            onchange="this.form.submit()">
                                        <option {{old('long_offline')?"selected":"" }} value="">{{__("messages.Select") }}</option>
                                        <option {{old('long_offline')==1?"selected":"" }} value="1">{{__("messages.Long time offline") }}</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form id="formtranslator" action="{{route('admin.members.action')}}" method="post">
                            {{csrf_field()}}

                            <button name="action" type="submit" value="activate" class="btn btn-info "><i
                                        class="glyphicon glyphicon-chevron-up"></i> {{__("messages.Activate") }}</button>
                            <button name="action" type="submit"  value="deactivate" class="btn btn-warning"><i
                                        class="glyphicon glyphicon-chevron-down"></i> {{__("messages.Deactivate") }}</button>
                            <button name="action" type="submit" value="delete" class="btn btn-danger "><i
                                        class="glyphicon glyphicon glyphicon-remove-circle"></i> {{__("messages.Delete") }}</button>
                            <button name="action" type="submit" value="send-mail" class="btn btn-dark "><i
                                        class="fa fa-envelope"></i> {{__("messages.Send Email") }}</button>
                            <button name="action" type="submit" value="set-featured" class="btn btn-outline "><i
                                        class="glyphicon fa fa-check-circle-o"></i> {{__("messages.Set As Featured Company") }}</button>
                            <button name="action" type="submit"  value="unset-featured" class="btn btn-outline-light "><i
                                        class="glyphicon fa fa-circle-o"></i> {{__("messages.UnSet As Featured Company") }}</button>
                            <div class="panel-body">
                                @include('flash::message')

                                <table id="member_table" class="table ">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox"
                                                   onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);"/>
                                        </th>
                                        <th>{{ __("messages.Information") }}</th>
                                        <th>{{ __("messages.UserName") }}</th>
                                        <th>{{ __("messages.Phone") }}</th>
                                        <th>{{ __("messages.Join Date") }}</th>
                                        <th>{{ __("messages.Last login") }}</th>
                                        <th>{{ __("messages.Status") }}</th>
                                        <th>{{ __("messages.Action") }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($members as $i=>$member)
                                        <tr>
                                            <td><input type="checkbox" name="arr_ids[]" value="{{$member->id}}"/></td>

                                            <td><p>{{$member->getDisplayName()}}</p>
                                                <p><a class="view"
                                                      onclick="myDetails({{$member->id}})">{{ __("messages.View Details!")}}</a>
                                                </p>
                                                <p>{{ __("messages.Posted Products")}}:{{$member->leads_count}}</p>
                                                <p>{{$member->featured_company?__("messages.Featured"):''}}</p>
                                                <p>{{__("messages.Company Name")}}:{{$member->company_name}}</p>
                                            </td>
                                            <td>{{$member->username}}</td>
                                            <td>{{$member->mobile}}</td>
                                            <td>{{$member->created_at}}</td>
                                            <td>{{$member->last_login_date}}</td>
                                            <td>
                                                <select class="form-control status" name="change_status"
                                                        onchange="changeStatus(this,'{{$member->id}}','status')"
                                                        data-id="{{ $member->id }}" id="Status_{{ $member->id }}">
                                                    <option value="0" {{ $member->status == '0' ? 'selected' : '' }}>{{ __("messages.Inactive") }}</option>
                                                    <option value="1" {{ $member->status == '1' ? 'selected' : '' }}>{{ __("messages.Active") }}</option>
                                                </select>
                                            </td>
                                            <td><a href="{{route('admin.members.edit',['id'=>$member->id])}}"><i
                                                            class="fa fa-pencil"></i></a>
                                                <a class="delete" href="#" onclick="myDelete({{$member->id}})"
                                                   data-id="{{$member->id}}"><i
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
                    var formUrl = 'members/status/change/' + id
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

                    var formUrl = '/admin/members/' + id;//$(this).attr('data-url');

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

                    var table = $('#member_table').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "deferLoading": '{{$count}}',
                        "ajax": '/admin/members/get/dataTable',
                        "columns": [
                            {"data": "id"},
                            {"data": "info"},
                            {"data": "username"},
                            {"data": "phone"},
                            {"data": "created_at"},
                            {"data": "last_login_date"},
                            {"data": "status_select"},
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
                            url: "members/" + id,
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
                                    window.location.replace("/admin/members");

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

