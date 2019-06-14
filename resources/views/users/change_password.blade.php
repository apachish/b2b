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
                    <span
                            itemprop="title"><strong>{{__("messages.Change Password")}}</strong></span>
                </div>
            </div>
        </section>
        <section class="contentinnerwrapper">
            <div class="container">
                @include('users.info_user')
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{__('messages.Change Password')}}</h2>
                        <form class="changpass" action="{{route('members.change.password')}}">
                            <div class="form-group row">
                                <label for="old_password" class="col-sm-3 col-form-label">{{__('messages.Old Password')}} <b class="red">*</b> : </label>
                                <div class="col-sm-9">
                                    <input class="inouttyeptext form-control" name="old_password" id="old_password" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new_password" class="col-sm-3 col-form-label">{{__('messages.New Password')}} <b class="red">*</b> :</label>
                                <div class="col-sm-9">
                                    <input class="inouttyeptext form-control" name="new_password" id="new_password" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="retype_password" class="col-sm-3 col-form-label">{{__('messages.Re-type Password')}} <b class="red">*</b> :</label>
                                <div class="col-sm-9">
                                    <input class="inouttyeptext form-control" name="retype_password" id="retype_password" type="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <input name="register_me" type="button" value="Update Now" class="btn btn-primary">
                                    <input name="reset" type="button" value="Reset" class="btn btn-dark">
                                </div>
                            </div>
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
@endsection
@section('javascript')

@endsection

