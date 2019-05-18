<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'B2B') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/admin/jquery.magnific-popup.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/jquery/jquery.min.js') }}" defer></script>--}}

{{--    --}}{{--    <script src="{{ asset('js/admin/persian-date.min.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/persian-datepicker.js') }}" defer></script>--}}
{{--    <script src="{{ asset('/select2/select2.min.js') }}" defer></script>--}}
{{--    <script src="{{ asset('/js/toastr.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/bootstrap/bootstrap.min.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/jquery/jquery-ui.min.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/layout_admin.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/noty/jquery.noty.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/noty/layouts/topCenter.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/noty/layouts/topLeft.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/noty/layouts/topRight.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/plugins/noty/themes/default.js') }}" defer></script>--}}
{{--    <script src="{{ asset('js/admin/app.js') }}" defer></script>--}}

<!-- Fonts -->
    {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    {{--    <!-- Styles -->--}}
    {{--    <link href="{{ asset('css/admin/theme-default.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/admin/pnotify.custom.min.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('/select2/select2.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/admin/persian-datepicker.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/admin/magnific-popup.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" id="theme" href="/css/admin/theme-default.css"/>
    <link rel="stylesheet" type="text/css" id="theme" href="/css/toastr.css"/>
    @yield('css')

</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

{{--    <!-- START PAGE SIDEBAR -->--}}
{{--    <div class="page-sidebar">--}}
{{--        <!-- START X-NAVIGATION -->--}}
{{--        <ul class="x-navigation">--}}
{{--            <li class="xn-logo">--}}
{{--                <a href="index.html">{{auth()->user()->name}} </a>--}}
{{--                <a href="#" class="x-navigation-control"></a>--}}
{{--            </li>--}}
{{--            <li class="xn-profile">--}}
{{--                <a href="#" class="profile-mini">--}}
{{--                    <img src="{{asset('images/users/avatar.jpg')}}"--}}
{{--                         alt="{{auth()->user()->name}}"/>--}}
{{--                </a>--}}
{{--                <div class="profile">--}}
{{--                    <div class="profile-image">--}}
{{--                        <img src="{{asset('images/users/avatar.jpg')}}"--}}
{{--                             alt="{{auth()->user()->name}}"/>--}}
{{--                    </div>--}}
{{--                    <div class="profile-data">--}}
{{--                        <div class="profile-data-name">{{auth()->user()->name}}</div>--}}
{{--                        <div class="profile-data-title">{{auth()->user()->role}}</div>--}}
{{--                    </div>--}}
{{--                    <div class="profile-controls">--}}
{{--                        <a href="{{route('adminProfile')}}" class="profile-control-left"><span--}}
{{--                                    class="fa fa-info"></span></a>--}}
{{--                        <a href="{{route('adminMessage')}}" class="profile-control-right"><span--}}
{{--                                    class="fa fa-envelope"></span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            {!! $MyNavBar->asUl() !!}--}}

{{--        </ul>--}}
{{--        <!-- END X-NAVIGATION -->--}}
{{--    </div>--}}
<!-- END PAGE SIDEBAR -->
@include('admin.layouts._left_menu')

<!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <!-- END TOGGLE NAVIGATION -->
            <!-- SEARCH -->
            <!--      <li class="xn-search">-->
            <!--        <form role="form">-->
            <!--          <input type="text" name="search" placeholder="Search..."/>-->
            <!--        </form>-->
            <!--      </li>-->
            <!-- END SEARCH -->
            <!-- SIGN OUT -->
            <li class="xn-icon-button pull-right">
                <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
            </li>
            <!-- END SIGN OUT -->
            <!-- MESSAGES -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-info {{$Count_notification_product_enquiry?"blink":""}}">{{$Count_notification_product_enquiry}} </div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> {{__("messages.Messages For Request Lead")}}
                        </h3>
                        <div class="pull-right">
                        <span class="label label-danger {{$Count_notification_product_enquiry?"blink":""}} ">
                            {{$Count_notification_product_enquiry}} {{__("messages.new")}}
                        </span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                        @foreach ($notification_product_enquiry as $notification):
                        <a href="{{url('admin/request')."?id=".$notification->idItem."&id_notification=".$notification->id}}"
                           class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <span class="contacts-title">{{$notification->title}}</span>
                            <p>{{$notification->description}}</p>
                            <small class="text-muted">{{$notification->createdAt()}}</small>
                        </a>
                        @endforeach
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{url('admin/request')}}">{{__("messages.Show all Request")}}</a>
                    </div>
                </div>
            </li>
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-info {{$Count_notification_enquiry?"blink":""}}">
                    {{$Count_notification_enquiry}}
                </div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span>
                            {{__("messages.Messages For Request Bug/Question")}}</h3>
                        <div class="pull-right">
                        <span class="label label-danger {{$Count_notification_enquiry?"blink":""}} ">
                            {{$Count_notification_enquiry}}{{__("messages.new")}}
                        </span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                        @foreach ($notification_enquiry as $notification):
                        <a href="{{url("admin/enquiry")."?id=".$notification->idItem."&id_notification=".$notification->id}}"
                           class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="{{asset("images/users/user2.jpg")}}" class="pull-left"
                                 alt="John Doe"/>
                            <span class="contacts-title">{{$notification->title}}</span>
                            <p>{{$notification->description}}</p>
                            <small class="text-muted">{{$notification->createdAt}}</small>
                        </a>
                        @endforeach
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{url("admin/enquiry")}}">{{__("messages.Show all Request Bug and Question")}}</a>
                    </div>
                </div>
            </li>
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-comments"></span></a>
                <div class="informer informer-info {{$Count_notification_requestCall?"blink":""}}">
                    {{$Count_notification_requestCall}}
                </div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span
                                    class="fa fa-comments"></span> {{__("messages.Messages For Request Calls")}}</h3>
                        <div class="pull-right">
                        <span class="label label-danger {{$Count_notification_requestCall?"blink":""}} ">
                            {{$Count_notification_requestCall}} {{__("messages.new")}}
                        </span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                        @foreach ($notification_requestCall as $notification):
                        <a href="{{url("admin/enquiry-request_call")."?id=".$notification->idItem."&id_notification=".$notification->id}}"
                           class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="{{asset("images/users/user2.jpg")}}" class="pull-left"
                                 alt="John Doe"/>
                            <span class="contacts-title">{{$notification->title}}</span>
                            <p>{{$notification->description}}</p>

                            <small class="text-muted">{{$notification->createdAt}}</small>
                        </a>
                        @endforeach
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{url("admin/enquiry-request_call")}}">{{__("messages.Show all Request Calls")}}</a>
                    </div>
                </div>
            </li>
            <!-- END MESSAGES -->
            <!-- TASKS -->
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-tasks"></span></a>
                <div class="informer informer-warning {{$Count_notification_product?"blink":""}}">
                    {{$Count_notification_product}}
                </div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <div class="pull-right">
                        <span class="label label-warning">
                            {{$Count_notification_product?"blink":""}} {{__("messages.New")}}
                        </span>
                        </div>
                        <h3 class="panel-title"><span class="fa fa-tasks"></span>{{__("messages.Leads") }}</h3>

                    </div>
                    <div class="panel-body list-group scroll" style="height: 200px;">

                        @foreach ($notification_product as $notification):
                        <a class="list-group-item"
                           href="{{url('admin/products')."?id=".$notification->idItem."&id_notification=".$notification->id}}">
                            <p style="text-align: right"><strong>{{$notification->title}}</strong></p>
                            <p style="text-align: right">{{$notification->description}}</p>
                            <small class="text-muted">{{$notification->createdAt}}</small>
                        </a>
                        @endforeach
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{url('admin/products')}}">{{__("messages.Show all Lead")}}</a>
                    </div>
                </div>
            </li>
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-image"></span></a>
                <div class="informer informer-info {{$Count_notification_banner?"blink":""}}">
                    {{$Count_notification_banner}}
                </div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> {{__("messages.Messages for advertise")}}
                        </h3>
                        <div class="pull-right">
                        <span class="label label-danger {{$Count_notification_banner?"blink":""}} ">
                            {{$Count_notification_banner}} {{__("messages.new")}}
                        </span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                        @foreach ($notification_banner as $notification){?>
                        <a href="{{url('admin/advertise')."?id=".$notification->idItem."&id_notification=".$notification->id}}"
                           class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="{{asset("images/users/user2.jpg")}}" class="pull-left"
                                 alt="John Doe"/>
                            <span class="contacts-title">{{$notification->title}}</span>
                            <p>{{$notification->description}}</p>
                            <small class="text-muted">{{$notification->createdAt}}</small>
                        </a>
                        @endforeach
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{url('admin/advertise')}}">{{__("messages.Show all Advertise")}}</a>
                    </div>
                </div>
            </li>
            <li class="xn-icon-button pull-right">
                <a href="#"><span class="fa fa-user"></span></a>
                <div class="informer informer-info {{$Count_notification_user?"blink":""}}">
                    {{$Count_notification_user}}
                </div>
                <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="fa fa-comments"></span> {{__("messages.Messages for new user")}}
                        </h3>
                        <div class="pull-right">
                        <span class="label label-danger {{$Count_notification_user?"blink":""}} ">
                            {{$Count_notification_user}} {{__("messages.new")}}
                        </span>
                        </div>
                    </div>
                    <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">

                        @foreach ($notification_user as $notification){?>
                        <a href="{{url('admin/members')."?id=".$notification->idItem."&id_notification=".$notification->id}}"
                           class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="{{asset("images/users/user2.jpg")}}" class="pull-left"
                                 alt="John Doe"/>
                            <span class="contacts-title">{{$notification->title}}</span>
                            <p>{{$notification->description}}</p>
                            <small class="text-muted">{{$notification->createdAt}}</small>
                        </a>
                        @endforeach
                    </div>
                    <div class="panel-footer text-center">
                        <a href="{{url('admin/members')}}">{{__("messages.Show all Users")}}</a>
                    </div>
                </div>
            </li>

            <li class="xn-icon-button pull-right">
                @switch (app()->getLocale())
                    @case('en')
                    <a href='#' id='fa_IR' class='changelocal' title='{{__("messages.Farsi")}}'><img
                                src='{{asset('/images/flag/fa.png')}}'></a>
                    @break
                    @case('fa')
                    <a href='#' id='en_US' class='changelocal' title='{{__("messages.English")}}'><img
                                src='{{asset('/images/flag/en.png')}}'></a>
                    @break
                @endswitch
            </li>

            <!-- END TASKS -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

    @yield('content')

    <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>{{__("messages.Are you sure you want to log out?") }}</p>
                <p>{{__("messages.Press No if youwant to continue work. Press Yes to logout current user.")}}</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{route('logout')}}"
                       class="btn btn-success btn-lg">{{__("messages.Yes")}}</a>
                    <button class="btn btn-default btn-lg mb-control-close">{{ __("messages.NO")}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
</body>
<!-- START PLUGINS -->
<script type="text/javascript" src="/js/admin/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/js/admin/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/admin/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='/js/admin/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="/js/admin/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="/js/admin/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="/js/admin/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="/js/admin/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="/js/admin/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='/js/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='/js/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='/js/admin/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="/js/admin/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="/js/admin/plugins/moment.min.js"></script>
<script type="text/javascript" src="/js/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->


@yield('javascript')
<script type="text/javascript" src="/js/toastr.js"></script>
<script type="text/javascript" src="/js/admin/settings.js"></script>

<script type="text/javascript" src="/js/admin/plugins.js"></script>
<script type="text/javascript" src="/js/admin/actions.js"></script>
</html>
