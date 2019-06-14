<section class="dashboardnav">
    <div id="navigation" class="container">
        <nav class="nav">
            <ul class="nav">
                <li class="dropdown"><a href="{{ route('members.my-account') }}" title="{{ __('messages.Dashboard') }}"
                                        class="act">{{ __('messages.Dashboard') }}</a></li>
                <li class="dropdown"><a href="javascript:void(0)"
                                        title="{{ __('messages.My Profile') }}">{{ __('messages.My Profile') }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('home.companies.info', ['slug_companies' => auth()->user()->slug]) }}"
                               target="_blank"
                               title="{{ __('messages.View My Profile') }}">{{ __('messages.View My Profile') }}</a></li>
                        <li><a href="{{ route('members.edit_account') }}"
                               title="{{ __('messages.Update My Profile') }}">{{ __('messages.Update My Profile') }}</a></li>
                        <li><a href="{{ route('members.membership.plans') }}"
                               title="{{ __('messages.Membership Plans') }}">{{ __('messages.Membership Plans') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="{{ route('members.request.index') }}"
                                        title="{{ __('messages.Manage Enquiries') }}">{{ __('messages.Manage Enquiries') }}</a>
                </li>
                <li class="dropdown"><a href="javascript:void(0)">{{ __('messages.Manage Leads') }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('members.leads.post.type_ad') }}"
                               title="{{ __('messages.Post New Lead') }}">{{ __('messages.Post New Lead') }}</a></li>
                        <li><a href="{{ route('members.leads.list') }}"
                               title="{{ __('messages.Manage Leads') }}">{{ __('messages.Manage Leads') }}</a></li>
                    </ul>
                </li>
                </li>
                <li class="dropdown"><a href="javascript:void(0)">{{ __('messages.Manage Account') }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('members.change.password.form') }}"
                             title="{{ __('messages.Change Password') }}">{{ __('messages.Change Password') }}</a></li>
                            <li><a href="{{ route('members.remove.account.form') }}"
                                   title="{{ __('messages.Remove Account') }}">{{ __('messages.Remove Account') }}</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</section>