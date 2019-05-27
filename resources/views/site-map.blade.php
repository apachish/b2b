@extends('layouts.main')

@section('content')
    <div class="changepass">
        <!-- breadcrumb -->

        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{ __("messages.You are here") }} :</span>
                <div class="right-align" itemscope="" itemtype="{{ route('home')  }}">
                    <a href="{{ route('home') }}" itemprop="url"><span
                                itemprop="title">{{ __("messages.Home") }}</span></a>
                </div>
                <i class="p-2 right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="{{route('home.site-map')}}">
                    <span itemprop="title"><strong>{{__('messages.siteMap')}}</strong></span>
                </div>
            </div>
        </section>
        <!-- TREE ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                <div class="row">
                    <div class="divmaincontent Advertisementwrapper sitemapwrapper">
                        <h2 class="title-cat">{{__('messages.siteMap')}}</h2>
                        @foreach ($menus as $item)
                            @if (isset($item->menus))
                                <h5 class="blue">{{$item->title}}</h5>
                                <div class="sitemap">
                                    @foreach ($item->menus as $row)
                                        @if($row)
                                            @if (!empty($row->page_url))
                                                @php $param = json_decode($row->page_url, true); @endphp
                                            @else
                                                @php $param = []; @endphp
                                            @endif
                                            @if(isset($row->type))
                                                <a href="{{$row->type =='url'?$row->base_url:(route($row->base_url,$param))}}"
                                                   title="Home">{{$row->title}}</a>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection