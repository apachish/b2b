@extends('layouts.main')
@section('css')
@endsection
@section('content')

    <div class="changepass">

        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{ __("messages.You are here") }} :</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home')  }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{ __("messages.Home") }}</span></a>
                </div>
                <i class="p-2 right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope=""
                     itemtype="{{ route('help') }}">
                    <span itemprop="title"><strong>{{ __("messages.Help Center") }}</strong></span>
                </div>
            </div>
        </section>

        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper listchar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent leaddetailsdiv helppage">
                        <h2 class="title-cat titleorder2">{{__("messages.Help Center")}}</h2>
                        <div>
                            <ul class="hp_cat">
                                @foreach ($category_faqs as $category_faq)
                                    <li class="licathelp">
                                        <a href="#{{\Illuminate\Support\Str::slug($category_faq->name)}}" title=""
                                           class="scroll">{{$category_faq->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                            @foreach ($category_faqs as $category_faq)
                                <h3 class="titlefaq" id="{{\Illuminate\Support\Str::slug($category_faq->name)}}">
                                    <img src="images/blt0.png" class="fl mr5 mt2" alt=""> {{$category_faq->name}}
                                    - {{$category_faq->faqs_count}}</h3>
                                <ul class="fq">
                                    @foreach ($category_faq->faqs as $faq)
                                        <li><a href="javascript:void(0)"><i
                                                        class="icon-angle-left"></i>{{$faq->question}}
                                                ?</a>
                                            <div class="faq-text">
                                                <p>{{$faq->answer}}</p>
                                                <p class="fq_help">{{ __('Does this answer help you?')}} <a
                                                            href="javascript:rate('yes','{{route('help.rate', ['id_faq' => $faq->id])}}','{{$faq->id}}');"
                                                            class="yes">{{__('messages.Yes')}}-<span
                                                                id="yes_{{$faq->id}}">{{$faq->yes}}</span></a> <a
                                                            href="javascript:rate('no','{{route('help.rate', ['id_faq' => $faq->id])}}','{{$faq->id}}');"
                                                            class="no">{{__('messages.NO')}}-<span
                                                                id="no_{{$faq->id}}">{{$faq->no}}</span></a></p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                        @endforeach
                        <!-- category ends -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                    @include('banner_left',['offset'=>0,'limit' => 5])

                    <!-- Testmonials -->
                    @include('testimonials.scroll-side')

                    <!-- End Testmonials -->
                        @include('banner_left',['offset'=>5,'limit' => 6])
                    </div>


                </div>
            </div>
    </div>
    </div>
    </section>
    </div>
    @include('banner_button')


@endsection
@section('javascript')

    <script src="/js/jquery.sidr.min.js"></script>
    <script>
        $('#responsive-menu-button').sidr({
            name: 'sidr-main',
            source: '#navigation',
            side: 'right'
        });

        function rate(rate, route, id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: route,
                type: 'POST',
                data: {rate: rate},
                success: function (response) {
                    if (response.status == 'failed' ) {
                        var message = response.meta.message;
                        if(message && (typeof message === 'object' || typeof message === 'Array') ) {

                            $.each(message, function (index, value) {
                                $.each(value, function (key, item) {
                                    toastr.error(item);

                                });

                            });
                        } else {
                            toastr.error(message);
                        }
                    }
                    if (response.status=='success') {

                        toastr.success(response.meta.message);
                        $('#yes_' + id).html(response.data.yes);
                            $('#no_' + id).html(response.data.no);

                    }
                    // console.log(data);
                    // if (data.status) {
                    //     toastr.success(data.message);
                    //     $('#yes_' + id).html(data.rateYes);
                    //     $('#no_' + id).html(data.rateNo);
                    //
                    // } else {
                    //     toastr.error(data.message);
                    // }

                }
                , error: function (jqXHR, textStatus, errorThrown) {

                    //if fails
                }
            });
        }

    </script>

@endsection

