@extends('layouts.main')

@section('content')
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
                 itemtype="{{route('home.articles')}}">
                <span itemprop="title"><strong>{{__('messages.Articles')}}</strong></span>
            </div>
            <i class="right-align icon-angle-left"></i>
            <div class="right-align divinhere" itemscope="" itemtype="">
                <span itemprop="title"><strong>{{$article->title}}</strong></span>
            </div>
        </div>
    </section>
    <!-- TREE ENDS -->
    <section class="contentinnerwrapper changepass articledetails">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12 divmaincontent">
                    <h2 class="title-cat">{{__('messages.Articles')}}</h2>
                    <div class="news_container_inr news_container_inr_art">
                        <ul>
                            <li>
                                <i class="icon-document-text"></i>
                                <div class="news_body">
                                    <p>{{$article->title}}</p>
                                    {{$article->body}}
                                </div>
                            </li>
                            <!-- list 1 -->
                        </ul>
                    </div>
                    <div class="col-lg-12 commentdiv">
                        <a href="javascript:void(0)" class="btn btn-primary"
                           onClick="$('.post_yourcomment').slideToggle('fast')">{{__('messages.Post Now')}}</a>
                        <p class="fs24 blue">{{__('messages.Comments')}}:<span
                                    id="number_all_comment"> {{$article->comments_count}}</span></p>
                        <div class="textcm">{{__('messages.Want to say something about this article?')}}</div>
                    </div>

                    <div class="post_yourcomment">
                        <p class="fs16 b mb10">{{__('messagesPost Your Comment')}}</p>
                        <input name="url" id="url_comment" type="hidden"
                               value="{{route('home.articles.comments.send',['article_slug'=>$article->article_slug])}}">
                        <input name="name" id="name_comment" type="text" class="inouttyeptext"
                               placeholder="{{__('messages.Full Name')}} *">
                        <input name="email" id="email_comment" type="text" class="inouttyeptext"
                               placeholder="{{__('messages.Email')}} *">
                        <div class="cb pb7"></div>
                        <textarea cols="100" id="text_comment" rows="3" class="inouttyeptext"
                                  placeholder="{{__('messages.Comments')}} *"></textarea>
                        <p class="mt3">
                            <input name="verification_code_article" id="verify_code_article" type="text"
                                   autocomplete="off"
                                   placeholder="{{__("messages.Enter the security code")}}"
                                   class="textbox-newsletter captcha">
                            <img src="{{captcha_src('flat')}}"
                                 class="vam ml10 reCaptcha-img" alt="" id="captchaimage"/>
                            <a href="javascript:false;" title="Change Verification Code">
                                <img src="/images/ref2.png"
                                     alt="Refresh"
                                     onclick=" document.getElementById('verification_code_newsletter').value=''; document.getElementById('verify_code_article').focus(); return true;"
                                     class="vam ml5 reCaptcha">
                            </a>


                            <span class="db i gray fs12 mt5 arial red"></span>

                            <input name="" id="sendcomment" type="button" class="btn btn-primary"
                                   value="{{__('messages.Post Now')}}!">
                        </p>
                    </div>
                    @if ($article->comments)
                    <ul class="comment_list">
                       @foreach ($article->comments as $comment)
                        <li>
                            <div class="cm_list">
                                <p class="i arial fs13">{{$comment->comment}}</p>
                                <p class="by">{{__('messages.Posted by')}}: <b
                                            class="ttu">{{$comment->name}}</b><br>
                                    {{$comment->date}} </p>
                            </div>
                            <strong>&nbsp;</strong>
                        </li>
                        @endforeach
                    </ul>
                    <p class="ac bt p15">
                        <button type="button" value="{{__('messages.loadmore')}}"
                                data-url="{{route('home.articles.comments',['article_slug'=>$article->slug])}}"
                                id="button_load">{{__('messages.loadmore')}}</button>
                        <img style="display: none" src="/images/ajax-loader.gif" width="128" height="15" alt=""
                             id="loadmore"></p>
                    @endif
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
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
        </div>
    </section>
@endsection
@section('javascript')
    <script type="text/javascript" src='{{asset('/js/article.js')}}'></script>
@endsection