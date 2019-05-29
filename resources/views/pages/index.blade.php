@extends('layouts.main')
@section('css')
    <style>
        .ajax-load {
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="changepass testimonialbody">
        <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{__('messages.You are here')}} :</span>
                <div class="right-align" itemscope="" itemtype="{{route('home')}}">
                    <a href="{{route('home')}}" itemprop="url"><span
                                itemprop="title">{{__('messages.Home')}}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope=""
                     itemtype="{{route('home.pages')}}">
                    <span itemprop="title"><strong>{{__('messages.Pages')}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->

        <!-- TREE ENDS -->
        <!-- MIDDLE STARTS -->
        <section class="contentinnerwrapper testmonialwrapper articlemainwrapper">
            <?php
            //echo form_open("","name='article_form' id='article_form'");
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent articlewrapper">
                        <h2 class="title-cat">{{__('messages.Pages')}}</h2>
                        <form id="article_form" class="article_form">
                            <div class="ordering">
                                <div class="one">{{__('messages.Showing')}}
                                    <select name="order_by" class="p2" onchange="this.form.submit()">

                                        <option {{$order_by=='desc'?'selected':''}} value="desc">{{__('messages.Recent First')}}</option>

                                        <option {{$order_by=='asc'?'selected':''}} value="asc">{{__('messages.Oldest First')}}</option>

                                    </select>
                                </div>

                                <div class="cb"></div>
                            </div>

                        </form>
                        <div id="more_data">
                            <!-- listing -->

                            @if ($pages)

                                <div class="news_container_inr news_container_inr_art mp_cont bt news_container_inr">
                                    <ul id="pages-data" onscroll="scrolled(this)">
                                        @foreach ($pages as $page)
                                            <li class="post">
                                                <i class="icon-comments icon-document-text"></i>
                                                <div class="news_text">
                                                    <p class="title"><a
                                                                href="{{route('home.pages',['page_slug'=>$page->slug])}}"
                                                                class="uo">{{$page->name}}</a></p>
                                                    <p class="date">{{__('messages.Posted on')}}
                                                        : {{toJalali($page->created_at)}}</p>
                                                    <p class="msgtestmonial">
                                                    <div class="row">
                                                        @if(!empty($page->image))
                                                            <div class="col-lg-3">
                                                                <img src="{{url('images/pages/'.$page->image)}}"
                                                                     alt="{{$page->title}}" width="173px"
                                                                     height="129px"/>
                                                            </div>
                                                        @endif
                                                        <div class="col-lg-9">
                                                            {!!$page->short_description!!}

                                                            <b class="blue1"><a
                                                                        href="{{route('home.pages',['page_slug'=>$page->slug])}}"
                                                                        class="uu">{{__('messages.read the rest')}}</a>
                                                            </b>
                                                        </div>
                                                    </div>

                                                    </p>

                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div id="pagination">
                                        <a href="{{route('home.pages')."?page=2"}}" class="prev">prev</a>
                                        <a href="{{route('home.pages')."?page=1"}}" class="next">next</a>
                                    </div>
                                </div>

                            @else
                                <div class="red ac">{{__('messages.No record found')}}</div>
                        @endif
                        <!-- listing -->
                        </div>


                    </div>
                    <!-- LEFT ENDS -->
                    <!-- RIGHT ENDS -->
                    <div class="cb"></div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
                        <!-- Testmonials -->
                    @include('banner_left',['offset'=>0,'limit' => 5])

                    <!-- Testmonials -->
                    @include('testimonials.scroll-side')

                    <!-- End Testmonials -->
                    @include('banner_left',['offset'=>5,'limit' => 6])
                    <!-- End Testmonials -->

                    </div>
                </div>
            </div>
        </section>
    </div>



@endsection
@section('javascript')
    <script src="/js/jquery-ias.min.js"></script>

    <script>
        var page = 1;
        var ias = jQuery.ias({
            container:  '#pages-data',
            item:       '.post',
            pagination: '#pagination',
            next:       '#pagination a.next'
        });

        ias.extension(new IASSpinnerExtension());
        ias.extension(new IASTriggerExtension({offset: 2}));
        ias.extension(new IASNoneLeftExtension({text: "You reached the end"}));
        ias.extension(new IASPagingExtension());
        ias.extension(new IASHistoryExtension({prev: '#pagination a.prev'}));
        // $(document).ready(function () {
        //     $('#last-li').on('fadeIn' ,function() {
        //         // "last" focus guard got focus: set focus to the first field
        //         alert(2);
        //     });
        // })

        console.log($('#last_li').outerHeight())
        console.log($(window).scrollTop())
        // $(window).scroll(function() {
        //     console.log($(window).scrollTop());
        //     if($(window).scrollTop() >= $('#pages-data').height()) {
        //         page++;console.log(page);
        //         loadMoreData(page);
        //     }
        // });


        function loadMoreData(page) {
            $.ajax(
                {
                    url: '{{route('home.pages')}}?page=' + page,
                    type: "get",
                    beforeSend: function () {
                        $('.ajax-load').show();
                    }
                })
                .done(function (data) {
                    if (data.pages == " ") {
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    var html = "";
                    $.each(data, function (index, value) {
                        console.log(value);
                        html = "<li>";
                        html += "  <i class=\"icon-comments icon-document-text\"></i>";
                        html += "  <div class=\"news_text\">";
                        html += "      <p class=\"title\"><a";
                        html += "                  href='home.pages" + value.slug + "'";
                        html += "                  class=\"uo\">value.title</a></p>";
                        html += "      <p class=\"date\">{{__('messages.Posted on')}}";
                        html += "          : value.created_at</p>";
                        html += "      <p class=\"msgtestmonial\">";
                        html += "      <div class=\"row\">";
                        html += "              <div class=\"col-lg-3\">";
                        html += "                  <img src='images/pages/".value.image + "'";
                        html += "                       alt='" + value.title + "' width='173px'";
                        html += "                       height='129px'>";
                        html += "              </div>";
                        html += "          <div class=\"col-lg-9\">";
                        html += value.description;
                        html += "              <b class=\"blue1\"><a href=";
                        html += "/pages/" + value.slug;
                        html += "class='uu'>{{__('messages.read the rest')}}</a>";
                        html += "              </b>";
                        html += "          </div>";
                        html += "      </div>";
                        html += "      </p>";
                        html += "      <p class='cmm_text'>{{__('messages.Comments')}}: <a ";
                        html += "                  href='/pages/" + value.slug + "'";
                        html += "                  class='b uu ml5'>" + value.comments_count + "</a></p>";
                        html += "  </div>";
                        html += "</li>";
                    })
                    $("#pages-data").append(html);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
        }
    </script>
@endsection