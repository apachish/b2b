$(document).ready(function () {




    $('#checkcredential').click(function(){
        var type = $('#credential').attr('type');
        if(type== 'password'){
            $('#credential').attr('type', 'text');
            $( "#checkPassword" ).removeClass('icon-eye').addClass( "icon-eye-slash" );

        }else{
            $('#credential').attr('type', 'password');
            $( "#checkPassword" ).removeClass('icon-eye-slash').addClass( "icon-eye" );

        }
        // $(this).is(':checked') ? $('#input_password').attr('type', 'text') : $('#input_password').attr('type', 'password');
    });
    $(".input_password").click(function() {

  $(this).toggleClass("icon-eye icon-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

    var ButtonValue;
    var myVar = setInterval(myTimer,  20 * 60 *1000);

    function myTimer() {
        $.get('/users/checkLogin', function(data, status){
            if(!data.data.login){
                if ($('#cboxOverlay').css('display')=='block'){
                    console.log('omadam1');
                    clearInterval(myVar);

                }else if ($(".sing_in").length){
                    $('.sing_in').click();

                    console.log('omadam');
                }else {
                    console.log('stop');

                    myStopFunction();
                }
            }else{
                console.log('login');
            }

        });


    }
    var $select2= $('.country').select2({
        width: '100%',
        allowClear: true,
        data: [],
    })
    function myStopFunction() {
        clearInterval(myVar);
    }
    $('.btn-letter').click(function(e){
        ButtonValue = $(this).val();
    });
    $('.reCaptcha').on('click',function () {
        $.get('/reCaptcha',function (response) {
            $('.reCaptcha-img').attr('src',response.data.captcha);
        });
    })
    $("#submit_popup_form").click(function () {
        $("#popup_form").submit();
    })
    $("#popup_form").submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var email = $('#email_enquery').val();
        if (email == '' || email == 'Enter Your Email ID') {
            toastr.error( 'Enter Email');
            return false;
        }
        if ((email.length) > 80) {
            toastr.error('Email can not be greater than 80 characters');
            return false;
        }
        if (!isEmailAddr(email)) {
            toastr.error('Please Enter Valid  Email');
            $('#email_enquery').focus();
            return false;

        }
        $.ajax({
            type: "POST",
            url: formURL ,
            dataType: "json",
            data: $('#popup_form').serialize(),

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

                    toastr.success(response.meta.message);

                }
                $('.reCaptcha-img').attr('src',response.data.captcha);

                document.getElementById('verification_code_newsletter').value='';
                document.getElementById('verification_code_newsletter').focus();
                return true;
            },
            error: function(response) {
                $('.reCaptcha-img').attr('src',response.data.captcha);
                document.getElementById('verification_code_newsletter').value='';
                document.getElementById('verification_code_newsletter').focus();
                return true;
            }
        });
        e.preventDefault(); //Prevent Default action.
    });
    $("#newletterform").submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        $('input.btn-letter').prop('disabled', true);
        $('#loding_email').show( );
        var formObj = $(this);
        var formURL = formObj.attr("action");
        var email = $('#letter_email').val();
        var name = $('#letter_name').val();
        if (email == '' || email == 'Enter Your Email ID') {
            toastr.error( 'Enter Email');
            $('input.btn-letter').prop('disabled', false);
            $('#loding_email').hide( );
            return false;
        }
        if (name == '') {
            toastr.error( 'Enter name');
            $('input.btn-letter').prop('disabled', false);
            $('#loding_email').hide( );
            return false;
        }
        if ((email.length) > 80) {
            toastr.error('Email can not be greater than 80 characters');
            $('input.btn-letter').prop('disabled', false);
            $('#loding_email').hide( );
            return false;
        }
        if (!isEmailAddr(email)) {
            toastr.error('Please Enter Valid  Email');
            $('#letter_email').focus();
            $('input.btn-letter').prop('disabled', false);
            $('#loding_email').hide( );
            return false;

        }
        $.ajax({
            type: "POST",
            url: formURL ,
            dataType: "json",
            data: $('#newletterform').serialize()+ '&status=' + ButtonValue,
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

                    toastr.success(response.meta.message);

                }
                $('.reCaptcha-img').attr('src',response.data.captcha);

                document.getElementById('verification_code_newsletter').value='';
                document.getElementById('verification_code_newsletter').focus();
                return true;
            },
            error: function(response) {
                $('.reCaptcha-img').attr('src',response.data.captcha);
                document.getElementById('verification_code_newsletter').value='';
                document.getElementById('verification_code_newsletter').focus();
                return true;
            }
        });
    });
    $(".english_input").keypress(function(event){
        var ew = event.which;
        if(ew == 32)
            return true;
        if(48 <= ew && ew <= 57)
            return true;
        if(65 <= ew && ew <= 90)
            return true;
        if(97 <= ew && ew <= 122)
            return true;
        return false;
    });
    function join_newsletter_validation(obj){

        /*if(obj.subscriber_name.value=='' || obj.subscriber_name.value=='Enter Your Name'){

            alert('Enter Name');
            return false;

        }
        if((obj.subscriber_name.value.length)>32){

            alert('Name can not be greater than 30 charectors');
            return false;
        }*/
        if(obj.subscriber_email.value=='' || obj.subscriber_email.value=='Enter Your Email ID'){

            alert('Enter Email');
            return false;

        }
        if((obj.subscriber_email.value.length)>80){

            alert('Email can not be greater than 80 charectors');
            return false;
        }
        if(!isEmailAddr(obj.subscriber_email.value))
        {
            alert('Please Enter Valid  Emailid');
            obj.subscriber_email.focus();
            return false;

        }

    }

    function isEmailAddr(email)
    {
        var regExp	=	/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regExp.test(email);
    }
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    $(".isNumber").keypress(function (evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    });
    // $('.toltip-category').hover(function () {
    //     var image = $(this).attr('data-toltip');
    //    //$(".toltip-category").tooltip({ content: '<img src="'+image+'" />' });
    //  $('a.tooltip:hover span').css('background-image', 'url('+image+')');
    //
    // })
    //$('a.tooltip:hover span').css('background-image', 'url('+image+')');

});
jQuery("#cboxTitle").addClass('icon-android-contacts');


