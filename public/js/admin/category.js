$(document).on('ready', function (e) {
    $('.mb-control-close').on('click', function () {
        $('#mb-remove-row').hide();

    })
    $('.mb-control-yes').on('click', function () {
        var id = $('#Delete_id').val();
        if(!id){
            console.log('idish nist');
            toastr.error("Can Not Delete Image");
            return false;
        }
        $.ajax({
            url: '',//'{{url('admin/category/image-delete',['id'=>$category['categoryId']])}}'
            type: 'POST',
            data: {status: status},
        success: function (data) {
            console.log(data);
            if (data.status == 200) {
                $('.gallery-item-remove').parents(".gallery-item").fadeOut(400,function(){
                    $('.gallery-item-remove').remove();
                });
                toastr.success(data.message);
                $('#mb-remove-row').hide();

            } else {
                toastr.error(data.message);
            }

        }
    , error: function (jqXHR, textStatus, errorThrown) {
            toastr.error("Can Not Delete Image");
            //if fails
        }
    });

    })
    $('#category').on("change", function (e) {
        $("#category2").val('');
        $("#category3").val('');
        var parent_id = $('#category').val();
        console.log(parent_id);
        if (!parent_id) {
            $("#div_category3").hide();
            $("#div_category2").hide();
        }
        $("#div_category3").hide();
        if (parent_id) {
            $("#div_category2").show();
            // mostly used event, fired to the original element when the value changes
            $.ajax({
                url: "/api/category?p_pid=" + parent_id,
                type: 'Get',
                success: function (data) {
                    var option = "<option value=''>{{__('Select  Sub Category')}}</option>";
                    if (data) {
                        $.each(data, function (index, value) {
                            option += "<option value='" + value.categoryId + "'>" + value.title + "</option>"
                        });
                        $('#category2').html(option);
                        $('#category2').selectpicker('refresh');

                    }
                }
                , error: function (jqXHR, textStatus, errorThrown) {

                    //if fails
                }
            });

        }


    });

});