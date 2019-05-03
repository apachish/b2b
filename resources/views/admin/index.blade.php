@extends('layouts.admin')

@section('content')

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">{{__("Home") }}</a></li>
        <li class="active">{{__("Dashboard") }}</li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <!-- START WIDGETS -->
        <div class="row">
            <div class="col-md-4">

                <div class="widget widget-warning widget-carousel">
                    <div class="owl-carousel" id="owl-example">
                        <div>
                            <div class="widget-title">{{__("Total Visitors") }}</div>
                            <div class="widget-subtitle"></div>
                            <div class="widget-int">{{ $total_visitor }}</div>
                        </div>
                        <div>
                            <div class="widget-title">{{__("Today Visitor") }}</div>
                            <div class="widget-subtitle">{{ $date }}</div>
                            <div class="widget-int">{{ $today_visitor }}</div>
                        </div>
                        <div>
                            <div class="widget-title">{{__("Today Register") }}</div>
                            <div class="widget-subtitle">{{ $date }}</div>
                            <div class="widget-int">{{ $new_register }}</div>
                        </div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right"><span class="fa fa-times"></span></a>
                    </div>
                </div>

            </div>
            <div class="col-md-2">

                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon"
                     onclick="location.href='{{ url('admin/members') }}';">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ $count_user }}</div>
                        <div class="widget-title">{{__("Registred users") }}</div>
                        <div class="widget-subtitle">{{__("On your website") }}</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top"
                           title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET REGISTRED -->

            </div>
            <div class="col-md-2">

                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon"
                     onclick="location.href='{{ url('admin/members')."?featured=1" }}';">
                    <div class="widget-item-left">
                        <span class="fa fa-user"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ $count_user_featured }}</div>
                        <div class="widget-title">{{__("Featured users") }}</div>
                        <div class="widget-subtitle">{{__("On your website") }}</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top"
                           title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET REGISTRED -->

            </div>
            <div class="col-md-4">

                <!-- START WIDGET CLOCK -->
                <div class="widget widget-info widget-padding-sm">
                    <div class="widget-big-int plugin-clock">00:00</div>
                    <input type="hidden" id="local" value="{{ $locale }}">
                    <input type="hidden" id="datetime" value="{{ $date }}">
                    <div class="widget-subtitle plugin-date">{{__("Loading") }}...</div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="left"
                           title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                    <div class="widget-buttons widget-c3">
                        <div class="col">
                            <a href="#"><span class="fa fa-clock-o"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-bell"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-calendar"></span></a>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET CLOCK -->

            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="{{ url("admin/products") }}" class="tile tile-danger ">
                    {{ $total_lead }}
                    <p>{{__("Total Leads") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/products") . "?startDate=" . date('Y-m-d 00:00:00') . "&endDate=" . date('Y-m-d 23:59:59') }}"
                   class="tile tile-danger ">
                    {{ $total_lead_today }}
                    <p>{{__("Today Send Leads") }}</p>
                    <div class="informer informer-default dir-tr">{{ $date }}</div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/products") . "?newStatus=1" }}" class="tile tile-danger ">
                    {{ $total_lead_new }}
                    <p>{{__("Total New Leads") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/products") . "?status=1" }}" class="tile tile-danger">
                    {{ $total_lead_active }}
                    <p>{{__("Total Active Leads") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/products") . "?status=0" }}" class="tile tile-danger">
                    {{ $total_lead_unactive }}
                    <p>{{__("Total UnActive Leads") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/request")."?readStatusAdmin=1" }}" class="tile tile-primary">
                    {{ $total_new_enquiry }}
                    <p>{{__("New Request Lead") }}</p>
                    <div class="informer informer-default dir-tr"><span class="fa fa-comment"></span></div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ url("admin/products") . "?approvalStatus_filter=1" }}" class="tile tile-danger">
                    {{ $total_lead_pending }}
                    <p>{{__("Total Pending Leads") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url("admin/products") . "?approvalStatus_filter=2" }}" class="tile tile-danger ">
                    {{ $total_lead_approved }}
                    <p>{{__("Total Approved Leads") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url("admin/products") . "?approvalStatus_filter=3" }}" class="tile tile-danger ">
                    {{ $total_lead_rejected }}
                    <p>{{__("Total Rejected Leads") }}</p>
                    <div class="informer informer-default dir-tr">{{ $date }}</div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <a href="{{ url("admin/banners") }}" class="tile  tile-success">
                    {{ $total_banner }}
                    <p>{{__("Total Banner") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/banners") . "?status_search=1" }}" class="tile tile-success ">
                    {{ $total_banner_active }}
                    <p>{{__("Total Active Banner") }}</p>
                    <div class="informer informer-default dir-tr">
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/banners") . "?status_search=-1" }}" class="tile tile-success ">
                    {{ $total_banner_unactive }}
                    <p>{{__("Total UnActive Banner") }}</p>
                    <div class="informer informer-default dir-tr">
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/advertise") }}" class="tile  tile-warning">
                    {{ $total_advertise }}
                    <p>{{__("Total Advertise") }}</p>
                    <div class="informer informer-default dir-tr"></div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/advertise") . "?status_search=1" }}" class="tile tile-warning ">
                    {{ $total_advertise_active }}
                    <p>{{__("Total Active Advertise") }}</p>
                    <div class="informer informer-default dir-tr">
                    </div>
                </a>
            </div>
            <div class="col-md-2">
                <a href="{{ url("admin/advertise") . "?status_search=-1" }}" class="tile tile-warning">
                    {{ $total_advertise_unactive }}
                    <p>{{__("Total UnActive Advertise") }}</p>
                    <div class="informer informer-default dir-tr">
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon"
                     onclick="location.href='{{ url('admin/enquiry') . "?new=N" }}';">
                    <div class="widget-item-left">
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ $message_count }}</div>
                        <div class="widget-title">{{__("New messages") }}</div>
                        <div class="widget-subtitle">{{__("In your Enquiry/Bug") }}</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top"
                           title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET MESSAGES -->

            </div>

            <div class="col-md-3">

                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon"
                     onclick="location.href='{{ url('admin/enquiry/request_call') . "?new=N" }}';">
                    <div class="widget-item-left">
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ $message_count_request }}</div>
                        <div class="widget-title">{{__("New messages") }}</div>
                        <div class="widget-subtitle">{{__("In your Requst A Call") }}</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top"
                           title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET MESSAGES -->

            </div>
            <div class="col-md-3">

                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon"
                     onclick="location.href='{{ url('admin/testimonial') . "?status=0" }}';">
                    <div class="widget-item-left">
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ $message_count_testimonial }}</div>
                        <div class="widget-title">{{__("UnActive messages") }}</div>
                        <div class="widget-subtitle">{{__("In your Manage Testimonial") }}</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top"
                           title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET MESSAGES -->

            </div>
            <div class="col-md-3">

                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon"
                     onclick="location.href='{{ url('admin/comment') . "?status=0" }}';">
                    <div class="widget-item-left">
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{ $message_count_comment_article }}</div>
                        <div class="widget-title">{{__("UnActive Comment") }}</div>
                        <div class="widget-subtitle">{{__("In your Article") }}</div>
                    </div>
                    <div class="widget-controls">
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                           data-placement="top"
                           title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>
                <!-- END WIDGET MESSAGES -->

            </div>

        </div>
        <!-- END WIDGETS -->

        <div class="row">
            <div class="col-md-4">

                <!-- START USERS ACTIVITY BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>{{__("Users Activity") }}</h3>
                            <span>{{__("Add Sale vs Buy") }}</span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span
                                                    class="fa fa-angle-down"></span>{{__(" Collapse") }}</a>
                                    </li>
                                    <li><a href="#" class="panel-remove"><span
                                                    class="fa fa-times"></span> {{__("Remove") }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body padding-0">
                        <input type="hidden" id="chart_a" value="{{__("Sale") }}">
                        <input type="hidden" id="chart_b" value="{{__("Buy") }}">
                        <textarea style="display: none" id="info_sale_buy">{{ json_encode($info_sale_buy) }}</textarea>
                        <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                    </div>
                </div>
                <!-- END USERS ACTIVITY BLOCK -->

            </div>
            <div class="col-md-4">

                <!-- START VISITORS BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>{{__("Category") }}</h3>
                            <span>{{__("Info Most Lead in  Main Category") }}</span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span
                                                    class="fa fa-angle-down"></span> {{__("Collapse") }}</a>
                                    </li>
                                    <li><a href="#" class="panel-remove"><span
                                                    class="fa fa-times"></span> {{__("Remove") }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body padding-0">
                    <textarea style="display: none"
                              id="info_all_product">{{ json_encode($info_all_Category) }}</textarea>

                        <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
                    </div>
                </div>
                <!-- END VISITORS BLOCK -->

            </div>
            <div class="col-md-4">

                <!-- START SALES & EVENTS BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>{{__("Advertise & Banner") }}</h3>
                            <span>{{__("info about add Advertise & Banner by day") }}</span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span>
                                            Collapse</a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body padding-0">
                        <textarea style="display: none"
                                  id="info_adv_banner">{{ json_encode($info_adv_banner) }}</textarea>
                        <textarea style="display: none"
                                  id="info_adv_banner_label">{{ json_encode($info_adv_banner_label) }}</textarea>

                        <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                    </div>
                </div>
                <!-- END SALES & EVENTS BLOCK -->

            </div>

        </div>

        <div class="row">

            <div class="col-md-4">

                <!-- START PROJECTS BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>{{__("Membership") }}</h3>
                            <span>{{__("status number member") }}</span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                            class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span
                                                    class="fa fa-angle-down"></span> {{__("Collapse") }}</a>
                                    </li>
                                    <li><a href="#" class="panel-remove"><span
                                                    class="fa fa-times"></span> {{__("Remove") }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="50%">{{ __('Type Membership') }}</th>
                                    <th width="20%">{{ __('Number') }}</th>
                                    <th width="30%">{{ __('Activity') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($memberships as $i => $membership):}}
                                <tr>
                                    <td><strong>{{ $membership['planName'] }}</strong></td>
                                    <td>
                                        <span class="label {{ !empty($class[$i]) ? $class[$i] : 'progress-bar-warning' }}">{{ $membership['number'] }}</span>
                                    </td>
                                    <td>
                                        <div class="progress progress-small progress-striped active">
                                            <div class="progress-bar {{ !empty($class[$i]) ? $class[$i] : 'progress-bar-warning' }}"
                                                 role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width: {{ $membership['percent'] }}%;">{{ $membership['percent'] }}
                                                %
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- END PROJECTS BLOCK -->

            </div>
            <div class="col-md-8">

                <!-- START SALES BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h3>{{__("Leads") }}</h3>
                            <span>{{__("Info Location Add Lead and status") }}</span>
                        </div>
                        <ul class="panel-controls panel-controls-title">
                            <li>
                                <!--                            <div id="reportrange" class="dtrange">-->
                                <!--                                <span></span><b class="caret"></b>-->
                                <!--                            </div>-->
                            </li>
                            <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                        </ul>

                    </div>
                    <div class="panel-body">
                        <div class="row stacked">
                            <div class="col-md-4">
                                <div class="progress-list">
                                    <div class="pull-left"><strong>{{__("Pending") }}</strong></div>
                                    <div class="pull-right">{{round(($total_lead_pending/$total_lead)*100) }}%</div>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-primary" role="progressbar"
                                             aria-valuenow="50"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="width: {{ ($total_lead_pending/$total_lead)*100}}%;">{{ ($total_lead_pending/$total_lead)*100}}
                                            %
                                        </div>
                                    </div>
                                </div>
                                @if ($total_lead > 0 )
                                    <div class="progress-list">
                                        <div class="pull-left"><strong>{{__("Approved") }}</strong></div>
                                        <div class="pull-right">{{ $total_lead_approved}}/{{ $total_lead}}</div>
                                        <div class="progress progress-small progress-striped active">
                                            <div class="progress-bar progress-bar-primary" role="progressbar"
                                                 aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width: {{ ($total_lead_approved/$total_lead)*100}}%;">{{ ($total_lead_approved/$total_lead)*100}}
                                                %
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-list">
                                        <div class="pull-left"><strong class="text-danger">{{__("Rejected") }}</strong>
                                        </div>
                                        <div class="pull-right">{{$total_lead_rejected}}/{{$total_lead}}</div>
                                        <div class="progress progress-small progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                 aria-valuenow="50"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width:  {{ ($total_lead_rejected/$total_lead)*100}}%;"> {{ ($total_lead_rejected/$total_lead)*100}}
                                                %
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <p><span class="fa fa-warning"></span> {{__("Data info every refresh update") }}</p>
                            </div>
                            <div class="col-md-8">
                                <textarea style="display: none"
                                          id="info_location_lead">{{ json_encode($info_location_lead) }}</textarea>

                                <div id="dashboard-map-seles" style="width: 100%; height: 200px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SALES BLOCK -->

            </div>
        </div>

        <!-- START DASHBOARD CHART -->
        <!--    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>-->
        <!--    <div class="block-full-width">-->
        <!-- END DASHBOARD CHART -->

    </div>
{{--    <script type='text/javascript' src='/js/plugins/icheck/icheck.min.js'></script>--}}
{{--    <script type="text/javascript" src="/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/plugins/scrolltotop/scrolltopcontrol.js"></script>--}}

{{--    <script type="text/javascript" src="/js/plugins/morris/raphael-min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/plugins/morris/morris.min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/plugins/rickshaw/d3.v3.js"></script>--}}
{{--    <script type="text/javascript" src="/js/plugins/rickshaw/rickshaw.min.js"></script>--}}
{{--    <script type='text/javascript' src='/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>--}}
{{--    <script type='text/javascript' src='/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>--}}
{{--    <script type='text/javascript' src='/js/plugins/bootstrap/bootstrap-datepicker.js'></script>--}}
{{--    <script type="text/javascript" src="/js/plugins/owl/owl.carousel.min.js"></script>--}}

{{--    <script type="text/javascript" src="/js/plugins/moment.min.js"></script>--}}
{{--    <script type="text/javascript" src="/js/plugins/daterangepicker/daterangepicker.js"></script>--}}
{{--    <!-- END THIS PAGE PLUGINS-->--}}

{{--    <!-- START TEMPLATE -->--}}
{{--    <script type="text/javascript" src="/js/admin/settings.js"></script>--}}

{{--    <script type="text/javascript" src="/js/admin/plugins.js"></script>--}}
{{--    <script type="text/javascript" src="/js/actions.js"></script>--}}

{{--    <script type="text/javascript" src="/js/admin/demo_dashboard.js"></script>--}}
@endsection
@section('javascript')
    <script type="text/javascript" src="/js/admin/demo_dashboard.js"></script>

    @endsection

