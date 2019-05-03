@extends('layouts.admin')

@section('content')


<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="{{route('admin')}}">{{__("Home")}}</a></li>
    <li class="active"><a href="#">{{__("Manage Menu")}}</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>{{__("Category")}}</h2>
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
                                <label>{{__("Filter")}}:</label>
                            </div>
                            <div class="col-md-2">
                                <select name="language" class="form-control" onchange="this.form.submit()">
                                    <option {{empty($language)?"selected":"" }} value="" >{{__("Select language")}}</option>
                                    <option  {{$language=="fa_IR"?"selected":"" }} value="fa_IR" >{{__("fa_IR")}}</option>
                                    <option {{$language==="en_US"?"selected":"" }} value="en_US" >{{__("en_US")}}</option>
                                </select>
                            </div>
                        </div>
                    </form>
                        <div class="panel-body">
                            <table id="customers2" class="table ">
                                <thead>
                                <tr>
                                    <th>{{__("Title")}}</th>
                                    <th>{{__("Position")}}</th>
                                    <th>{{__("created")}}</th>
                                    <th>{{__("modified")}}</th>
                                    <th>{{__("status")}}</th>
                                    <th>{{__("language")}}</th>
                                    <th>{{__("Action")}}</th>
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
                                                {{$category->status?__('active'):__('unactivated') }}
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
                    <p>{{__("Are you sure you want to remove this row?")}}</p>
                    <p>{{__("Press Yes if you sure.")}}</p>
                    <input type="hidden" value="" id="Delete_id">
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <button class="btn btn-success btn-lg mb-control-yes">{{__("Yes")}}</button>
                        <button class="btn btn-default btn-lg mb-control-close">{{__("No")}}</button>
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
                    { orderable: false, targets: [ 2] }
                ],
                "order": [ 1, "asc" ]
            } );

        })
    </script>
@endsection
