@php $user = auth()->user() @endphp

<div class="topdiv-chngpass">
    <p class="nameuser">{{$user->username}}</p>
    <p class="leadslink">
        <a href="{{route('members.leads.post.type_ad',['type_ad' => 'buy'])}}"
           class="btnpost">{{__('messages.Post a Lead')}}</a>
        <a href="{{route('members.edit_account')}}"
           class="btnupdate">{{__('messages.Updated Company Profile')}}</a></p>
    <p class="addressuser">
        @if ($user->phone_number || $user->mobile)
            {{__('messages.Contact No')}}
            {{$user->phone_number}}
            @if ($user->phone_number && $user->mobile)
                -
            @endif
            {{$user->mobile}}
            /
        @endif
        {{$user->city?$user->city->getName().",":""}}
        {{$user->state?$user->state->getName().",":""}}
        {{$user->country?$user->country->getName().",":""}}
        {{$user->address}}
        <b class="ml5 mr5 gray">/</b>{{__('messages.Last Login')}}
        : {{(app()->getLocale()=='fa' && $user->last_login_date)?toJalali($user->last_login_date):$user->last_login_date}}
    </p>
    <p class="logout">
        <a href="{{ route('logout') }}" title="{{__('messages.Logout')}}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="uo">
            <i class="icon-power-off"></i>{{ __('messages.Logout') }}
        </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </p>
</div>