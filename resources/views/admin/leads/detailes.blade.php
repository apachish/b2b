@extends('layouts.admin')

@section('content')

    <div class="page-content-wrap">
    <?php
    if($error)
        foreach($error as $key=>$message) {
            echo '<span class="error-bubble col-xs-6 col-xs-offset-6">
				  <span class="error-message">'.$key.'=>'.$message. '</span>
				</span>';
        }
    ?>
    <div class="row">
        <div class="col-md-12">
            <form   action="<?= $this->url('management_empty/products_detail',array("id" => $lead['id'])) ?>" id="lead_details"   class="form-horizontal"  method="post" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong><?=$this->translate("Edit")?></strong> <?=$this->translate("Lead")?></h3>
                        <ul class="panel-controls mb-details-close">
                            <li ><a href="#" class="panel-remove"><span class="fa fa-times "></span></a></li>
                        </ul>
                    </div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="form-group">
                                <h5 class="col-sm-3 control-label" for="lead_title"><?=$this->translate('Title')?> <b class="red">*</b> :</h5>
                                <div class="col-sm-9">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                        <input class="inouttyeptext form-control " name="productName" id="productName" type="text" value="<?=$lead['productName']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  short_description">
                                <h5 class="col-sm-3 control-label" for="short_description"><?=$this->translate('Short Description')?> <b class="red">*</b> :</h5>
                                <div class=" col-sm-9">
                                    <textarea class="inouttyeptext form-control summernote" name="productsDescription" cols="40" rows="2" id="productsDescription" class="db full"><?=$lead['productsDescription']?></textarea>
                                    <p class="charlimit"></p>
                                    <p><span class="CharacterLimit"><?=$this->translate('Character Limit')?>: 200</span> </p>
                                </div>
                            </div>

                            <div class="form-group  detail_description">
                                <h5 class="col-sm-3 control-label" for="detail_description"><?=$this->translate('Detailed Description')?> <b class="red">*</b> :</h5>
                                <div class=" col-sm-9">
                                    <textarea class="inouttyeptext form-control summernote" name="detailDescription" cols="40" rows="7" id="detailDescription" class="db full"><?=$lead['detailDescription']?></textarea>
                                    <p class="charlimit"></p>
                                    <p><span class="CharacterLimit"><?=$this->translate('Character Limit')?>: 1000</span> </p>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary" type="reset" onClick="$('#validate').validationEngine('hide');"><?=$this->translate("Clear Form")?></button>
                        <button class="btn btn-primary submit" type="submit"><?=$this->translate("Submit")?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<!-- END PAGE PLUGINS -->
<script type="text/javascript" src="/js/plugins/summernote/summernote.js"></script>

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
            var formObj = $(this);
            var formURL = formObj.attr("action");
            var formData = new FormData(this);
            var title = $('#productName').val();
            if (!title) {
                toastr.error('<?=$this->translate('Enter title')?>');
                return false;
            }
            $.ajax({
                url: formURL,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function (data, textStatus, jqXHR) {
                    data = JSON.parse(data);
                    if (data.code == 400) {

                        toastr.error(data.status);
                    }
                    if (data.code == 200) {

                        toastr.success(data.status);
                        $('#message-box-info-details').hide();

                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault(); //Prevent Default action.
        });

    })
</script>
@endsection
