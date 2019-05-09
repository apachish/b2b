@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
{{--            //error--}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><span class="fa fa-download"></span>{{ __('messages.Export Product')}}</h3>
                    <p>{{ __("messages.Add file")}}  <code><a href="/sample_user.xls"> {{ __("messages.excel[sample]")}}</a></code>
                        {{ __("messages.to get  box")}}</p>
                    <form action="#" class="dropzone" id="myId"></form>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('javascript')
    <script type='text/javascript' src='/js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="/js/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="/js/plugins/fileinput/fileinput.min.js"></script>
    <script type="text/javascript" src="/js/plugins/filetree/jqueryFileTree.js"></script>
    <!-- END PAGE PLUGINS -->
    <script type="text/javascript" src="/js/admin/settings.js"></script>

    <script type="text/javascript" src="/js/admin/plugins.js"></script>
    <script type="text/javascript" src="/js/admin/actions.js"></script>
    <!-- START TEMPLATE -->

    <script>
        $(document).ready(function () {
            $("#myId").dropzone({ url: "{{route("uploadExcelLead")}}",
                acceptedFiles: "text/csv,application/vnd.ms-excel"

            });

        })

    </script>
@endsection