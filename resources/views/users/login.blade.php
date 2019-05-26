<link rel="stylesheet" href="css/countrySelect.css">
<style>
    .row {
        float: right;
        width: 100%;
    }

    .label {
        float: left;
    }

    input.datatext {
        COLOR: #000000;
        height: 40px;
        position: relative;
        left: 3px;
        display: none;
    }

    input.contentselect {
        height: 40px;
        COLOR: #000000;
        padding-left: 45px;
        width: 280px;
    }
</style>
</head>
<div class="p10 pt5 pb0">
    <form action="{{route('email')}}" id="email_form" class="form-horizontal"
          method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div id="get_email">
        <p class="textemail"><i class="icon-email"></i>{{__("messages.Enter your Email")}}</p>
        <p class="mt8">
            <span class="box">
                    <input id="country_selector" class="datatext p8 w40 radius-3 vam" type="text">
                    <label for="country_selector"
                           style="display:none;">{{__("messages.Select a country here...")}}</label>
                    <input type="text" name="identity" placeholder="{{__("messages.Email")}}"
                           class="contentselect p8 w40 radius-3 vam"
                           id="contentselect">
            </span>
        <p class="textsafe"><i class="icon-check-circle">{{__("messages.Your email is safe with us")}}</i></p>

        <input name="input" type="button" id="submit" value="{{__("messages.Sign In")}}">
        <i class="icon-android-send"></i>

        </p>
        </div>
        <div id="get_pasword"  style="display: none">
            <p class="textemail"><i class="icon-email"></i>{{__('messages.Enter your Password')}}</p>
            <p class="mt8">
            <span class="box">
                    <input type="password" name="credential" placeholder="{{__("messages.Password")}} "
                           class="contentselect p8 w40 radius-3 vam" value="{{old('password')}}"
                           id="input_password"><a toggle="#password-field" id="checkPassword"><i class="icon-eye"></i></a>
            </span>
            <p class="textsafe">
                <label>
                    <input  type="checkbox" value="1"  checked name="remember_me" >
                    <span>{{__('messages.Keep Me Logged In')}})</span> </label>
            </p>
            <a  href="{{route('members.forgot_password')}}"
                class="group3 sing_up_form" title="{{__('messages.Forgot my password')}}">
                <p class="textsafe"><i class="icon-lock"></i>
                    {{__('messages.Forgot my password')}}
                </p>
            </a>
            <input name="input" type="submit" id="submit" value="{{__('messages.Login')}}">
            <i class="icon-android-send"></i>

            </p>
        </div>

    </form>
</div>
<!-- Load jQuery from CDN so can run demo immediately -->
<script src="js/countrySelect.min.js"></script>
<script type="text/javascript" src="/js/toastr.js"></script>

<script type="application/javascript">

    $("#country_selector").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['{{strtolower(app()->getLocale())}}']
    });
    $(document).ready(function () {

        $('#checkPassword').click(function(){
            var type = $('#input_password').attr('type');
            if(type== 'password'){
                $('#input_password').attr('type', 'text');
                $( "#checkPassword i" ).removeClass('icon-eye').addClass( "icon-eye-slash" );
            }else{
                $('#input_password').attr('type', 'password');
                $( "#checkPassword i" ).removeClass('icon-eye-slash').addClass( "icon-eye" );
            }
            // $(this).is(':checked') ? $('#input_password').attr('type', 'text') : $('#input_password').attr('type', 'password');
        });
        $(".group3").colorbox({transition: "none", width: "auto", height: "auto"});
        sessionStorage.setItem("status", false);
        $("#email_form").click(function (e) {
            if (!validateEmail($('#contentselect').val())) {
                toastr.error('{{__('messages.email  valid between 4 to 100 character')}}');
                return false;
            }
            $('#get_email').hide();
            $('#get_pasword').show();
        })
        $("#email_password_form").submit(function (e) {

            if (!validateEmail($('#contentselect').val())) {
                toastr.error('{{__('messages.email  valid between 4 to 100 character')}}');
                return false;
            }
            $(':input[type="submit"]').prop('disabled', true);
            $('#loding_email').show( );
            var formObj = $(this);
            var formURL = formObj.attr("action");
            var formData = new FormData(this);
            var username = $('#contentselect').val();

            $.ajax({
                url: formURL,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function (response, textStatus, jqXHR) {
                    console.log(response);
                    if (response.status == 'failed' ) {
                        var message = response.data;
                        if(message && (typeof message === 'object' || typeof message === 'Array') ) {

                            $.each(message, function (index, value) {
                                $.each(value, function (key, item) {
                                    toastr.error(item);

                                });

                            });
                        } else {
                            toastr.error(message);
                        }
                        $(':input[type="submit"]').prop('disabled', false);
                        $('#loding_email').hide( );
                    }
                    if (response.status=='success') {

                        toastr.success(response.data.message);
                        $(".ajax").colorbox.close();
                        window.location = "members/myAccount";

                    }

                    {{--if (response.Successful == 'register'  || data.Successful == 'password') {--}}
                    {{--    // $('.sing_up_form').show();--}}
                    {{--    $('.sing_up_form').attr('href', "{{route('getInfo')}}" + username)--}}
                    {{--    $('.sing_up_form').click();--}}
                    {{--} else if (data.status == 'login') {--}}

                    {{--    toastr.success(data.Successful);--}}
                    {{--    $(".ajax").colorbox.close();--}}
                    {{--    window.location = "members/myAccount";--}}

                    {{--} else if (data.status == 'email_not_accept') {--}}
                    {{--    $(':input[type="submit"]').prop('disabled', false);--}}
                    {{--    $('#loding_email').hide( );--}}

                    {{--    toastr.error(data.error);--}}

                    {{--    return false;--}}

                    {{--} else if (data.Successful) {--}}
                    {{--    $(':input[type="submit"]').prop('disabled', false);--}}
                    {{--    $('#loding_email').hide( );--}}

                    {{--    return false;--}}

                    {{--} else {--}}

                    {{--    toastr.error(data.error);--}}
                    {{--    $(':input[type="submit"]').prop('disabled', false);--}}
                    {{--    $('#loding_email').hide( );--}}

                    {{--    return false;--}}
                    {{--}--}}

                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data.responseText);
                    data = JSON.parse(data.responseText);

                    console.log(textStatus);
                    $(':input[type="submit"]').prop('disabled', false);
                    if (typeof data.error === 'array') {
                        $.each(data.error, function( index, value ) {
                            $.each(value, function( index1, value1 ) {
                                toastr.error(value1);
                            });

                            // alert( index + ": " + value );
                        });
                    }else if(typeof data.error === 'string') {
                        toastr.error(data.error);
                    }else{
                        toastr.error('{{__('messages.can not register')}}');
                    }

                }
            });
            e.preventDefault(); //Prevent Default action.

        });

        function validateEmail(email) {
            var re = /^(?=[^@]{4,}@)([\w\.-]*[a-zA-Z0-9_]@(?=.{4,}\.[^.]*$)[\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z])$/;
            return re.test(email.toLowerCase());
        }

    })


</script>
