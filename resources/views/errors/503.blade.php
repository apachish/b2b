
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="503/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="503/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="503/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="503/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="503/css/util.css">
    <link rel="stylesheet" type="text/css" href="503/css/main.css">
    <!--===============================================================================================-->



<div class="bg-img1 size1 overlay1" style="background-image: url('503/images/bg01.jpg');">
    <div class="size1 p-l-15 p-r-15 p-t-30 p-b-50">
        <div class="flex-w flex-sb-m p-l-75 p-r-60 p-b-165 respon1">
            <div class="wrappic1 m-r-30 m-t-10 m-b-10">
                <a href="#"><img src="images/logo.png" alt="LOGO"></a>
            </div>

            <div class="flex-w m-t-10 m-b-10">
                <a href="#" class="size4 flex-c-m how-social trans-04 m-r-5 m-b-3 m-t-3">
                    <i class="fa fa-facebook"></i>
                </a>

                <a href="#" class="size4 flex-c-m how-social trans-04 m-r-5 m-b-3 m-t-3">
                    <i class="fa fa-twitter"></i>
                </a>

                <a href="#" class="size4 flex-c-m how-social trans-04 m-r-5 m-b-3 m-t-3">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </div>
        </div>

        <div class="wsize1 m-lr-auto">
            <p class="txt-center l1-txt1 p-b-60">

                <span class="l1-txt2">{{ __($exception->getMessage() ?: 'Service Unavailable')}}
</span>
            </p>

        </div>

        <div class="flex-w flex-c-m cd100 wsize1 m-lr-auto p-t-16">
            <div class="flex-col-c-m size2 bor1 m-l-6 m-r-6 m-b-15">
                <span class="l1-txt3 p-b-6 days">3</span>
                <span class="s1-txt2">Days</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
                <span class="l1-txt3 p-b-6 hours">10</span>
                <span class="s1-txt2">Hours</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
                <span class="l1-txt3 p-b-6 minutes">50</span>
                <span class="s1-txt2">Minutes</span>
            </div>

            <div class="flex-col-c-m size2 bor1 m-l-10 m-r-10 m-b-15">
                <span class="l1-txt3 p-b-6 seconds">39</span>
                <span class="s1-txt2">Seconds</span>
            </div>
        </div>

    </div>
</div>





<!--===============================================================================================-->
<script src="503/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="503/vendor/bootstrap/js/popper.js"></script>
<script src="503/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="503/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="503/vendor/countdowntime/moment.min.js"></script>
<script src="503/vendor/countdowntime/moment-timezone.min.js"></script>
<script src="503/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
<script src="503/vendor/countdowntime/countdowntime.js"></script>
<script>
    $('.cd100').countdown100({
        /*Set Endtime here*/
        /*Endtime must be > current time*/
        endtimeYear: 2019,
        endtimeMonth: 4,
        endtimeDate: 9,
        endtimeHours: 18,
        endtimeMinutes: 0,
        endtimeSeconds: 0,
        timeZone: ""
        // ex:  timeZone: "America/New_York"
        //go to " http://momentjs.com/timezone/ " to get timezone
    });
</script>
<!--===============================================================================================-->
<script src="503/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="503/js/main.js"></script>

