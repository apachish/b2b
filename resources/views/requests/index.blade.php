@extends('layouts.main')
@section('css')
@endsection
@section('content')
    <div class="changepass">

        <div id="mobile-header" class="dashboard-menu">
            <a id="responsive-menu-button" href="#sidr-main">{{__("messages.Dashboard")}}</a>
        </div>

    @include('menu_profile')
    <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{__("messages.You are here")}} :</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home') }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{__("messages.Home")}}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{__("messages.Manage Enquiries")}}</span></a>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->

        <!-- TREE ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                @include('users.info_user')
                @include('flash::message')

                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat"><{{ __("messages.Manage Enquiries") }}</h2>
                        <form method="get" action="#">
                            <div class="ordering">
                                <div class="col-sm-5 col-xs-12">
                                    {{ __("messages.Filter Records") }} :
                                    <select name="filter[product]" class="selectordering" onchange="this.form.submit()">
                                        @foreach ($leads as $lead)
                                            <option
                                                    {{$filter['lead'] == $lead->product_friendly_url ? "selected" : "" }} value="{{ $lead->product_friendly_url }}"
                                            >
                                                {{ $lead->name }}
                                            </option>

                                        @endforeach
                                        <option value="" {{ $filter['lead'] == '' ? 'selected' : "" }} >
                                            <{{ __("messages.All Records") }}</option>
                                    </select>
                                </div>
                                <div class="col-sm-7 col-xs-12">
                                    <p class="fr mt5">
                                        {{ __("messages.Sort by") }} :
                                        <span class="ml10 b">
                                        <label>
                                            <input name="filter[sort]" type="radio" class="vam"
                                                   {{$filter['sort'] == "DESC" ? "checked" : "" }}  value="DESC"
                                                   onchange="this.form.submit()"><{{ __("messages.Recent First") }}
                                        </label>
                                        <label>
                                            <input name="filter[sort]" type="radio" class="vam ml10"
                                                   {{$filter['sort'] == 'ASC' ? "checked" : "" }} value="ASC"
                                                   onchange="this.form.submit()"
                                                   ]><{{ __("messages.Oldest First") }}</label>
                                    </span>
                                    </p>
                                </div>
                            </div>
                            <div class="pagination">
                                <div class="col-sm-6 col xs-12">
                                    <div class="one">{{ __("messages.Showing") }} :
                                        <select name="filter[limit]" class="p2" onchange="this.form.submit()">
                                            <option {{$filter['limit'] == 15 ? "selected" : "" }} value="15">
                                                15 {{ __("messages.Records") }}</option>
                                            <option {{$filter['limit'] == 15 ? "selected" : "" }} value="30">
                                                30 {{ __("messages.Records") }}</option>
                                            <option {{$filter['limit'] == 15 ? "selected" : "" }} value="45">
                                                45 {{ __("messages.Records") }}</option>
                                            <option {{$filter['limit'] == 15 ? "selected" : "" }} value="60">
                                                60 {{ __("messages.Records") }}</option>
                                            <option
                                            {{$filter['limit'] == $count ? "selected" : "" }} value
                                            ="<{{$count}}"><{{ __("messages.All Records") }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col xs-12">
                                    {{$requests->onEachSide(1)->links()}}
                                </div>
                            </div>
                        </form>
                        @foreach ($requests as $request)
                            <div class="border4">
                                <p class="Enquiriesname"> {{$request->name}}
                                    @if ($request->status == 3)
                                        <img src="/images/nx.gif" width="23" height="12" alt="">
                                    @endif
                                </p>
                                <p class="Enquiriesdate">
                                    {{ __("messages.Posted On") }}
                                            : {{app()->getLocale()=='fa'?toJalali($request->created_at):$request->created_at}}</p>
                                <p class="Enquiriescontact"><b>
                                        {{ __("messages.Contact No") }}
                                                :
                                    </b> {{$request->mobile}} / <b>
                                        {{ __("messages.Email ID") }}
                                                :
                                    </b>{{$request->email}}<br>
                                    <b>
                                        {{ __("messages.Company") }}:
                                    </b> {{$request->company_name}}</p>
                                <p class="Enquiriestext">
                                    {{short_string($request->comments,100)}}
                                    <a href="{{route('members.request.show', ['id' => $request->id])}}"
                                       class="morelink">{{__("messages.more")}}</a>
                                </p>
                                <p class="Enquiriesfor">{{__('messages.Enquiry For')}} : <b><a
                                                href="{{route('home.leads.show',['slug_categories'=>$request->lead->categories->first()->getCategorySlug(),'slug_leads'=> $request->lead->product_friendly_url])}}"
                                                target="_blank">
                                            {{$request->lead->name}}
                                            - {{__("messages.For")}} {{__("messages.".$request->lead->ad_type)}}</a></b>
                                </p>
                                <div class="Enquiriesdelete">
                                    <p><b>{{__("messages.Action") }} :</b>&nbsp;
                                        <span class="sendreplyspan"><a
                                                    href="{{route('members.request.show', ['id' => $request->id])}}"
                                                    class="uu">{{__('messages.Send Reply')}}</a></span>
                                        <span class="red"><a class="deleteActionEnquiry" data-toggle="modal"
                                                             data-target="#myModal"
                                                             data-url="{{route('members.request.delete', ['id' => $request->id])}}"
                                                             href="javascript:void(0)"><i
                                                        class="icon-android-delete"></i> {{__("messages.Delete") }}</a></span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
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
    <script type="text/javascript">
        $(document).ready(function () {

            $('.deleteActionEnquiry').on('click', function () {
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
@section('javascript')
@endsection