$(window).scroll(function(){
    if($(this).scrollTop()>55){$('.t_2').addClass('t_2_fixer');$('.t_2_bottom').css({'height':'105px'})}
    else{$('.t_2').removeClass('t_2_fixer');$('.t_2_bottom').css({'height':'0'})}

    if($(this).scrollTop()>155){$('.dtl_fixer').css({'position':'fixed','z-index':'99','top':'55px'})}
    else{$('.dtl_fixer').css({'position':'static','z-index':'0','top':'auto'})}

    if($(this).scrollTop()>45){$('.reg_r').css({'position':'fixed','z-index':'99','top':'85px'})}
    else{$('.reg_r').css({'position':'static','z-index':'0','top':'auto'})}

})

$(".scroll").click(function(event){
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top-80}, 1000);
});

$("#back-top").hide();
$(function () {$(window).scroll(function () {if ($(this).scrollTop() > 100) {$('#back-top').fadeIn();} else {$('#back-top').fadeOut();}});
    $('#back-top a').click(function () {$('body,html').animate({scrollTop: 0}, 800);return false;});
});
// $('#detailDescriptionFa').keypress(function(e) {
//     var tval = $('#detailDescriptionFa').val(),
//         tlength = tval.length,
//         set = 1000,
//         remain = parseInt(set - tlength);
//     $('.detailDescriptionFa p.charlimit').text(remain);
//     if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
//         $('#detailDescriptionFa').val((tval).substring(0, tlength - 1));
//         return false;
//     }
// });
var detailDescriptionLength = 1000;
if ($("#detailDescription").length) {
    detailDescriptionLength =  detailDescriptionLength-($('#detailDescription').val().length);
    $('.detail_description p.charlimit').text(detailDescriptionLength)
}
$('#detailDescription').keyup(function(e) {
    var tval = $('#detailDescription').val(),
        tlength = tval.length,
        set = detailDescriptionLength,
        remain = parseInt(set - tlength);
    $('.detail_description p.charlimit').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#detailDescription').val((tval).substring(0, tlength - 1));
        return false;
    }
});
// $('#productsDescriptionFa').keypress(function(e) {
//     var tval = $('#productsDescriptionFa').val(),
//         tlength = tval.length,
//         set = 200,
//         remain = parseInt(set - tlength);
//     $('.short_descriptionFa p.charlimit').text(remain);
//     if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
//         $('#productsDescriptionFa').val((tval).substring(0, tlength - 1));
//         return false;
//     }
// });
var productsDescriptionLength = 40;
if ($("#productsDescription").length) {
    productsDescriptionLength =  productsDescriptionLength-($('#productsDescription').val().length);
    $('.short_description p.charlimit').text(productsDescriptionLength);

}
$('#productsDescription').keyup(function(e) {
    var tval = $('#productsDescription').val(),
        tlength = tval.length,
        set = productsDescriptionLength,
        remain = parseInt(set - tlength);
    $('.short_description p.charlimit').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#productsDescription').val((tval).substring(0, tlength - 1));
        return false;
    }
});
$('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).fadeIn(100).css('display','inline');
}, function() {
    $(this).find('.dropdown-menu').stop(true, true).fadeOut(100);
});
$(".fq li>a").bind("click", function() {$(this).next().slideToggle('fast')
    var src = ($('img',this).attr("src") ==="images/fq-b.png")
        ? "images/fq-r.png"
        : "images/fq-b.png";
    $('img',this).attr("src", src);
    $(this).toggleClass('act')
});
$(function(){
  $(".bodylead .textlead").each(function(i){
    len=$(this).text().length;
    if(len>80)
    {
      $(this).text($(this).text().substr(0,80)+'…');
    }
  });
});
