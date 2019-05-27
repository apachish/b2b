jQuery(document).ready(function () {
    $("#sendcomment").click(function(e)
    {

        var formURL = $('#url_comment').val();
        var email = $("#email_comment").val();
        var name = $("#name_comment").val();
        var comment = $("#text_comment").val();
        var verification_code = $("#verify_code_article").val();
        if(!email || !name || !comment || !verification_code)
        {
            toastr.error('fill all input');
            return false;
        }
        if(!validateEmail(email))
        {
            toastr.error('email invalid');
            return false;
        }

        var postData = new FormData();
        postData.append('name', name);
        postData.append('email',email);
        postData.append('comment',comment);
        postData.append('verify_code_article',verification_code);
        $.ajax(
            {
                type: "POST",
                url: formURL,
                dataType: "json",
                data: postData,
                processData: false,
                contentType: false,
                success:function(data, textStatus, jqXHR)
                {
                    document.getElementById('captchaimage').src = '/captcha/normal/' + Math.random() + '/00000/ffffff/article';
                    document.getElementById('verify_code_article').value = '';
                    document.getElementById('verify_code_article').focus();
                    toastr.success(data.message);
                    //data: return data from server
                },
                error: function(jqXHR, textStatus, errorThrown)
                {

                    document.getElementById('captchaimage').src = '/captcha/normal/' + Math.random() + '/00000/ffffff/article';
                    document.getElementById('verify_code_article').value = '';
                    document.getElementById('verify_code_article').focus();
                    console.log(jqXHR);
                    toastr.error(JSON.parse(jqXHR.responseText).message);

                    //if fails
                }
            });
    });
    $("#button_load").click(function(e)
    {
        var url= $(this).attr('data-url');
        console.log(url);
        $(this).hide();
        $('#loadmore').show(10);
        var offset = $('.comment_list li').length;

        $.ajax(
            {
                url : url+"?offset="+offset,
                type: "Get",
                data : {},
                success:function(data, textStatus, jqXHR)
                {

                    var html = "";
                    $.each(data, function (index, value) {
                        html +="<li>";
                            html +="<div class='cm_list'>";
                            html +="<p class='i arial fs13'>"+value.comment+"</p>";
                            html +="<p class='by'>Posted by: <b class='ttu'>"+value.name+"</b><br>";
                            console.log(value.date);
                            html +=value.date;
                            html +="</div>";
                            html +="<strong>&nbsp;</strong>";
                            html +="</li>";
                    });
                    $('#loadmore').hide(10);
                    var count_load = $('.comment_list li').length+1;
                    var all = $('#number_all_comment').text();console.log(all);
                    if(count_load < all)
                        $('#button_load').show();
                    $('.comment_list').append(html)
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    //if fails
                }
            });
    });
})
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}