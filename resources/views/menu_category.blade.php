<div id="blog-sidebar" class="col-lg-3 hidden-md  hidden-sm right-sidebar hidden-xs">
    <p class="morelink"><a href="{{route("home.categories")}}"
        title="View All">{{ __("messages.View All") }}</a></p>
    <h3 class="title-cat">{{ __("messages.Categories") }}</h3>
    <div class="wrap">
        <div class="demo-container right clear">
            <div class="dcjq-vertical-mega-menu">
                <ul id="mega-2" class="mega-menu ">
                    @if ($categories)
                    @for ($i_row = $period['start'];$i_row < $period['finish'];$i_row++)
                            @php $category = $categories[$i_row]; @endphp
                            <li class="dc-mega-li" id="menu-item-{{$i_row}}">
                        <a class="dc-mega"
                           href="#"
                           data-id="{{$category["categoryId"] }}"
                        title="{{$category['categoryName']}}"
                        alt="{{ $category['categoryName'] }}"
                        >{{app()->getLocale()=='fa'?$category->name_fa:$category->name }}</a>
                        <div class="sub-container mega" style="display: none">
                            <ul class="sub">
                                <div>
                            @foreach($category->children as $li=>$sub_category)
                            <li id=" bottom mcat menu-item-{{$i_row}}" class="mega-unit mega-hdr">
                                <a href="#" title="{{app()->getLocale()=='fa'?$sub_category->name_fa:$sub_category->name }}">
                                        {{app()->getLocale()=='fa'?$sub_category->name_fa:$sub_category->name }}
                                    </a>

                            </li>
                        @endforeach
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
</div>