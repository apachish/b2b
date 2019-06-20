<div class="categories-home">
    <p class="morelink"><a href="{{route('home.categories')}}" title="{{ __("messages.View All") }}"
                           class="allcat">{{ __("messages.View All") }}</a></p>
    <h3 class="title-cat">{{__("messages.Category") }}</h3>
    @if ($categories)
        @foreach ($categories as $i => $category)
        @if ($i == 6)
            @break

        @endif
        @if ($i % 3 == 0)
            <div>
                @endif

                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 cat-list-home">
                    <a href="{{route("home.categories", ["slug_categories" => $category->getCategorySlug()])}}"
                       title="{{ app()->getLocale()=='fa'?$category->name_fa:$category->name}}"
                       class="title-cat">{{ app()->getLocale()=='fa'?$category->name_fa:$category->name }}</a>
                    <div class="cat_box">
                        <a class="cat-img"
                           href="{{route("home.categories",["slug_categories" => $category->getCategorySlug()])}}"
                           title="{{ $category->title}}">
                            <img src="{{url('images/category/'.$category->image)}}"
                                 width="173" height="80"
                                 alt="{{app()->getLocale()=='fa'?$category->name_fa:$category->name}}">
                        </a>
                        <ul class="cat_links">
                            @foreach ($category->children as $s=>$subcategory)
                                @if ($s == 4)
                                    @break
                                @endif

                                <li class="cat-list"><a
                                            href="#"
                                            title="{{app()->getLocale()=='fa'?$subcategory->name_fa:$subcategory->name}}">
                                        {{app()->getLocale()=='fa'?$subcategory->name_fa:$subcategory->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if ($i % 3 == 2)
            </div>
        @endif
        @endforeach
    @endif
</div>
