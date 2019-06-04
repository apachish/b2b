<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{route('admin')}}">B2B</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{asset('images/logo.png')}}" alt="{{__('messages.B2B')}}"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{asset('images/logo.png')}}" alt="{{__('messages.B2B')}}"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{auth()->user()->first_name." ".auth()->user()->last_name}}</div>
                    <div class="profile-data-title">{{auth()->user()->role}}</div>
                </div>
                <div class="profile-controls">
                    <a href="{{route('adminProfile')}}" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="{{route('adminMessage')}}" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li {!! (Request::is('admin/activity_log') ? 'class="active"' : '') !!}>
            <a href="{{route('admin')}}"><span class="fa fa-desktop"></span> <span class="xn-text">{{__('messages.Dashboard')}}</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-tags"></span> <span class="xn-text">{{__('messages.Category Management')}}</span></a>
            <ul>
                <li><a href="{{url('admin/categories')}}"><span class="fa fa-image"></span> {{__('messages.Category')}}</a></li>
                <li><a href="{{url('admin/categories/excel/upload')}}"><span class="fa fa-align-center"></span> {{__('messages.Bulk Upload Category')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-tasks"></span> <span class="xn-text">{{__('messages.Manage Leads')}}</span></a>
            <ul>
                <li><a href="{{url('admin/leads')}}"><span class="fa fa-files-o"></span>{{__('messages.Leads')}}</a></li>
                <li><a href="{{url('admin/leads/request')}}"><span class="fa fa-comment"></span>{{__('messages.Manage Enquiry/Feedback')}}</a></li>
                <li><a href="{{url('admin/leads/bulkupload')}}"><span class="fa fa-image"></span>{{__('messages.Bulk Upload Product')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">{{__('messages.Article Management')}}</span></a>
            <ul>
                <li><a href="{{route('articles.index')}}"><span class="fa fa-file-text"></span> {{__('messages.Articles')}}</a></li>
                <li><a href="{{route('comments.index')}}"><span class="fa fa-comment"></span> {{__('messages.Comments')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-user"></span> <span class="xn-text">{{__('messages.Members Management')}}</span></a>
            <ul>
                <li>
                    <a href="{{route('members.index')}}"><span class="fa fa-user"></span> {{__('messages.Members')}}</a>
                    <div class="informer informer-danger">New</div>
                </li>
                <li><a href="{{url('admin/members/manage_membership')}}"><span class="fa fa-tags"></span> {{__('messages.Membership')}}</a></li>
                <li><a href="{{url('admin/members/membership_orders')}}"><span class="fa fa-user-mdt"></span> {{__('messages.Membership Orders')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="tables.html"><span class="fa fa-globe"></span> <span class="xn-text">{{__('messages.Location Management')}}</span></a>
            <ul>
                <li><a href="{{route('countries.index')}}"><span class="fa fa-map-marker"></span> {{__('messages.Countries')}}</a></li>
                <li><a href="{{route('states.index')}}"><span class="fa fa-location-arrow"></span>{{__('messages.States')}}</a></li>
                <li><a href="{{route('cities.index')}}"><span class="fa fa-location-arrow"></span> {{__('messages.Cities')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-bars"></span> <span class="xn-text">{{__('messages.Manage Menu')}}</span></a>
            <ul>
                <li><a href="{{url('admin/menus/categories')}}"><span class="fa fa-tag">{{__('messages.Category')}}</span></a></li>
                <li><a href="{{url('admin/menus')}}"><span class="fa fa-minus">{{__('messages.Menus')}}</span></a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.newsletters.index')}}"><span class="fa fa-envelope-o"></span> <span class="xn-text">{{__('messages.NewsLetter')}}</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-qrcode"></span> <span class="xn-text">{{__('messages.Other Management')}}</span></a>
            <ul>
                <li><a href="{{route('pages.index')}}"><span class="fa fa-columns"></span> {{__('messages.Static Pages')}}</a></li>
                <li><a href="{{url('admin/mailcontents')}}"><span class="fa fa-envelope"></span>{{__('messages.Mail Contents')}}</a></li>
                <li><a href="{{url('admin/enquiry')}}"><span class="fa fa-comment"></span> {{__('messages.Manage Enquiry/Bug')}}</a></li>
                <li><a href="{{url('admin/enquiry/request_call')}}"><span class="fa fa-phone-square"></span> {{__('messages.Manage Requst A Call')}}</a></li>
                <li><a href="{{url('admin/banners')}}"><span class="fa fa-picture-o"></span>{{__('messages.Banners')}}</a></li>
                <li><a href="{{url('admin/advertise')}}"><span class="fa fa-clipboard"></span> {{__('messages.Manage Advertise')}}</a></li>
                <li><a href="{{url('admin/testimonial')}}"><span class="fa fa-archive"></span> {{__('messages.Manage Testimonial')}}</a></li>
                <li><a href="{{url('admin/faq')}}"><span class="fa fa-h-square"></span>{{__('messages.Manage Help')}}</a></li>
                <li><a href="{{url('admin/portals')}}"><span class="fa fa-windows"></span> {{__('messages.Portals')}}</a></li>
                <li><a href="{{url('admin/translators')}}"><span class="fa fa-font"></span> {{__('messages.Translator')}}</a></li>
                <li><a href="{{url('admin/sliders')}}"><span class="fa fa-align-right"></span>{{__('messages.Sliders')}}</a></li>
                <li><a href="{{url('admin/searchList')}}"><span class="fa fa-align-right"></span> {{__('messages.Search list')}}</a></li>
            </ul>
        </li>

    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->
