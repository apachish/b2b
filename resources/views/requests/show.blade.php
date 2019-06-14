@extends('layouts.main')
@section('css')
@endsection
@section('content')
    <div class="changepass">

        <!-- TOP dashbord menu -->

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
        <!-- TREE ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                @include('users.info_user')
                @include('flash::message')
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{__('messages.Manage Enquiries')}})</h2>
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
                                {{$request->comments}}
                                <a href="{{route('members.request.show', ['id' => $request->id])}}"
                                   class="morelink">{{__("messages.more")}}</a>
                            </p>
                            <p class="Enquiriesfor">{{__('messages.Enquiry For')}} : <b><a
                                            href="{{route('home.leads.leads',['slug_categories'=>$request->lead->categories->first()->slug,'slug_leads'=> $request->lead->product_friendly_url])}}"
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
                        <form action="{{route('members.request.replay',['request_id'=>$request->id])}}" method="post"
                              class="sendreply" id="sendreply">
                            <h2 class="sendreply">{{__("messages.Send Reply")}}</h2>
                            <p class="mt10 mb5">
                                <textarea name="reply" cols="100" rows="4" class="inouttyeptext"
                                          placeholder="{{__('messages.Write your comment')}}..."></textarea>
                            </p>

                            <input name="button3" type="submit" value="{{__('messages.Submit')}}"
                                   class="btn btn-primary">
                        </form>
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
    <script>
        $(document).ready(function () {
            $('.deleteActionEnquiry').on('click', function () {
                var url = $(this).attr('data-url');
                $('#mb-control-yes').attr('data-url', url);
            });

            $('.mb-control-yes').on('click', function () {
                var url = $('#mb-control-yes').attr('data-url');
                window.location.replace(url);

            })
            sessionStorage.setItem("status", false);

            $("#sendreply").submit(function (e) {
                $(':input[type="submit"]').prop('disabled', true);
                var formObj = $(this);
                var formURL = formObj.attr("action");
                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
                    type: 'POST',
                    data: formData,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data, textStatus, jqXHR) {
                        console.log(data);
                        data = JSON.parse(data);
                        if (data.status) {
                            toastr.success(data.message);
                            return true;
                        } else {
                            toastr.error(data.message);
                            $(':input[type="submit"]').prop('disabled', false);
                            return false;

                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        toastr.error('{{__('can not send email')}}');

                    }
                });
                e.preventDefault(); //Prevent Default action.

            });
        })
    </script>
@endsection

