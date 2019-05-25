@if($banner_button)
    <div class="bg-gray">
        <div class="wrapper ac">
            @foreach($banner_button as $button)

                <a href="{{$button->banner_url}}" title="{{$button->title}}">
                    @if(filesize(public_path('images/banners/'.$button->image)))
                        <img src="{{url('images/banners/'.$button->image)}}" alt="{{$button->title}}"
                             width="470px" height="95px" class="ml5"
                        >
                    @endif
                </a>
            @endforeach
        </div>
    </div>
@endif