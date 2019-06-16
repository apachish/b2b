<h3 class="title-cat">{{ __("messages.Featured Products") }}</h3>
<?php
//$url_append = "";
//if($this->category){
//    $url_append = "?category=".$this->category;
//}
//
//if($this->type_featured){
//    if($url_append){
//        $url_append .="&";
//    }else{
//        $url_append .="?";
//
//    }
//    $url_append .= "featured=".$this->type_featured;
//}
//?>
<p class="morelink"><a href="{{ route('home.featured') }}" title="View All"
                       class="uo">{{__("messages.View All") }}</a></p>
<ul class="listfeatureleft">
    @if (!empty($featureds))

        @foreach ($featureds as $featured)
            <li class="bb1">
                <div class="pro_list auto mb10 mt10">
                    @if ( $featured->ad_type == 'sell')

                        <div class="pro_pc">

                            <figure>
                                <a href="{{route('home.leads.show',['slug_categories'=>$featured->categories->first()->getCategorySlug(),'slug_leads'=> $featured->product_friendly_url])}}"
                                   title="">
                                    <img src="{{url('/images/medias/photos/'.$featured->medias->first()->media)}}"
                                         alt="" width="100px" height="100px">
                                </a></figure>
                        </div>
                    @endif

                    <p class="pro-list-title"><a
                                href="{{route('home.leads.show',['slug_categories'=>$featured->categories->first()->getCategorySlug(),'slug_leads'=> $featured->product_friendly_url])}}"
                                class="uo" title="">{{$featured->name}}</a></p>
                    <p class="pro-detials">
                        @if ( $featured->ad_type == 'sell' || $membership)
                            <a href="{{ route('home.companies.info', ['slug_companies'=>$featured->user->slug])}}"
                               class="uo"
                               title="">{{$featured->user->getCompanyName()}}</a>

                        @elseif ($featured->ad_type == 'buy')
                            {{__('messages.Buyer') . "  " . $featured->first_name }}
                        @endif
                    </p>
                    <p class="pro-list-des">{{$featured->description}}</p>
                </div>
            </li>
        @endforeach
    @endif
</ul>
