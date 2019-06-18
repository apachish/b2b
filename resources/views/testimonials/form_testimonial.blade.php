<div class="sendboxtestmonial">
    <form class="changpass " id="testimonialForm"  action="{{route('testimonials.store')}}">
        <fieldset>
            <p class="title">{{__('messages.Post Your')}} </p>
            <h2 class="title2">{{__('messages.Testimonial')}} </h2>
            <p class="mt7">
                <input class="inouttyeptext form-control" title="{{__('messages.posterName')}} " name="poster_name" id="poster_name" type="text" placeholder="{{__('messages.Full Name')}} *">
            </p>
            <p class="mt7">
                <input class="inouttyeptext form-control" name="email" id="email" type="email" placeholder="{{__('messages.Email')}} *">
            </p>
            <p class="mt7">
                <input class="inouttyeptext form-control" name="company" title="{{__('messages.company')}}" id="company" type="text" placeholder="{{__('messages.Company')}} *">
            </p>
            <p class="mt7">
                                        <textarea class="form-control inouttyeptext" title="{{__('messages.testimonialDescription')}}" name="description" id="description" class="db"
                                                  cols="45" rows="7" placeholder="{{ __("messages.Testimonials") }} *"
                                                  style="height:132px"></textarea>
            </p>
            <p class="mt7">
                <input name="verification_code_testimonial" id="verification_code_testimonial" type="text" autocomplete="off"
                       placeholder="{{ __("messages.Enter the security code") }} *"
                       class="inouttyeptext captcha" style="width:150px">

            <p class="mt7">
                <img src="{{ captcha_src('flat')}}"
                     class="vam reCaptcha-img" alt="" id="captchaimage_request"/>
                <a href="javascript:false;" title="Change Verification Code">
                    <img src="/images/ref2.png"
                         alt="Refresh"
                         onclick="document.getElementById('verification_code_testimonial').value=''; document.getElementById('verification_code_testimonial').focus(); return true;"
                         width="24" height="23" class="reCaptcha vam ml5">
                </a>
            </p>
            </p>
            <div class="form-group row">
                <div class="col-sm-9">
                    <img src="/images/loading.gif" id="loding_Testimonial"  style="width: 30px;height: 30px;display: none"/>

                    <input name="send" type="submit" class="btn btn-primary" id="button_Testimonial" value="{{__('messages.Post Testimonial')}}">
                </div>
            </div>
        </fieldset>
    </form>
</div>
<script>
    $(document).ready(function(){

        $("#testimonialForm").submit(function(e)
        {
            var postData = $(this).serialize();
            var formURL = $(this).attr("action");
            $('#loding_Testimonial').show( );
            $('#button_Testimonial').hide( );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: formURL,
                type: 'POST',
                data:  postData,
                success: function(response, textStatus, jqXHR)
                {

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
                        $('#testimonialForm').find('input').val('');
                        $('#testimonialForm').find('textarea').val('');
                        $('#loding_Testimonial').hide( );
                        $('#button_Testimonial').show( );

                    }
                    $('.reCaptcha-img').attr('src',response.data.captcha);

                    document.getElementById('verification_code_testimonial').value='';
                    document.getElementById('verification_code_testimonial').focus();
                    $('#button_Testimonial').show( );
                    $('#loding_Testimonial').hide();

                    return true;

                },
                error: function(data,jqXHR, textStatus, errorThrown)
                {
                    console.log(data.responseText);
                    $('#button_Testimonial').show( );
                    $('#loding_Testimonial').hide( );

                    $('.reCaptcha-img').attr('src',response.data.captcha);
                    document.getElementById('verification_code_testimonial').value='';
                    document.getElementById('verification_code_testimonial').focus();
                    return true;
                }
            });
            e.preventDefault(); //Prevent Default action.
        });
    })
</script>
