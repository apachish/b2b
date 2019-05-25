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
    <h2><span class="fa fa-arrow-circle-o-left"></span>{{ __("messages.Translator") }}</h2>
</div>
<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <!-- START DATATABLE EXPORT -->
            <div class="panel panel-default">
                <div class="panel-heading">

                    <form id="formtranslator" action="{{ route('admin.translates.change') }}" method="post">
                        {{csrf_field()}}
                        <a href="{{route('translators.create')}}" class="btn btn-info "><i
                                    class="fa fa-plus"></i></a>
                        <button class="btn btn-info "><i
                                    class="fa fa-exchange"></i></button>
                        <div class="panel-body">
                            <table id="translate_table" class="table ">
                                <thead>
                                <tr>
                                    <th>{{ __("messages.Message") }}</th>
                                    <th>{{ __("messages.Translator En") }}</th>
                                    <th>{{ __("messages.Translator Fa") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($translates as $i=>$translate)
                                <tr>
                                    <td>{{$translate->key}}</td>
                                    @if($translate->text)
                                    @foreach($translate->text as $key=>$language)
                                            <td>{{$language}}</td>
                                    @endforeach
                                    @endif
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
    @endsection
@section('javascript')
            <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
            <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

            <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
            <!-- END PAGE PLUGINS -->

            <!-- START TEMPLATE -->

            <script type="text/javascript">
                $(document).ready(function () {

                    $('#translate_table').DataTable( {
                        "processing": true,
                        "serverSide": true,
                        // "ajax": 'http://b2bshahriar.com/api/translate',
                        "deferLoading": '{{$count}}',
                        "ajax": '/admin/translators/get/dataTable',
                        "columns": [
                            { "data": "key" },
                            { "data": "text.en" },
                            { "data": "text.fa" }
                        ],
                        'columnDefs': [
                            {
                                'targets': 1,
                                render: function (data, type, row) {
                                        if(data)
                                            return '<textarea class="form-control" cols="10" rows="5"  name="translator['+row.id+'][en]" >'+data+'</textarea>';
                                        else
                                            return '<textarea class="form-control" cols="10" rows="5"  name="translator['+row.id+'][en]" ></textarea>';
                                },
                                className: "dt-body-center",
                                orderable: false,
                                searchable: false

                            },{
                                'targets': 2,
                                render: function (data, type, row) {
                                    if(data)
                                        return '<textarea class="form-control" cols="10" rows="5"  name="translator['+row.id+'][fa]" >'+data+'</textarea>';
                                    else
                                        return '<textarea class="form-control" cols="10" rows="5"  name="translator['+row.id+'][fa]" ></textarea>';                                },
                                className: "dt-body-center",
                                orderable: false,
                                searchable: false

                            }
                        ]
                    } );

                    $('#formtranslator').on('submit', function (e) {
                        e.preventDefault();
                        var numberPage  =   parseInt($('select[name=translate_table_length]').val());
                        var search      =   $('input[type=search]').val();
                        var page        =   parseInt($('a.paginate_button.current').text());
                        var formData = $(this).serialize()+"&page="+page+"&search="+search+"&length="+numberPage; // form data as string
                        var formAction = $(this).attr('action'); // form handler url
                        var formMethod = $(this).attr('method'); // GET, POST

                        $.ajaxSetup({
                            headers: {
                                'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type  : formMethod,
                            url   : formAction,
                            data  : formData,
                            cache : false,

                            beforeSend : function() {
                                console.log(formData);
                            },

                            success : function(data) {
                                console.log(data);
                                if (data.status== 200) {
                                    toastr.success(data.message);
                                    console.log("/admin/translator");
                                } else {
                                    var error = '';
                                    toastr.error(data.message);
                                }
                                btn.prop('disabled', false);
                                closeNav();
                            },

                            error : function() {

                            }
                        });

                        $.ajax({
                            url: formURL+"?page="+page+"&search="+search+"&length="+numberPage,
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                console.log(data);
                                if (data.status== 200) {
                                    toastr.success(data.message);
                                    console.log("/admin/translator");
                                } else {
                                    var error = '';
                                    toastr.error(data.message);
                                }
                                btn.prop('disabled', false);
                                closeNav();
                            }
                            , error: function (jqXHR, textStatus, errorThrown) {

                                //if fails
                            }
                        });
                        e.preventDefault(); //STOP default action
                        e.unbind(); //unbind. to stop multiple form submit.

                    })



                })
            </script>

@endsection

