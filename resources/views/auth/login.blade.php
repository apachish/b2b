@extends('layouts.main')

@section('content')
    <div class="loginbody">
        <section class="loginwrapper">
            <div class="container">
                <div class="col-lg-6 col-xs-12 col-sm-6">
                    <form id="signin-form" class="form_shown" method="post" action="{{ route('login') }}"
                          novalidate="novalidate">
                        <div class="logindiv">
                            @csrf


                            <h3>{{__('Login')}}</h3>
                            <p>
                                <input placeholder="{{__('Email ID')}} *" id="identity" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </p>
                            <p>
                                <input placeholder="{{__('Password')}} *" id="credential" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <a toggle="#password-field" id="checkcredential"><i class="icon-eye"></i></a>
                            </p>

                            <p class="remember">
                                <label>
                                    {{--                                <input  type="checkbox" value="1"  checked name="remember_me" >--}}
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        {{ __('Remember Me') }}</label>
                                <input type="hidden" name="locale" value="{{app()->getLocale()}}">
                            </p>
                            <p class="btnlogin1">
                                <input name="submit" type="submit" value="{{__('Login')}}"
                                       class="btn btn-dark mybtn trans_eff">
                            </p>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        @endif
                        <!--                <p class="forget"><a href="-->
                            <!--" class="uu forgot" title="Forgot Password?">Forgot Password?</a></p>-->
                            <!--                <p class="orp"><b class="bg-white dib pl5 pr5">OR</b></p>-->
                            <!--                <p class="btnlogin">-->
                            <!--                    <input name="" type="button" value="Create New Account" class="btn btn-primary mybtn2 trans_eff" onClick="window.location.href=('')">-->
                            <!--                </p>-->
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-xs-12 col-sm-6"><img class="fl" src="/images/syr.gif" alt=""></div>

            </div>
        </section>
    </div>
    <script type="text/javascript" src="js/script.js">
    </script>
    <script>
        $(document).ready(function () {
            $('#checkcredential').click(function () {
                var type = $('#credential').attr('type');
                if (type == 'password') {
                    $('#credential').attr('type', 'text');
                    $("#checkcredential i").removeClass('icon-eye').addClass("icon-eye-slash");
                } else {
                    $('#credential').attr('type', 'password');
                    $("#checkcredential i").removeClass('icon-eye-slash').addClass("icon-eye");
                }
                // $(this).is(':checked') ? $('#input_password').attr('type', 'text') : $('#input_password').attr('type', 'password');
            });
        });
    </script>

@endsection


