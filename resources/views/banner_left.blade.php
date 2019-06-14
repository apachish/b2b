@if($banner_left)
    <div class="imgleftsidebar">
        @for($i=$offset;$i< $limit;$i++)
            @if(data_get($banner_left,$i))
                <a href="{{$banner_left[$i]->banner_url}}" title="{{$banner_left[$i]->title}}">
                    @if(filesize(public_path('images/banners/'.$banner_left[$i]->image)))
                        <img src="{{url('images/banners/'.$banner_left[$i]->image)}}" alt="{{$banner_left[$i]->title}}"
                             width="200px" height="{{($i+1)==$limit?($limit-$offset==2?'200px':'240px'):'90px'}}"
                             class="db w100 mt10"
                        >
                    @endif
                </a>
            @endif
        @endfor
    </div>
@endif
