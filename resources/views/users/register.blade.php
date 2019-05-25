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
    <form action="{{route('checkRegister')}}" id="email_form" class="form-horizontal"
          method="post" enctype="multipart/form-data">

        <p class="textemail"><i class="icon-email"></i>{{__("messages.Enter your Email")}}</p>
        <p class="mt8">
            <span class="box">
                    <input id="country_selector" class="datatext p8 w40 radius-3 vam" type="text" name="country">
                    <label for="country_selector"
                           style="display:none;">{{__("messages.Select a country here...")}}</label>
                    <input type="text" name="email" placeholder="{{__("messages.Email")}}"
                           class="contentselect p8 w40 radius-3 vam"
                           id="contentselect">
            </span>
        <p class="textsafe"><i class="icon-check-circle">{{__("messages.Your email is safe with us")}}</i></p>
        <img src="/images/loading.gif" id="loding_email"  style="width: 30px;height: 30px;display: none"/>

        <input name="input" type="submit" id="submit" value="{{__("messages.Sign In")}}">
        <i class="icon-android-send"></i>
        <a style="display: none" href=""
           class="group2 sing_up_form" title="{{__("messages.Join Free")}}">
            {{__("messages.Join Free")}}
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
        preferredCountries: ['{{$countryCode}}']
    });
    $(document).ready(function () {

        $(".group2").colorbox({transition: "none", width: "auto", height: "auto"});

        sessionStorage.setItem("status", false);

        $("#email_form").submit(function (e) {

            if (!validateEmail($('#contentselect').val())) {
                toastr.error('{{__('messages.email  valid between 4 to 100 character')}}');
                return false;
            }
            toastr.clear();
            $(':input[type="submit"]').prop('disabled', true);
            $('#loding_email').show( );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formObj = $(this);
            var formURL = formObj.attr("action");
            var country = $('.flag').attr('class');
            country = country.replace("flag ", "");
            $.ajax({
                url: formURL,
                type: 'POST',
                data: $('#email_form').serialize()+'&country='+country,
                dataType: "json",

                success: function (response, textStatus, jqXHR) {
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

                        $('.sing_up_form').attr('href', "{{route('getInfo')}}" + response.data.send)
                        $('.sing_up_form').click();

                    }


                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data.responseText);
                   return false;

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
