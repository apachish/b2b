@if (!empty($articles))
    @for($i=0;$i<1;$i++)
        @if(!empty($articles[$i]))
            <div class="articles col-lg-4 col-md-4 col-xs-12">
                <p class="morelink"><a href="{{route('home.articles')}}"
                                       title="View All">{{__("messages.View All")}}  </a></p>
                <h3 class="title-cat">{{__("messages.Articles")}}  </h3>
                <div class="bodyarticles">
                    <p class="art-title"><a
                                href="{{route('home.articles',['article-slug'=>$articles[$i]->slug])}}">{{$articles[$i]->title}}</a>
                    </p>
                    <p class="art-date">{{ __("messages.Posted on")}}
                        : {{$articles[$i]->updated_at}}
                        - {{__("messages.by")}} {{$articles[$i]->user->getDisplayName()}}</p>

                    <p class="art-des">{{short_string($articles[$i]->description,200)}},....</p>
                </div>
            </div>
        @endif
    @endfor
@endif