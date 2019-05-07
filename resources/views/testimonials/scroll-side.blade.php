<div class="testimonial">
    <p class="morelink"><a class="more-testimonial" href="{{route('testimonials')}}"
                           title="<?= __('View All') ?>"
                           class="uo"><?= __('View All') ?></a></p>
    <h3 class="title-cat"><?= __('Testimonials') ?></h3>
    <div class="t_scroll col-lg-12">
        <div class="testimonial_scroll">
            <ul>
                @foreach ($testimonials as $testimonial)
                <li>
                    <div class="inner">
                        <p class="text-testimonial">{{substr($testimonial->description, 0, 100)}}
                            <b class="blue1">...<a
                                        href="{{route('testimonials/details', ['id' => $testimonial->id])}}"
                                        class="uo"
                                        title="more"><?= __('more') ?></a></b>
                        </p>
                        <p class="name-testimonial">{{$testimonial->poster_name}}</p>
                        <p class="from-testimonial">{{$testimonial->company}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
