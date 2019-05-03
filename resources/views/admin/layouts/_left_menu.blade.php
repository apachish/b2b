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
                <img src="{{asset('images/logo.png')}}" alt="{{__('B2B')}}"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{asset('images/logo.png')}}" alt="{{__('B2B')}}"/>
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
            <a href="{{route('admin')}}"><span class="fa fa-desktop"></span> <span class="xn-text">{{__('Dashboard')}}</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-tags"></span> <span class="xn-text">{{__('Category Management')}}</span></a>
            <ul>
                <li><a href="{{url('admin/categories')}}"><span class="fa fa-image"></span> {{__('Category')}}</a></li>
                <li><a href="{{url('admin/categories/excel/upload')}}"><span class="fa fa-align-center"></span> {{__('Bulk Upload Category')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-tasks"></span> <span class="xn-text">{{__('Manage Leads')}}</span></a>
            <ul>
                <li><a href="{{url('admin/leads')}}"><span class="fa fa-files-o"></span>{{__('Leads')}}</a></li>
                <li><a href="{{url('admin/leads/request')}}"><span class="fa fa-comment"></span>{{__('Manage Enquiry/Feedback')}}</a></li>
                <li><a href="{{url('admin/leads/bulkupload')}}"><span class="fa fa-image"></span>{{__('Bulk Upload Product')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">{{__('Article Management')}}</span></a>
            <ul>
                <li><a href="{{url('admin/article')}}"><span class="fa fa-file-text"></span> {{__('Articles')}}</a></li>
                <li><a href="{{url('admin/comment')}}"><span class="fa fa-comment"></span> {{__('Comments')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-user"></span> <span class="xn-text">{{__('Members Management')}}</span></a>
            <ul>
                <li>
                    <a href="{{url('admin/members')}}"><span class="fa fa-user"></span> {{__('Members')}}</a>
                    <div class="informer informer-danger">New</div>
                </li>
                <li><a href="{{url('admin/members/manage_membership')}}"><span class="fa fa-tags"></span> {{__('Membership')}}</a></li>
                <li><a href="{{url('admin/members/membership_orders')}}"><span class="fa fa-user-mdt"></span> {{__('Membership Orders')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="tables.html"><span class="fa fa-globe"></span> <span class="xn-text">{{__('Location Management')}}</span></a>
            <ul>
                <li><a href="{{url('admin/country')}}"><span class="fa fa-map-marker"></span> {{__('Countries')}}</a></li>
                <li><a href="{{url('admin/state')}}"><span class="fa fa-location-arrow"></span>{{__('States')}}</a></li>
                <li><a href="{{url('admin/city')}}"><span class="fa fa-location-arrow"></span> {{__('Cities')}}</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-bars"></span> <span class="xn-text">{{__('Manage Menu')}}</span></a>
            <ul>
                <li><a href="{{url('admin/menus/categories')}}"><span class="fa fa-tag">{{__('Category')}}</span></a></li>
                <li><a href="{{url('admin/menus')}}"><span class="fa fa-minus">{{__('Menus')}}</span></a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('admin/newsletter')}}"><span class="fa fa-envelope-o"></span> <span class="xn-text">{{__('NewsLetter')}}</span></a>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-qrcode"></span> <span class="xn-text">{{__('Other Management')}}</span></a>
            <ul>
                <li><a href="{{url('admin/staticpages')}}"><span class="fa fa-columns"></span> {{__('Static Pages')}}</a></li>
                <li><a href="{{url('admin/mailcontents')}}"><span class="fa fa-envelope"></span>{{__('Mail Contents')}}</a></li>
                <li><a href="{{url('admin/enquiry')}}"><span class="fa fa-comment"></span> {{__('Manage Enquiry/Bug')}}</a></li>
                <li><a href="{{url('admin/enquiry/request_call')}}"><span class="fa fa-phone-square"></span> {{__('Manage Requst A Call')}}</a></li>
                <li><a href="{{url('admin/banners')}}"><span class="fa fa-picture-o"></span>{{__('Banners')}}</a></li>
                <li><a href="{{url('admin/advertise')}}"><span class="fa fa-clipboard"></span> {{__('Manage Advertise')}}</a></li>
                <li><a href="{{url('admin/testimonial')}}"><span class="fa fa-archive"></span> {{__('Manage Testimonial')}}</a></li>
                <li><a href="{{url('admin/faq')}}"><span class="fa fa-h-square"></span>{{__('Manage Help')}}</a></li>
                <li><a href="{{url('admin/portals')}}"><span class="fa fa-windows"></span> {{__('Portals')}}</a></li>
                <li><a href="{{url('admin/translator')}}"><span class="fa fa-font"></span> {{__('Translator')}}</a></li>
                <li><a href="{{url('admin/sliders')}}"><span class="fa fa-align-right"></span>{{__('Sliders')}}</a></li>
                <li><a href="{{url('admin/searchList')}}"><span class="fa fa-align-right"></span> {{__('Search list')}}</a></li>
            </ul>
        </li>

    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->