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
                            itemprop="title"><strong>{{__("messages.Remove My Account")}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->

        <section class="contentinnerwrapper">
            <div class="container">
                @include('users.info_user')
                <div class="row">
                    <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent">
                        <h2 class="title-cat">{{__('messages.Remove My Account')}}</h2>
                        <p>
                            {!! $text !!}
                        </p>
                        <form action="{{route('members.remove.account')}}" method="post">
                            {{csrf_field()}}

                            <p class="removeaccount">
                                <button type="submit" class="btn1 radius-3 shadow2 trans_eff">
                                    {{__('messages.Still Want to Remove My Account')}}
                                </button>
                            </p>
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

