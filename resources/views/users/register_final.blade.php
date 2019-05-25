<link rel="stylesheet" href="css/countrySelect.css">
<style>
    .select2-close-mask {
        z-index: 10000;
    }
    .select2-dropdown {
        z-index: 10001;
    }
</style>
<div class="registerpoup">
    <h2><i class="icon-person-add"></i>{{__("messages.Hi , you are just a step away !")}}</h2>
    <form action="{{route('users.store')}}" id="registerForm" class="form-horizontal" method="post"
          enctype="multipart/form-data">
        <input name="email" id="email" type="hidden"  class="p8 w60 radius-3" value="{{$email}}">
        <input name="country_id" id="country" type="hidden"  class="p8 w60 radius-3" value="{{$country->id}}">
        <div class="col-md-6 col-xs-12">
            <input name="first_name" id="firstName" type="text" placeholder="{{__("messages.Your FirstName")}} *" class="p8 w30 radius-3" value="">
        </div>
        <div class="col-md-6 col-xs-12">
            <input name="last_name" id="lastName" type="text" placeholder="{{__("messages.Your LastName")}} *" class="p8 w30 radius-3" value="">
        </div>
        <div class="col-md-6 col-xs-12">
            <input id="country_selector" readonly class="datatext p8 w10 radius-3 vam" type="text" value="{{$country->getName()}}">
        </div>
        <div class="col-md-6 col-xs-12">
            <select name="state_id" id="state"  class="p8 w60 radius-3">
                <option value="">----{{__("messages.SELECT States")}}---</option>
                @foreach ($states as $state)
                    <option {{ $city==$state->id?"selected":""}} value="{{$state->id}}">{{$state->getName()}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-xs-12">
            <input type="text" name="telephone" readonly placeholder="{{__("messages.Telephone")}}" value="{{$country->code}}" class="contentselect p8 w23 radius-3 vam" id="contentselect">
            <input type="text" name="mobile" placeholder="{{__("messages.Mobile")}}" class="telephoneselect p8 w60 radius-3 vam" id="contentselect">

        </div>

        <div class="col-md-6 col-xs-12">
            <select name="category_id" id="category"  class="p8 w60 radius-3 ">
                <option value="">----{{__("messages.SELECT Category")}}---</option>
                @foreach ($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->getCategoryTitle()}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-xs-12">
            <input name="input" type="submit" value="{{__("messages.Register")}}" id="submit" class="btn1 trans_eff radius-3 mb5">
        </div>

    </form>
</div>

<!-- Load jQuery from CDN so can run demo immediately -->
<script src="/js/countrySelect.min.js"></script>

<script>
    textfield = document.getElementById("datatext");
    contentselect = document.getElementById("contentselect");

    contentselect.onchange = function () {
        var text = contentselect.options[contentselect.selectedIndex].value
        if (text != "") {
            textfield.value += text;
        }
    };
    $("#country_selector").countrySelect({
        //defaultCountry: "jp",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        preferredCountries: ['{{app()->getLocale()}}']
    });
    $(document).ready(function () {
        sessionStorage.setItem("status",false);
        var $select2= $('#category').select2({
            placeholder: "{{__("messages.SELECT Category")}}",
            width: '70%',
            allowClear: true,
            data: [],
        })
        $("#registerForm").submit(function(e)
        {
            $(':input[type="submit"]').prop('disabled', true);
            var formObj = $(this);
            var formURL = formObj.attr("action");
            var formData = new FormData(this);
            $.ajax({
                url: formURL,
                type: 'POST',
                data:  formData,
                mimeType:"multipart/form-data",
                contentType: false,
                cache: false,
                processData:false,
                success: function(response, textStatus, jqXHR)
                {
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
                        return false;
                    }
                    if (response.status=='success') {
                        toastr.success(response.data.message);
                        $.colorbox.close();
                        return true;

                    }

                },
                error: function(data, textStatus, errorThrown)
                {
                    console.log(data.responseText);
                    return false;

                }
            });
            e.preventDefault(); //Prevent Default action.

        });

    })
</script>
