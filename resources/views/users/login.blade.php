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
    <form action="{{route('popup-login')}}" id="email_password_form" class="form-horizontal"
          method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div id="get_email">
        <p class="textemail"><i class="icon-email"></i>{{__("messages.Enter your Email")}}</p>
        <p class="mt8">
            <span class="box">
                    <input id="country_selector" class="datatext p8 w40 radius-3 vam" type="text">
                    <label for="country_selector"
                           style="display:none;">{{__("messages.Select a country here...")}}</label>
                    <input type="email" name="email" placeholder="{{__("messages.Email")}}"
                           value="{{$email}}"
                           class="contentselect p8 w40 radius-3 vam"
                           id="contentselect">
            </span>
        <p class="textsafe"><i class="icon-check-circle">{{__("messages.Your email is safe with us")}}</i></p>

            <a id="click_email">
        <input name="input" type="button" id="submit"   value="{{__("messages.Sign In")}}">
        <i class="icon-android-send"></i></a>

        </p>
        </div>
        <div id="get_password"  style="display: none">
            <p class="textemail"><i class="icon-email"></i>{{__('messages.Enter your Password')}}</p>
            <p class="mt8">
            <span class="box">
                    <input type="password" name="password" placeholder="{{__("messages.Password")}} "
                           class="contentselect p8 w40 radius-3 vam" value="{{$password}}"
                           id="input_password"><a toggle="#password-field" id="checkPassword"><i class="icon-eye"></i></a>
            </span>
            <p class="textsafe">
                <label>
                    <input  type="checkbox" value="1"  checked name="remember_me" >
                    <span>{{__('messages.Keep Me Logged In')}})</span> </label>
            </p>
            <a  href="{{route('forgot.password')}}"
                class="group3 sing_up_form" title="{{__('messages.Forgot my password')}}">
                <p class="textsafe"><i class="icon-lock"></i>
                    {{__('messages.Forgot my password')}}
                </p>
            </a>
            <input name="input" type="submit" id="submit" value="{{__('messages.Sign In')}}">
            <i class="icon-android-send"></i>
            <img src="/images/loading.gif" id="loding_email"  style="width: 30px;height: 30px;display: none"/>

            </p>
        </div>

    </form>
</div>
<!-- Load jQuery from CDN so can run demo immediately -->
<script src="js/countrySelect.min.js"></script>
<script type="text/javascript" src="/js/toastr.js"></script>

<script type="application/javascript">

    $("#country_selector").countrySelect({
        defaultCountry: "ir",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ["{{$countryCode}}"]
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
        $("#click_email").click(function (e) {
            if (!validateEmail($('#contentselect').val())) {
                toastr.error('{{__('messages.email  valid between 4 to 100 character')}}');
                return false;
            }
            $('#get_email').hide();
            $('#get_password').show();
        })
        $("#email_password_form").submit(function (e) {


            $(':input[type="submit"]').prop('disabled', true);
            $('#loding_email').show( );

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formObj = $(this);
            var formURL = formObj.attr("action");
            $.ajax({
                url: formURL,
                type: 'POST',
                data: $('#email_password_form').serialize(),
                dataType: "json",
                success: function (response, textStatus, jqXHR) {
                    window.location = "members/my-account";


                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data.responseText);
                    data = JSON.parse(data.responseText);
                    var message = data.errors;
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
