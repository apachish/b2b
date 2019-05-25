<div class="slider col-lg-8 col-md-8 col-xs-12">
    @if ($home_scrolling)
        <div class="fluid_container">
            <div class="fluid_dg_wrap fluid_dg_charcoal_skin fluid_container"
                 id="fluid_dg_wrap_1">
                @foreach ($home_scrolling as $j => $scroll)
                    @if(filesize(public_path('images/banners/'.$scroll->image)))

                        <div data-src="{{url('images/banners/'.$scroll->image)}}"></div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif
</div>

