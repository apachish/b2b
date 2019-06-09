<style>
    .message-box .mb-container .mb-middle {
        color: black;
    }
</style>
<div class="page-content-wrap">
    <div class="row" dir="rtl">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <strong>{{ __("messages.View") }}</strong> {{ __("messages.Member") }}</h3>
                    <ul class="panel-controls">
                        <li><a href="#" onclick="$.colorbox.close();" class="panel-remove"><span
                                        class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <img src="{{url('images/logo/'.$member->company_logo)}}"
                                             alt="{{ $member->company_name }}" width="173px"
                                             height="129px"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->last_name }}
                                </div>
                                <label class="col-md-1 control-label"><span
                                            class="fa fa-user"></span> {{ __("messages.LastName") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->first_name }}
                                </div>
                                <label class="col-md-1 control-label"><span
                                            class="fa fa-user"></span> {{ __("messages.FirstName") }}</label>

                            </div>

                            <div class="form-group">
                                <div class="col-md-3">

                                    @if($member->sellers )
                                        <ul>
                                            @foreach($member->sellers as $seller)
                                                <li>{{__('messages.'.$seller->title)}}</li>
                                            @endforeach
                                        </ul>
                                    @endif


                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.Select Seller Type") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->company_name }}
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.Company Name") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    @if($member->categories )
                                        <ul>
                                            @foreach($member->categories as $category)
                                                <li>{{$category->getCategoryTitle()}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.Deals In") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->category->getCategoryTitle() }}
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.Category") }}</label>

                            </div>
                            <div class="form-group">

                                <div class="checkbox pull-right">
                                    <label class=" col-md-9control-label">
                                        {{ __("messages.Featured Company") }}
                                        :
                                        @if($member->featured_company)
                                            <i class="fa fa-check-circle-o"></i>
                                        @else
                                            <i class="fa fa-circle-o"></i>
                                        @endif
                                    </label>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-md-9">
                                </div>
                                <label class="col-md-3 control-label">{{ __("messages.Company Details") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    {{ $member->company_details }}
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->country->getName() }}
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.Country") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->state->getName() }}
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.State") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->city->getName() }}
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.City") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->pincode }}
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.Pin Code") }}:</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-7">{{ $member->address }}
                                </div>
                                <label class="col-md-1 control-label">{{ __("messages.Address") }}:</label>

                            </div>


                            <div class="form-group">
                                <div class="col-md-3">
                                    </span>{{ $member->phone_number }}
                                </div>
                                <label class="col-md-1 control-label"><span class="fa fa-phone">  {{ __("messages.Phone Number") }}:</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    </span>
                                    {{ $member->mobile }}
                                </div>
                                <label class="col-md-1 control-label"> <span class="fa fa-mobile">  {{ __("messages.Mobile") }}:</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    {{ $member->website }}
                                </div>
                                <label class="col-md-1 control-label"><span
                                            class="fa fa-globe"></span> {{ __("messages.website") }}:</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-3">
                                    <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                </div>
                                <label class="col-md-1 control-label"><span
                                            class="fa fa-globe"></span> {{ __("messages.Email") }}:</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-9">
                                </div>
                                <label class="col-md-3 control-label">{{ __("messages.Bio") }}</label>

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    {{ $member->bio }}
                                </div>

                            </div>

                            <div class="block push-up-10 ">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>


