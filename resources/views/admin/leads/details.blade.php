<div class="page-content-wrap">
    @include('admin.error')

    <div class="row">
        <div class="col-md-12">
            <form action="{{route('leads.details.update',['id'=>$lead->id])}}" id="lead_details" class="form-horizontal"
                  method="post"
                  enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>{{__('messages.Edit')}}</strong> {{__('messages.Lead')}}
                        </h3>
                        <ul class="panel-controls mb-details-close">
                            <li><a href="#" class="panel-remove"><span class="fa fa-times "></span></a></li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="form-group">
                                <h5 class="col-sm-3 control-label" for="lead_title">{{__('messages.Title')}} <b
                                            class="red">*</b> :</h5>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input class="inouttyeptext form-control " name="name" id="name" type="text"
                                               value="{{$lead->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  short_description">
                                <h5 class="col-sm-3 control-label"
                                    for="short_description">{{__('messages.Short Description')}} <b
                                            class="red">*</b> :</h5>
                                <div class=" col-sm-9">
                                        <textarea class="inouttyeptext form-control summernote" name="description"
                                                  cols="40" rows="2" id="productsDescription"
                                                  class="db full">{{$lead->description}}</textarea>
                                    <p class="charlimit"></p>
                                    <p><span class="CharacterLimit">{{__('messages.Character Limit')}}: 200</span>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group  detail_description">
                                <h5 class="col-sm-3 control-label"
                                    for="detail_description">{{__('messages.Detailed Description')}} <b
                                            class="red">*</b>
                                    :</h5>
                                <div class=" col-sm-9">
                                        <textarea class="inouttyeptext form-control summernote"
                                                  name="detail_description" cols="40" rows="7" id="detailDescription"
                                                  class="db full">{{$lead->detail_description}}</textarea>
                                    <p class="charlimit"></p>
                                    <p><span class="CharacterLimit">{{__('messages.Character Limit')}}: 1000</span>
                                    </p>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary" type="reset"
                                onClick="$('#validate').validationEngine('hide');">{{__('messages.Clear Form')}}</button>
                        <button class="btn btn-primary submit" type="submit">{{__('messages.Submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END PAGE PLUGINS -->
<script type="text/javascript" src="/js/admin/plugins/summernote/summernote.js"></script>

<!-- START TEMPLATE -->


<script type="text/javascript">
    $(document).ready(function () {

        var postForm = function () {
            var content = $('#productsDescription').html($('.summernote').code());
            var content = $('#detailDescription').html($('.summernote').code());
        }
        $('.mb-details-close').on('click', function () {
            $('#message-box-info-details').hide();

        })
        $("#lead_details").submit(function (e) {


            e.preventDefault();
            $('input.btn-letter').prop('disabled', true);
            $('#loding_email').show( );
            var formObj = $(this);
            var formURL = formObj.attr("action");

            $.ajax({
                type: "POST",
                url: formURL ,
                dataType: "json",
                data: $('#lead_details').serialize(),
                success: function(response) {


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
                        $('#message-box-info-details').hide();

                        toastr.success(response.meta.message);

                    }
                    return true;
                },
                error: function(response) {

                    return true;
                }
            });

        });

    })
</script>
