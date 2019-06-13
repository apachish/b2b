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
            <i  class="right-align icon-angle-left"></i>
            <div  class="right-align divinhere" itemscope="" itemtype="">
                <span itemprop="title"><strong>{{__("messages.Dashboard")}}</strong></span>
            </div>
        </div>
    </section>
    <!-- breadcrumb ENDS -->
    <section class="contentinnerwrapper">
        <div class="container">
            @include('users.info_user')
            <div class="row">
                <div class="reqdiv col-lg-6 col-sm-6 col-xs-12">
                    <h3 class="titleblue">{{__("messages.Recent Posted Leads")}}</h3>
                    <div class="inr_list_req" style="margin-top:0px">
                        <ul>
                            @foreach ($leads as $lead)
                            <li>
                                <p class="titlereq"><a href="{{route('home.leads.leads',['slug_categories'=>$lead->categories->first()->slug,'slug_leads'=> $lead->product_friendly_url])}}" target="_blank" class="uo">{{$lead->name}} - <b class="black weight400">{{__('messages.To')}} {{__('messages.'.$lead->ad_type)}}</b></a></p>
                                <p class="datereq">{{__('messages.Last Modified')}}: {{app()->getLocale()=='fa'?toJalali($lead->updated_at):$lead->updated_at}}</p>
                                <a class="deleterecord" data-toggle="modal" data-target="#myModal"
                                   data-url="{{route('members.leads.post.delete',['slug_leads'=> $lead->product_friendly_url])}}"
                                   href="javascript:void(0)"
                                   title="Delete Record" title="{{__('messages.Delete Record')}}"><i class="icon-android-delete"></i></a>
                                <p class="editreq">
                                    <a href="{{route('members.leads.post.edit',['slug_leads'=> $lead->product_friendly_url])}}"
                                       class="trans_eff" title="{{__('messages.Edit Details')}}">
                                        <i class="icon-edit"></i>{{__('messages.Edit Details')}}</a>
                                </p>
                            </li>
                        @endforeach
                        <!-- list 1 -->
                        </ul>
                    </div>
                    <p class="leadslink"><a href="{{route('members.leads.list')}}" class="btn2s radius-3 trans_eff">{{__('messages.View All Leads')}}</a></p>
                </div>
                <div class="reqdiv col-lg-6 col-sm-6 col-xs-12">
                    @include('users.info_profile_user')

                </div>
            </div>
            <div class="row">
                @foreach ($requests as $request)
                <div class="divbtmreq col-lg-6 col-sm-6 col-xs-12">
                    <div class="border4">
                        <p class="Enquiriesname"> {{$request->name}}
                            @if($request->status ==1)
                                <img src="/images/nx.gif" width="23" height="12" alt="">
                            @endif
                        </p>
                        <p class="Enquiriescontact"><b>
                                {{__("messages.Contact No")}}:
                            </b> {{$request->mobile}} / <b>{{__("messages.Email ID")}}:</b>{{$request->email}}<br>
                            <b>{{__("messages.Company")}}:</b> {{$request->company_name}}</p>
                        <p class="datereq">{{$request->created_at}}</p>
                        <p class="Enquiriestext">
                            {{short_string($request->comments,100)}}
                            <a href="{{route('members.request.show',['id'=>$request->id])}}" class="morelink">{{__("messages.more")}}</a>
                        </p>
                        <p class="Enquiriesfor">{{__("messages.Enquiry For")}} : <b>
                                <a href="{{route('home.leads.leads',['slug_categories'=>$lead->categories->first()->slug,'slug_leads'=> $lead->product_friendly_url])}}"
                                   target="_blank">{{$request->lead->name}}- {{__("messages.For")}} {{__('messages.'.$request->lead->ad_type)}}</a></b></p>
                        <div>
                            <a class="deletereq" href="#" title="Delete Record">
                                <i class="icon-android-delete"></i></a>
                            <p class="Detailsreq"> <a href="{{route('members.request.show',['id'=>$request->id])}}>" class="uu"
                                                      title="{{__("messages.View Details")}}">{{__("messages.View Details")}}</a> </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><span class="fa fa-times"></span> {{__("messages.Remove")}} <strong>{{__("messages.Item")}}</strong>؟</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <p>{{__("messages.Are you sure you want to remove this row?")}}</p>
                <p>{{__("messages.Press Yes if you sure.")}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{__("messages.NO")}}</button>
                <button type="button" class="btn btn-default mb-control-yes" id="mb-control-yes">{{__("messages.Yes")}}</button>
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
            $('#mb-control-yes').attr('data-url',url);
        });

        $('.mb-control-yes').on('click', function () {
            var url = $('#mb-control-yes').attr('data-url');
            window.location.replace(url);

        })

    })
</script>
@endsection
