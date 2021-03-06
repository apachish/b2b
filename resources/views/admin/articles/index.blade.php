@extends('layouts.admin')
@section('css')
    <style href="{{asset('css/jquery.dataTables.min.css')}}"></style>
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

                        <form id="formtranslator" action="{{route('admin.articles.action')}}" method="post">
                            {{csrf_field()}}
                            <a href="{{route('admin.articles.create')}}" class="btn btn-info "><i
                                        class="fa fa-plus"></i></a>
                            <button type="submit" name="action" value="active"
                                    class="btn btn-success"><i class="glyphicon glyphicon-info-sign"></i>{{__("messages.Active") }}</button>
                            <button type="submit" name="action" value="deactivate"
                                    class="btn btn-warning"><i class="glyphicon glyphicon-info-sign"></i>{{__("messages.activate") }}</button>

                            <button type="submit" name="action" value="delete"
                                    class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>{{__("messages.Delete") }}</button>
                            <button  name="action" type="submit" class="btn btn-info " value="order_submit"><i
                                        class="glyphicon glyphicon-sort-by-order"></i>{{__("messages.Submit Ordering") }}</button>
                            <div class="panel-body">
                                @include('flash::message')

                                <table id="article_table" class="table ">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" />
                                        </th>
                                        <th>{{ __("messages.Title / Detail") }}</th>
                                        <th>{{ __("messages.Ordering") }}</th>
                                        <th>{{ __("messages.Language") }}</th>
                                        <th>{{ __("messages.Status") }}</th>
                                        <th>{{ __("messages.Action") }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($articles as $i=>$article)
                                        <tr>
                                            <td>
                                                {{$article->id}}
                                            </td>
                                            <td>{{$article->title}}</td>
                                            <td>
                                                {{$article->sort_order}}
                                            </td>
                                            <td>{{$article->locale}}</td>
                                            <td>
                                               {{$article->status}}
                                            </td>
                                            <td><a href="{{route('admin.articles.edit',['id'=>$article->id])}}"><i
                                                            class="fa fa-pencil"></i></a>
                                                <a class="delete" href="#" data-id="{{$article->id}}"><i
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
            <!-- END PAGE PLUGINS -->

            <!-- START TEMPLATE -->

            <script type="text/javascript">
                function myDelete(id){
                    $('#Delete_id').val(id);

                    $('#mb-remove-row').show();
                }
                function changeStatus(object,id) {
                    var formUrl = 'articles/status/change/' + id
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: formUrl,
                        type: 'POST',
                        data: {status:object.value},
                        success: function (response) {
                            if (response.status == 'failed' ) {
                                var message = response.meta.message;
                                if(message && (typeof message === 'object' || typeof message === 'Array') ) {

                                    $.each(message, function (index, value) {
                                        $.each(value, function (key, item) {
                                            toastr.error(item);

                                        });

                                    });
                                } else {
                                    toastr.error(message);
                                }
                            }
                            if (response.status=='success') {

                                toastr.success(response.meta.message);

                            }
                        }
                        , error: function (jqXHR, textStatus, errorThrown) {

                            //if fails
                        }
                    });
                }
                function myDetails(id){

                    var formUrl = '/admin/articles/' + id;//$(this).attr('data-url');

                    $('#message-box-info-details_content').html(" <img src='/images/loading.gif'><img>");
                    $.ajax({
                        url: formUrl,
                        type: 'GET',
                        success: function (data) {

                            html ='<div class="mb-title"><span class="fa fa-info"></span>'+data.name+'</div>';
                            html +='<div class="mb-content">';
                            if(data.short_description)
                            {
                                html +='<p>'+data.short_description+'</p>';
                            }
                            if(data.description){
                                html +='<p>'+data.description+'</p>';
                            }
                            html +='</div>';

                            $('#message-box-info-details_content').html(html);
                            $('#message-box-info-details').show();


                        }
                        , error: function (jqXHR, textStatus, errorThrown) {

                            //if fails
                        }
                    });
                }
                $(document).ready(function () {

                    var table = $('#article_table').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "deferLoading": '{{$count}}',
                        "ajax": '/admin/articles/get/dataTable',
                        "columns": [
                            {"data": "id"},
                            {"data": "title"},
                            {"data": "sort_order"},
                            {"data": "locale"},
                            {"data": "status"},
                            {"data": ""}
                        ],
                        'columnDefs': [
                            {
                                'targets': 0,
                                render: function (data, type, row) {
                                    return '<input type="checkbox" name="arr_ids[]" value="'+row.id+'" />';
                                },
                                className: "dt-body-center",
                                orderable: false,
                                searchable: false

                            },{
                                'targets': 1,
                                render: function (data, type, row) {
                                    return '<p>'+row.title+'</p><a type="button" class=" mb-control details" data-details="message-box-info-details" ' +
                                        '   onclick="myDetails('+ row.id +')"'  +
                                        'data-box="#message-box-info-details">{{__('messages.View Details')}}</a>';
                                },
                                className: "dt-body-center",
                                orderable: false,
                                searchable: false

                            }, {
                                'targets': 2,
                                render: function (data, type, row) {
                                    return '<input type="number" name="order['+row.id+']" value="'+row.sort_order+'" class="sortOrder form-control"\n'+
'                                                   id="sortOrder_'+row.sort_order+'">';
                                },
                                className: "dt-body-center",
                                orderable: false,
                                searchable: false

                            },{
                                'targets': 3,
                                render: function (data, type, row) {

                                    return  lang.get('messages.'+row.locale);
                                },
                                className: "dt-body-center",
                                orderable: false,
                                searchable: false

                            }, {
                                'targets': 4,
                                render: function (data, type, row) {

                                    return '<select class="form-control status" name="status" onchange="changeStatus(this,'+row.id+')" ' +
                                        'id="status_' + row.id + '">' +
                                        '<option '+(row.status==0?"selected":"")+' value="0" >{{__('messages.Unactivated')}}</option><option '+(row.status==1?"selected":"")+' value="1" >{{__('active')}}</option></select>';

                                },
                                className: "",
                                orderable: false,
                                searchable: false

                            }, {
                                'targets': 5,
                                render: function (data, type, row) {

                                    return '<a href="/admin/articles/' + row.id + '/edit">' +
                                        '<i class="fa fa-pencil"></i></a>' +
                                        '<a class="delete" href="#" data-id="' + row.id + '" onclick="myDelete('+ row.id +')" >'  +
                                        '<i class="glyphicon glyphicon-remove-circle"></i>' +
                                        '</a>';

                                },
                                className: "dt-body-center",
                                orderable: false,
                                searchable: false

                            }
                        ]
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
                            url: "articles/"+id,
                            type: 'Delete',
                            data: {status:$(this).val()},
                            success: function (response) {
                                if (response.status == 'failed' ) {
                                    var message = response.meta.message;
                                    if(message && (typeof message === 'object' || typeof message === 'Array') ) {

                                        $.each(message, function (index, value) {
                                            $.each(value, function (key, item) {
                                                toastr.error(item);

                                            });

                                        });
                                    } else {
                                        toastr.error(message);
                                    }
                                }
                                if (response.status=='success') {

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



                })
            </script>

@endsection

