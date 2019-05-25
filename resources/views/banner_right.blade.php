@if($banner_right)
    <div class="right-sideimg">
        @foreach($banner_right as $image_right)
            <a href="{{$image_right->banner_url}}" title="{{$image_right->title}}" target="_blank">
                @if(filesize(public_path('images/banners/'.$image_right->image)))

                    <img src="{{url('images/banners/'.$image_right->image)}}" alt="{{$image_right->title}}"
                         width="240px" height="240px" class="db mt10"
                    >
                @endif
            </a>
        @endforeach
    </div>
@endif
