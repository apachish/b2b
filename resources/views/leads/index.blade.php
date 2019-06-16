@extends('layouts.main')
@section('css')
@endsection
@section('content')
    <div class="changepass">
        <div id="mobile-header" class="dashboard-menu">
            <a id="responsive-menu-button" href="#sidr-main">{{ __('messages.Dashboard') }}</a>
        </div>
        <style>
            .dashboardnav #navigation .nav ul.nav li > a.act {
                color: #fff;
                background: #555;
                padding: 2px 30px 2px 30px;
            }
        </style>
    @include('menu_profile')

    <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{ __("messages.You are here") }}:</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{ __("messages.Home") }}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="">
                    <span itemprop="title"><strong>{{ __("messages.Manage Leads") }}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                @include('users.info_user')
                @include('leads.error')

                <div class="row">

                    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{ __("messages.Manage Leads") }}</h2>
                        <div class="ordering">

                            <div class="col-sm-6 col-xs-12">
                                {{ __("messages.Filter Records") }}:
                                <form method="Get" action="#">

                                    <select name="ad_type" class="selectordering" onchange="this.form.submit()">
                                        <option {{ $filter == 'sell' ? 'selected' : "" }}
                                                value="sell">{{ __("messages.Sell Leads") }}</option>
                                        <option {{ $filter == 'buy' ? 'selected' : "" }}
                                                value="buy">{{ __("messages.Buy Leads") }}</option>
                                        <option value="" {{ $filter == '' ? 'selected' : "" }}>{{ __("messages.All Records") }}</option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                {{--paginatiom--}}
                            </div>
                            <form method="Get" action="#">

                                <div class="col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" name="search" value=""
                                           placeholder="{{ __("messages.Search my Lead") }}" autocomplete="off"
                                           id="search_lead">
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <button type="submit" class="btn btn-info"
                                            id="button_search_lead">{{ __("messages.Search") }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="mp_cont bt">
                            <ul>
                                <li class="b black fs14 lht-30 mob_hider">
                                    <div class="col-sm-2 col-xs-1">{{ __("messages.S. No.")}}</div>
                                    <div class="col-sm-7 col-xs-12">{{ __("messages.Leads")}}</div>
                                    <div class="col-sm-3 col-xs-12 actiondivlist">{{ __("messages.Action")}}</div>
                                </li>
                                <!-- titles -->
                                <div id="result_my_lead">
                                    @foreach ($leads as $i=>$lead)
                                        <li>
                                            <div class="col-md-2 col-sm-2 col-xs-1">{{$i}}.</div>
                                            <div class="col-md-6 col-sm-7 col-xs-12">
                                                <p class="titelead"><a
                                                            href="{{route('home.leads.show',['slug_categories'=>$lead->categories->first()->getCategorySlug(),'slug_leads'=> $lead->product_friendly_url])}}"
                                                            target="_blank" class="uu">{{$lead['name']}}</a></p>
                                                <p class="typelead">{{ __("messages.For")}} {{ __('messages.'.$lead->ad_type)}}</p>
                                                <p class="datelead">{{ __("messages.Last Modified")}}
                                                    : {{app()->getLocale()=='fa'?toJalali($lead['updated_at']):$lead['updated_at']}}</p>
                                                <p class="datelead">{{ __("messages.Status")}}
                                                    : {{$lead->getApprovalStatus()}}</p>
                                            </div>
                                            <div class=" col-md-4 col-sm-3 col-xs-12 actiondiv">
                                                <strong>{{ __("messages.Action")}}:</strong> <a
                                                        class="editaction"
                                                        href="{{ route('members.leads.post.edit',['slug_lead'=>$lead->product_friendly_url])}}"
                                                        title="Edit Record"><i
                                                            class="icon-edit"></i></a>
                                                <a class="deleteaction deleteactionlead"
                                                   data-toggle="modal" data-target="#myModal"
                                                   data-url="{{ route('members.leads.post.delete',['slug_lead'=>$lead->product_friendly_url])}}"
                                                   href="javascript:void(0)"
                                                   title="Delete Record"><i
                                                            class="icon-android-delete"></i></a></div>
                                        </li>
                                    @endforeach
                                </div>
                            </ul>
                        </div>
                        <div class="ordering">
                            <div class="col-sm-6 col-xs-12">
                                {{ __("messages.Filter Records") }}:

                                <form method="Get" action="#">

                                    <select name="ad_type" class="selectordering" onchange="this.form.submit()">
                                        <option {{ $filter == 'sell' ? 'selected' : "" }}
                                                value="sell">{{ __("messages.Sell Leads") }}</option>
                                        <option {{ $filter == 'buy' ? 'selected' : "" }}
                                                value="buy">{{ __("messages.Buy Leads") }}</option>
                                        <option value="" {{ $filter == '' ? 'selected' : "" }}>{{ __("messages.All Records") }}</option>
                                    </select>
                                </form>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                {{--paginatiom--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        @include('banners.box_create')
                        @include('users.info_profile_user')
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="fa fa-times"></span> {{ __("messages.Remove")}}
                        <strong>{{ __("messages.Item")}}</strong>؟</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <p>{{ __("messages.Are you sure you want to remove this row?")}}</p>
                    <p>{{ __("messages.Press Yes if you sure.")}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __("messages.NO")}}</button>
                    <button type="button" class="btn btn-default mb-control-yes"
                            id="mb-control-yes">{{ __("messages.Yes")}}</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.deleteactionlead').on('click', function () {
                var url = $(this).attr('data-url');
                $('#mb-control-yes').attr('data-url', url);
            });

            $('.mb-control-yes').on('click', function () {
                var url = $('#mb-control-yes').attr('data-url');
                window.location.replace(url);

            })


        })
    </script>
@endsection
