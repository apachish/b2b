<div class="page-content-wrap">
    <p class="title-newsletter">{{ __("messages.NEWSLETTER") }}</p>
    <p class="des-newsletter">{{ __("messages.Enter your email address to sign up for our special offers and product promotions") }}</p>
    <div class="newletterform">
        <form id="newletterform_popup" action="{{route('newsLetter') }}" method="post">
            <p class="mt8">
                <input name="letter[subscriberName]" type="text" class="textbox-newsletter"
                       placeholder="{{ __("messages.FullName") }}">
            </p>

            <p class="mt8">

                <input name="letter[subscriberEmail]" type="text" class="textbox-newsletter" id="letter_email_popup"
                       placeholder="{{ __("messages.Email Address") }}">
            </p>
            <p class="mt8">
            </p>
            <p class="mt8">

                <input name="letter[verification_code_newsletter]" id="verification_code_popup" type="text"
                       placeholder="{{ __("messages.Enter the security code") }}" class="textbox-newsletter captcha">
                <img src="{{captcha_src('flat')}}"
                     class="vam ml10 reCaptcha-img" alt="" id="captchaimage"/>
                <a href="javascript:false;" title="Change Verification Code">
                    <img src="/images/ref2.png"
                         alt="Refresh"
                         onclick=" document.getElementById('verification_code_newsletter').value=''; document.getElementById('verification_code_newsletter').focus(); return true;"
                         class="vam ml5 reCaptcha">
                </a>
            </p>
            <p class="mt-lg-2 " style="float: left">
                <button type="submit" value=1
                        class="btn1 trans_eff radius-3 mb5 btn-letter">{{__("messages.Subscribe")}}</button>
                <button type="submit" value=0
                        class="btn1 trans_eff radius-3 mb5 btn-letter btn-unsub">{{__("messages.Unsubscribe")}}</button>
            </p>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        var ButtonValue;

        $('.btn-letter').click(function (e) {
            ButtonValue = $(this).val();
        });
        $("#newletterform_popup").submit(function (e) {
            var formObj = $(this);
            var formURL = formObj.attr("action");
            var formData = new FormData(this);
            formData.append('letter[status]', ButtonValue);
            var email = $('#letter_email_popup').val();
            if (email == '' || email == 'Enter Your Email ID') {
                toastr.error('{{__('messages.Enter Email')}}');
                return false;
            }
            if ((email.length) > 80) {
                toastr.error('{{__('messages.Email can not be greater than 80 charectors')}}');
                return false;
            }
            if (!isEmailAddr(email)) {
                toastr.error('{{__('messages.Please Enter Valid  Emailid')}}');
                $('#letter_email').focus();
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
                    document.getElementById('captchaimage_popup').src = 'captcha/normal/' + Math.random() + '/ffffff/36b3d1';
                    document.getElementById('verification_code_popup').value = '';
                    document.getElementById('verification_code_popup').focus();
                    if (data.status == 400 && data.error == "The code entered is incorrect") {

                        toastr.error(data.error);
                    }
                    if (data.status == 200) {

                        toastr.success(data.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
            e.preventDefault(); //Prevent Default action.
        });
        $(".english_input").keypress(function (event) {
            var ew = event.which;
            if (ew == 32)
                return true;
            if (48 <= ew && ew <= 57)
                return true;
            if (65 <= ew && ew <= 90)
                return true;
            if (97 <= ew && ew <= 122)
                return true;
            return false;
        });

        function join_newsletter_validation(obj) {

            /*if(obj.subscriber_name.value=='' || obj.subscriber_name.value=='Enter Your Name'){

                alert('Enter Name');
                return false;

            }
            if((obj.subscriber_name.value.length)>32){

                alert('Name can not be greater than 30 charectors');
                return false;
            }*/
            if (obj.subscriber_email.value == '' || obj.subscriber_email.value == 'Enter Your Email ID') {

                alert('Enter Email');
                return false;

            }
            if ((obj.subscriber_email.value.length) > 80) {

                alert('{{__('messages.Email can not be greater than 80 charectors')}}');
                return false;
            }
            if (!isEmailAddr(obj.subscriber_email.value)) {
                alert('{{__("messages.Please Enter Valid  Emailid")}}');
                obj.subscriber_email.focus();
                return false;

            }

        }

        function isEmailAddr(email) {
            var regExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regExp.test(email);
        }

        // $('.toltip-category').hover(function () {
        //     var image = $(this).attr('data-toltip');
        //    //$(".toltip-category").tooltip({ content: '<img src="'+image+'" />' });
        //  $('a.tooltip:hover span').css('background-image', 'url('+image+')');
        //
        // })
        //$('a.tooltip:hover span').css('background-image', 'url('+image+')');

    });
</script>