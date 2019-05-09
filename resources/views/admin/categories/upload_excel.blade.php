@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><span class="fa fa-download"></span>{{ __('messages.Export Category')}}</h3>
                    <p> {{ __("messages.Add file")}}  <code><a href="/sample.xls">  {{ __("messages.excel[sample]")}}</a></code>
                         {{ __("messages.to get  box")}}</p>
                    <form action="{{route('categories.import')}}" class="dropzone" id="myId">
                        @csrf

                    </form>
                </div>
            </div>

        </div>



    </div>

@endsection
@section('javascript')
    <script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="/js/admin/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="/js/admin/plugins/fileinput/fileinput.min.js"></script>
    <script type="text/javascript" src="/js/admin/plugins/filetree/jqueryFileTree.js"></script>
    <!-- END PAGE PLUGINS -->
    <!-- START TEMPLATE -->

    <script>
        $(document).ready(function () {
            {{--$("#myId").dropzone({ url: "{{route("categories.import")}}",--}}
            {{--    acceptedFiles: "text/csv,application/vnd.ms-excel"--}}

            {{--});--}}
            Dropzone.options.dropzone =
                {
                    maxFilesize: 12,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time+file.name;
                    },
                    acceptedFiles: "text/csv,application/vnd.ms-excel",
                    addRemoveLinks: true,
                    timeout: 50000,
                    removedfile: function(file)
                    {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: "{{route("categories.import")}}",
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function(file, response)
                    {
                        console.log(response);
                    },
                    error: function(file, response)
                    {
                        return false;
                    }
                };
        })

    </script>
@endsection