@if ($products_featured)

<div class="pro_scroll_area col-md-12">
    <div class="pro-row">

        <a href="javascript:void(0)" class="prev{{$index}}" title="Previous" style="display: none">
            <img src="/images/arl.png" class="abs z99 opc_eff"
                 style="left:0; top:85px;" alt="">
        </a>
        <a href="javascript:void(0)" class="next{{$index}}" title="Next" style="display: none"><img
                    src="images/arr.png" class="abs z99 opc_eff"
                    style="right:0; top:85px;" alt=""></a>
        <div class="pro_scroll_{{$index}}" data-action="{{sizeof($products_featured)>4?"scroll":"none-scroll"}}" style="direction: ltr">
            <ul class="myulx">


                @for ($i=$offset;$i<$limit;$i++)
                    @if(data_get($products_featured,$i))
                <li>
                    <div class="pro_list">
                        <div class="pro_pc">
                            <figure>
                                <a href="{{route('home.leads.show',['slug_categories'=>$products_featured[$i]->categories->first()->getCategorySlug(),'slug_leads'=> $products_featured[$i]->product_friendly_url])}}"
                                   title=""><img src="{{'images/medias/photos/'.data_get($products_featured[$i],'medias.0.media')}}"
                                                 alt="{{$products_featured[$i]->name}}}"></a></figure>
                        </div>
                        <p class="fs11 weight700 blue mt8"><a
                                    href="{{route('home.leads.show',['slug_categories'=>$products_featured[$i]->categories->first()->getCategorySlug(),'slug_leads'=> $products_featured[$i]->product_friendly_url])}}"
                                    class="uo"
                                    title= "{{$products_featured[$i]->name}}">{{short_string($products_featured[$i]->name,14)}}</a></p>
                        <p class="fs11 red weight600"><a
                                    href="{{route('home.companies.info', ['slug_companies'=>$products_featured[$i]->user->slug])}}"
                                    class="uo"
                                    title="{{$products_featured[$i]->user->fullName}}">{{short_string($products_featured[$i]->user->fullName,30)}}</a>
                        </p>
                        <p class="mt7 lht-12 fs11 black" title="{{$products_featured[$i]->description}}">{{short_string($products_featured[$i]->description,17)}}</p>
                    </div>
                </li>
                    @endif
                @endfor
            </ul>
        </div>
    </div>
</div>
@endif

