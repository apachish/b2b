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
    <form action="{{route('userStore')}}" id="email_form" class="form-horizontal"
          method="post" enctype="multipart/form-data">
{{--        @if (is_array($error)):--}}
{{--            @foreach ($error as $err):--}}
{{--                <p class="mt8 red">{{$err}}</p>--}}
{{--            @endforeach;--}}
{{--        @else:--}}
{{--            <p class="mt8 red">' . $error . '</p>--}}
{{--        @endif;--}}
        <p class="textemail"><i class="icon-email"></i>{{__("Enter your Email")}}</p>
        <p class="mt8">
            <span class="box">
                    <input id="country_selector" class="datatext p8 w40 radius-3 vam" type="text">
                    <label for="country_selector"
                           style="display:none;">{{__("Select a country here...")}}</label>
                    <input type="text" name="identity" placeholder="{{__("Email")}}"
                           class="contentselect p8 w40 radius-3 vam"
                           id="contentselect">
            </span>
        <p class="textsafe"><i class="icon-check-circle">{{__("Your email is safe with us")}}</i></p>
        <img src="/images/loading.gif" id="loding_email"  style="width: 30px;height: 30px;display: none"/>

        <input name="input" type="submit" id="submit" value="{{__("Sign In")}}">
        <i class="icon-android-send"></i>
        <a style="display: none" href=""
           class="group2 sing_up_form" title="">
            {{__("Join Free")}}
        </a>
        </p>
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

        $(".group2").colorbox({transition: "none", width: "auto", height: "auto"});

        sessionStorage.setItem("status", false);

        $("#email_form").submit(function (e) {

            if (!validateEmail($('#contentselect').val())) {
                toastr.error('{{__('email  valid between 4 to 100 character')}}');
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
                success: function (data, textStatus, jqXHR) {
                    console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    if (data.Successful == 'register'  || data.Successful == 'password') {
                        // $('.sing_up_form').show();
                        $('.sing_up_form').attr('href', "{{route('getInfo')}}" + username)
                        $('.sing_up_form').click();
                    } else if (data.status == 'login') {

                        toastr.success(data.Successful);
                        $(".ajax").colorbox.close();
                        window.location = "members/myAccount";

                    } else if (data.status == 'email_not_accept') {
                        $(':input[type="submit"]').prop('disabled', false);
                        $('#loding_email').hide( );

                        toastr.error(data.error);

                        return false;

                    } else if (data.Successful) {
                        $(':input[type="submit"]').prop('disabled', false);
                        $('#loding_email').hide( );

                        return false;

                    } else {

                        toastr.error(data.error);
                        $(':input[type="submit"]').prop('disabled', false);
                        $('#loding_email').hide( );

                        return false;
                    }

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
                        toastr.error('{{__('can not register')}}');
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
