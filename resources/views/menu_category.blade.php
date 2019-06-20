<p class="morelink"><a href="{{route("home.categories")}}"
                       title="View All">{{ __("messages.View All") }}</a></p>
<h3 class="title-cat">{{ __("messages.Categories") }}</h3>
<div class="wrap">
    <div class="demo-container right clear">
        <div class="dcjq-vertical-mega-menu">
            <ul id="mega-2" class="mega-menu ">
                @if ($categories)
                    @for ($i_row = $period['start'];$i_row < $period['finish'];$i_row++)
                        @php
                            $category = data_get($categories,$i_row);

                        @endphp
                        @if(!$category)
                            @break
                            @endif
                        <li class="dc-mega-li" id="menu-item-{{$i_row}}">
                            <a class="dc-mega"
                               href="{{route('home.categories',["slug_categories" => $category->getCategorySlug()]) }}"
                               data-id="{{$category->id }}"
                               title=" {{app()->getLocale()=='fa'?$category->name_fa:$category->name }}"
                               alt=" {{app()->getLocale()=='fa'?$category->name_fa:$category->name }}"
                            >
                                {{app()->getLocale()=='fa'?$category->name_fa:$category->name }}
                            </a>
                            <div class="sub-container mega" style="display: none">
                                <ul class="sub">
                                    <div>
                                        @if($category->children)
                                            @php
                                            $li =0;
                                            @endphp
                                            @for($j=0;$j<9;$j++)
                                                @php
                                                    $sub_category = data_get($category,'children.'.$j);
                                                @endphp
                                                @if(!$sub_category)
                                                    @break
                                                @endif
                                                <li id="menu-item-{{$i_row}}-{{$li}}" class="mega-unit mega-hdr">
                                                    <h5>
                                                        <a
                                                                href="{{route('home.categories',['slug_categories'=>$sub_category->getCategorySlug()]) }}"
                                                           title="{{app()->getLocale()=='fa'?$sub_category->name_fa:$sub_category->name }}">
                                                            {{app()->getLocale()=='fa'?$sub_category->name_fa:$sub_category->name }}
                                                        </a>
                                                    </h5>

                                                    @if($j%3 == 0)
                                                        @php $li++; @endphp
                                                        <ul>
                                                    @endif
                                                            @for($i=0;$i<5 ;$i++)
                                                                @php
                                                                    $sub_sub_cat = data_get($sub_category,'children.'.$i);
                                                                @endphp
                                                                @if(!$sub_sub_cat)
                                                                    <div style="height: 125px"></div>
                                                                    @break
                                                                @endif
                                                                <li class="menu-item-{{$i_row}}" >
                                                                    <a
                                                                            href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$sub_sub_cat->slug_fa:$sub_sub_cat->slug]) }}"
                                                                       title="{{app()->getLocale()=='fa'?$sub_sub_cat->name_fa:$sub_sub_cat->name }}">
                                                                        {{app()->getLocale()=='fa'?$sub_sub_cat->name_fa:$sub_sub_cat->name }}
                                                                    </a>
                                                                </li>
                                                            @endfor
                                                            @if($j==2 || $j==5 || $j==8)
                                                                </ul>
                                                            @endif
                                                </li>
                                            @endfor

                                                @if ($categories_images)
                                                    @php $im=0;@endphp
                                                    @foreach ($categories_images as  $images)
                                                        @if($category->_lft <= $images->id && $category->_rgt >= $images->id)

                                                            @if($im > 2)
                                                                @break
                                                            @endif
                                                            @if ($im == 0)
                                                                <li id="menu-item-{{$i_row}}-4" class="mega-unit mega-hdr">
                                                                    <ul>
                                                                        <li class="menu-item-{{$i_row}}">
                                                                            <a class="bg-image text-center full"
                                                                               href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$images->slug_fa:$images->slug]) }}"
                                                                               style="background-image: url('{{url('images/category/'.$images->image)}}'); background-repeat: no-repeat;">
                                                                                <span class="title">{{app()->getLocale()=='fa'?$images->name_fa:$images->name}}</span>
                                                                            </a>
                                                                        </li>

                                                                    </ul>


                                                                </li>
                                                            @elseif($im==1 || $im==2)
                                                                <li id="menu-item-{{$i_row}}-5" class="mega-unit mega-hdr">
                                                                    <ul>
                                                                        <li class="menu-item-{{$i_row}}">

                                                                            <a class="bg-image text-center {{$im==1?'first':'second'}}"
                                                                               href="{{route('home.categories',['slug'=>app()->getLocale()=='fa'?$images->slug_fa:$images->slug]) }}"
                                                                               style="background-image: url('{{url('images/category/'.$images->image)}}'); background-repeat: no-repeat;">
                                                                                <span class="title">{{app()->getLocale()=='fa'?$images->name_fa:$images->name}}</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            @endif
                                                                @php $im++;@endphp

                                                    @endif

                                                @endforeach
                                                @endif
                                        @endif
                                    </div>
                                </ul>
                            </div>
                        </li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>
</div>
