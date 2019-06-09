                    <div class="divcontactinfo">
                        <h3>{{__("messages.COMPANY PROFILE")}}</h3>
                        <div>
                            @php $user = auth()->user() @endphp
                            <p class="nameinfo">{{$user->company_name}}</p>
                            <p class="compnayinfo">
                            @if($user->sellers )

                                    @foreach($user->sellers as $seller)
                                        <p> - {{__('messages.'.$seller->title)}}</p>
                                    @endforeach
                                @endif
                            </p>
                            <p class="dealinfo"><b class="blue1">{{__("messages.Deals in")}}:</b>
                                @if($user->categories )
                                        @foreach($user->categories as $category)
                                            <p> - {{$category->getCategoryTitle()}}</p>
                                        @endforeach
                                    @endif
                            </p>
                            <p class="textinfo">{{$user->company_details}}</p>
                            <p class="titlecontactinfo">{{__("messages.CONTACT INFO")}}</p>
                            <p class="nameuserinfo">{{$user->getDisplayName() }}</p>
                            <p class="allinfo">{{$user->address}}<br>
                                {{$user->city->getName()}}, {{$user->country->getName()}}</p>
                            <p class="tellinfo"><b>{{__("messages.Mobile No.")}}</b> {{$user->mobile}},<br> <b>{{__("messages.Phone No.")}}</b>{{$user->phone_number}}<br>
                                <b>{{__("messages.Website:")}}</b> {{$user->website}}</p>
                        </div>
                        <p class="morelinkinfo">
                            <a href="{{ url('company/detail',['id'=>$user->id])}}" class="btn btn-dark" target="_blank">
                                {{__("messages.View Profile")}}</a>
                            <a href="{{ url('members/edit_account')}}"
                               class="btn btn-dark">{{__("messages.Update Profile")}}
                            </a></p>
                    </div>