<section class="dashboardnav">
    <div id="navigation" class="container">
        <nav class="nav">
            <ul class="nav">
                <li class="dropdown"><a href="{{ url('members/myaccount') }}" title="{{ __('messages.Dashboard') }}"
                                        class="act">{{ __('messages.Dashboard') }}</a></li>
                <li class="dropdown"><a href="javascript:void(0)"
                                        title="{{ __('messages.My Profile') }}">{{ __('messages.My Profile') }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('company/detail', ['id' => auth()->id()]) }}"
                               target="_blank"
                               title="{{ __('messages.View My Profile') }}">{{ __('messages.View My Profile') }}</a></li>
                        <li><a href="{{ url('members/edit_account') }}"
                               title="{{ __('messages.Update My Profile') }}">{{ __('messages.Update My Profile') }}</a></li>
                        <li><a href="{{ url('members/membership_plans') }}"
                               title="{{ __('messages.Membership Plans') }}">{{ __('messages.Membership Plans') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="{{ url('members/manage_enquiry') }}"
                                        title="{{ __('messages.Manage Enquiries') }}">{{ __('messages.Manage Enquiries') }}</a>
                </li>
                <li class="dropdown"><a href="javascript:void(0)">{{ __('messages.Manage Leads') }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('members/post_lead') }}"
                               title="{{ __('messages.Post New Lead') }}">{{ __('messages.Post New Lead') }}</a></li>
                        <li><a href="{{ url('members/manage_leads') }}"
                               title="{{ __('messages.Manage Leads') }}">{{ __('messages.Manage Leads') }}</a></li>
                    </ul>
                </li>
                </li>
                <li class="dropdown"><a href="javascript:void(0)">{{ __('messages.Manage Account') }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('members/change_password') }}"
                             title="{{ __('messages.Change Password') }}">{{ __('messages.Change Password') }}</a></li>
                            <li><a href="{{ url('members/remove_account') }}"
                                   title="{{ __('messages.Remove Account') }}">{{ __('messages.Remove Account') }}</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</section>