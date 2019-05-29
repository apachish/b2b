@extends('layouts.admin')

@section('content')


<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{route('admin')}}">{{__("messages.Home")}}</a></li>
    <li class="active"><a href="#">{{__("messages.Manage Menu")}}</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>{{__("messages.Category")}}</h2>
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
                        <a href="{{ url('admin/menus/categories/create')}}" class="btn btn-success"><i
                                class="fa fa-plus"></i></a>
                        <div class="row">
                            <div class="col-md-5">
                            </div>
                            <div class="col-md-1" style="text-align: right">
                                <label>{{__("messages.Filter")}}:</label>
                            </div>
                            <div class="col-md-2">
                                <select name="language" class="form-control" onchange="this.form.submit()">
                                    <option {{empty($language)?"selected":"" }} value="" >{{__("messages.Select language")}}</option>
                                    <option  {{$language=="fa_IR"?"selected":"" }} value="fa_IR" >{{__("messages.fa_IR")}}</option>
                                    <option {{$language==="en_US"?"selected":"" }} value="en_US" >{{__("messages.en_US")}}</option>
                                </select>
                            </div>
                        </div>
                    </form>
                        <div class="panel-body">
                            <table id="customers2" class="table ">
                                <thead>
                                <tr>
                                    <th>{{__("messages.Title")}}</th>
                                    <th>{{__("messages.Position")}}</th>
                                    <th>{{__("messages.created")}}</th>
                                    <th>{{__("messages.modified")}}</th>
                                    <th>{{__("messages.status")}}</th>
                                    <th>{{__("messages.language")}}</th>
                                    <th>{{__("messages.Action")}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    @if($category)
                                        <tr>
                                            <td>
                                                {{$category->title }}
                                            </td>
                                            <td>
                                                {{$category->position }}
                                            </td>
                                            <td>
                                                {{app()->getLocale()=='fa'?jdate(strtotime($category->created_at)):$category->created_at }}
                                            </td>
                                            <td>
                                                {{app()->getLocale()=='fa'?jdate(strtotime($category->updated_at)):$category->updated_at }}
                                            </td>
                                            <td>
                                                {{$category->status?__('messages.active'):__('messages.unactivated') }}
                                            </td>
                                            <td>
                                                {{$category->locale }}
                                            </td>
                                            <td>
                                                <a href="{{ route('menus.categories.edit', ['id' => $category->id]) }}"><i
                                                            class="fa fa-pencil"></i></a>
                                                <a data-id="{{$category->id}}" class="delete" href="#"><i
                                                            class="glyphicon glyphicon-remove-circle"></i></a>
                                            </td>
                                        </tr>
                                  @endif
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                </div>


            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT WRAPPER -->
    <!-- END PAGE CONTENT -->
    <!-- END PAGE CONTAINER -->

    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-times"></span> Remove <strong>Data</strong> ?</div>
                <div class="mb-content">
                    <p>{{__("messages.Are you sure you want to remove this row?")}}</p>
                    <p>{{__("messages.Press Yes if you sure.")}}</p>
                    <input type="hidden" value="" id="Delete_id">
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button class="btn btn-success btn-lg mb-control-yes">{{__("messages.Yes")}}</button>
                        <button class="btn btn-default btn-lg mb-control-close">{{__("messages.NO")}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    <!-- END MESSAGE BOX-->
    <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="/js/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- END PAGE PLUGINS -->

    <!-- START TEMPLATE -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete').on('click', function () {
                $('#Delete_id').val($(this).attr('data-id'));

                $('#mb-remove-row').show();

            })
            $('.mb-control-close').on('click', function () {
                $('#mb-remove-row').hide();

            })
            $('.mb-control-yes').on('click', function () {
                var id = $('#Delete_id').val();
                window.location.replace("category/delete/"+id);
            })

            $('.status').on('change', function () {
                btn.prop('disabled', true);
                btn.text('منتظر باشید ...');
                $.ajax({
                    url: formURL,
                    type: 'POST',
                    data: formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        if (data.status) {
                            window.location = "/admin/category";
                        } else {
                            var error = '';
                            $.each(data.status, function (key, value) {
                                console.log(key + ": " + value);
                                if (Array.isArray(value) || (typeof value === 'object')) {
                                    error += key + '=>';
                                    $.each(value, function (k, val) {
                                        console.log(k + ": " + val);
                                        error += val + '<br>';

                                    });
                                } else {
                                    error += key + '=>' + value + '<br>';
                                }
                            });
                            $('.error_message').show();
                            $('.error_message').addClass('error');
                            $('.error_message').html('eqwwq');
                        }
                        btn.prop('disabled', false);
                        closeNav();
                    }
                    , error: function (jqXHR, textStatus, errorThrown) {

                        //if fails
                    }
                });
            })
            var table = $('#customers2').DataTable( {
                "language": {
                    "lengthMenu": "{{__('messages.Display')}} _MENU_ {{__('messages.records per page')}}",
                    "zeroRecords": "{{__('messages.Nothing found - sorry')}}",
                    "info": "{{__('messages.Showing page')}}  _PAGE_ {{__('messages.of')}} _PAGES_",
                    "infoEmpty": "{{__('messages.No records available')}}",
                    "infoFiltered": "({{__('messages.filtered from')}} _MAX_ {{__('messages.total records')}})",
                    "search": "{{__('messages.Search')}}:",
                    "paginate": {
                        "previous": "{{__('messages.Previous')}}",
                        "next": "{{__('messages.Next')}}",
                    }


                },
                columnDefs: [
                    { orderable: false, targets: [ 2] }
                ],
                "order": [ 1, "asc" ]
            } );

        })
    </script>
@endsection
