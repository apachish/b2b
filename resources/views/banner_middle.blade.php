@if($banner_left)
    <p class="imginnerbtn">
        @for($i=$offset;$i< $limit;$i++)
            @if(data_get($banner_middle,$i))
                <a href="{{$banner_middle[$i]->banner_url}}" title="{{$banner_middle[$i]->title}}">
                    @if(filesize(public_path('images/banners/'.$banner_middle[$i]->image)))
                        <img src="{{url('images/banners/'.$banner_middle[$i]->image)}}" alt="{{$banner_middle[$i]->title}}"
                             width="468px" height="60px"
                             class="db w100 mt10"
                        >
                    @endif
                </a>
            @endif
        @endfor
    </p>
@endif


