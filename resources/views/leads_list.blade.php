<div class="{{$class}} col-lg-6 col-md-6 col-xs-12">
    <div class="leadsbody">
        <h3 class="title-leads">{{$title_lead}}<a
                    href="{{route("home.leads", ['type' => $type])}}"
                    class="allleads">{{sizeof($leads)}}</a></h3>
        <a class="morelead_buy"
           href="{{route('home.leads', ['type' => $type])}}">{{__('messages.View All')}}
        </a>
        <div style="height:120px;" class="rel o-hid">
            <div class="{{sizeof($leads) >= 10 ?$scroll_class:"" }} body-leads">
                <ul class="leads_list">
                    @foreach ($leads as $lead)
                        <li>
                            <a href="{{route('home.leads.leads',['slug_categories'=>$lead->categories->first()->slug,'slug_leads'=> $lead->id])}}"
                               title="">{{$lead->name}}<span
                                        class="date-lead">{{app()->getLocale()=='fa'?toJalali($lead->publish_at):$lead->publish_at}}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @if($type=='buy')
            <a class="more-leads {{ auth()->check()?"":"group1"}}"
               href="{{auth()->check()?route('members.post_lead.type_ad',['type_ad' => 'buy']):route('singUp') }}"

               title="{{auth()->check() ? __('messages.Post Buying Leads') : __('messages.Sign In')}}">{{__('messages.Post Buying Leads')}}</a>
        @else
            <a class="more-leads {{ auth()->check()?"":"group1"}}"
               href="{{auth()->check()?route('members.post_lead.type_ad',['type_ad' => 'sell']):route('singUp') }}"

               title="{{auth()->check() ? __('messages.Post Selling Leads') : __('messages.Sign In')}}">{{__('messages.Post Selling Leads')}}</a>
        @endif

    </div>
</div>