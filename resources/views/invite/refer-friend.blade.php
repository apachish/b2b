<div class="page-content-wrap">
    <form action="{{ route("refer-friend.send") }}" id="referForm" class="form-horizontal" method="post"
          enctype="multipart/form-data">
        @include('invite.error')
        <div class="p10 pt5 pb0">
            <h2 class="b">{{__("messages.Refer Friend")}}</h2>
            <p class="mt8">
                <input name="nameInvite" id="name" type="text" placeholder="{{__("messages.Your Name")}} *" class="p8 w100 radius-3" value="">
            </p>
            <p class="mt8">
                <input name="emailInvite" id="email" type="text" placeholder="{{__("messages.Your Email ID")}} *" class="p8 w100 radius-3"  value="">
            </p>

            <p class="mt8">
                <input name="nameRefer" id="name2" type="text" placeholder="{{__("messages.Your Friend's Name")}} *" class="p8 w100 radius-3"  value="">
            </p>
            <p class="mt8">
                <input name="emailRefer" id="email2" type="text" placeholder="{{__("messages.Your Friend's Email ID")}} *" class="p8 w100 radius-3"  value="">
                <input name="text" id="text_refer" type="hidden"   value="{{$text}}">
                <input name="link" id="link_refer" type="hidden"  value="{{$link}}">
            </p>

            <p class="mt8">
            </p>
            <p class="mt8">
                <input name="captcha_request" id="verification_code_request" type="text"
                       title="{{__('messages.verification_code')}}"
                       placeholder="{{__("messages.Enter the security code") }}"
                       class="inouttyeptext w30 p4 radius-3 vam">
                <img src="{{ captcha_src('flat')}}"
                     class="vam reCaptcha-img" alt="" id="captchaimage_request"/>
                <a href="javascript:false;" title="Change Verification Code">
                    <img src="/images/ref.png"
                         alt="Refresh"
                         onclick="document.getElementById('verification_code_request').value=''; document.getElementById('verification_code_request').focus(); return true;"
                         width="24" height="23" class="reCaptcha vam ml5">
                </a>
            </p>
            <div class="cb"></div>
            <p class="mt-lg-2 " style="float: left">
                <input name="input" type="submit" value="{{__("messages.Submit")}}" class="btn1 trans_eff radius-3 mb5">
            </p>
        </div>    </form>
</div>
<script>
    $(document).ready(function () {

        $("#referForm").submit(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formObj = $(this);
            var formURL = formObj.attr("action");
            $.ajax({
                type: "POST",
                url: formURL ,
                dataType: "json",
                data: $('#referForm').serialize(),

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
    });

</script>