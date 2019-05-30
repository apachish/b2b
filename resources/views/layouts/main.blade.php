<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>B2B</title>
    <link href="/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="/css/win.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/conditional_win.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/main.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/style.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" id="my_stylesheet"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="/css/master.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/toastr.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/jquery.sidr.light.min.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/colorbox.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/dcverticalmegamenu.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/fluid_dg.css" media="screen" rel="stylesheet" type="text/css">
    <link href="/css/countrySelect.css" media="screen" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/select2/select2.css">
    @yield('css')

    <script src="/js/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="/js/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
            crossorigin="anonymous"></script>
    <script src="/js/jquery-1.11.1.js"></script>
    <script src='/js/jquery-ui.min.js'></script>
    <script src="/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/toastr.js"></script>

    <script type="text/javascript" src="/js/jsapi.js"></script>

    <script type='text/javascript' src='/js/jquery.hoverIntent.minified.js'></script>
    <script type='text/javascript' src='/js/jquery.dcverticalmegamenu.1.3.js'></script>
    <script type="text/javascript" src="/select2/select2.min.js"></script>
    @if ( app()->getLocale() == 'en')

        <link href="/css/master-en.css" media="screen" rel="stylesheet" type="text/css">
        <script type='text/javascript' src='/js/jquery.dcverticalmegamenu.1.3-en.js'></script>

    @elseif ( app()->getLocale() == 'fa' )


    @endif
</head>
<body lang="{{ app()->getLocale() }}" id="demo-content">
<header><!-- #BeginLibraryItem "/Library/top1.lbi" -->
    <div class="t_1">
        <div class="topnav navbar-light bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 right">
                        <ul class="nav">

                            @if (Route::has('login'))

                                @auth
                                    @if(data_get($menus,'header_1'))
                                        <li class="dropdown">
                                            <a href="{{ !empty($menus['header_1']['url']) ? url($menus['header_1']['url']) : "" }}"
                                               title="{{data_get($menus,'header_1.title')}}">{{ auth()->user()->getDisplayName() ." ". __('messages.Welcome')}}
                                            </a>
                                            <ul class="dropdown-menu">
                                                @if (!empty($menus['header_1']['menus']))
                                                    @foreach ($menus['header_1']['menus'] as $menu)

                                                        @if (!empty($menu->page_url))
                                                            @php $param = json_decode($menu->page_url, true); @endphp

                                                        @else
                                                            @php $param = []; @endphp
                                                        @endif

                                                        <li>
                                                            <a href="{{$menu->base_url?route($menu->base_url, $param):""}}"
                                                               title="{{$menu->title }}"
                                                               class="{{data_get($menu,'class')}}"
                                                            >
                                                                {{$menu->title}}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    <li>
                                        <a  href="{{ route('logout') }}" title="{{__('messages.Logout')}}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                            {{ __('messages.Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>

                                @else
                                    <li>
                                        <a href="{{ route('singIn') }}"
                                           title="{{__('messages.Sign In')}}"
                                           class="group1 sing_up">{{__('messages.Sign In')}}
                                        </a>
                                    </li>
                                    @if (Route::has('singUp'))
                                        <li>
                                            <a href="{{ route('singUp') }}"
                                               class="group1 sing_up" title="{{__("messages.Join Free")}}">
                                                {{__("messages.Join Free")}}
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            @endif

                        </ul>
                        <!-- Begin TranslateThis Button -->
                        <div id="translate-this" data-language="{{app()->getLocale()}}">
                            <!--                            <a href="http://translateth.is/" class="translate-this-button"></a>-->

                            @switch ( app()->getLocale())
                                @case('en')
                                <a href='#' id='fa_IR' class='changelocal' title='{{__('messages.Farsi')}}'><img
                                            src='/images/flag/fa.png'></a>
                                @break
                                @case('fa')
                                <a href='#' id='en_US' class='changelocal' title='{{__('messages.English')}}'> <img
                                            src='/images/flag/en.png'></a>
                                @break
                            @endswitch
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 left">
                        <ul class="nav">
                            @if(data_get($menus,'header_2'))
                                <li class="dropdown">
                                    <a href="">{{data_get($menus,'header_2.title')}}</a>
                                    <ul class="dropdown-menu">
                                        @if (!empty($menus['header_2']['menus']))
                                            @foreach ($menus['header_2']['menus'] as $menu)

                                                @if (!empty($menu->page_url))
                                                    @php $param = json_decode($menu->page_url, true); @endphp

                                                @else
                                                    @php $param = []; @endphp
                                                @endif
                                                <li>
                                                    <a href="{{$menu->base_url?route($menu->base_url, $param):""}}"
                                                       title="{{$menu->title }}"
                                                       class="{{data_get($menu,'class')}}"
                                                    >
                                                        {{$menu->title}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if(data_get($menus,'header_3'))

                                <li class="dropdown"><a href="">{{data_get($menus,'header_3.title')}}</a>
                                    <ul class="dropdown-menu">
                                        @if (!empty($menus['header_3']['menus']))
                                            @foreach ($menus['header_3']['menus'] as $menu)

                                                @if (!empty($menu->page_url))
                                                    @php $param = json_decode($menu->page_url, true); @endphp

                                                @else
                                                    @php $param = []; @endphp
                                                @endif

                                                <li>
                                                    <a href="{{$menu->base_url?route($menu->base_url, $param):""}}"
                                                       title="{{$menu->title }}"
                                                       class="{{data_get($menu,'class')}}"
                                                    >
                                                        {{$menu->title}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (Route::has('help'))
                                <li><a href="{{route('help')}}">{{__("messages.Help Center")}}</a></li>
                            @endif
                            @if (Route::has('advertisement'))
                                <li>
                                    <a href="{{route('advertisement')}}">{{__("messages.Advertise with Us")}}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="cb"></div>
                </div>
            </div>
        </div>
    </div><!-- #EndLibraryItem --><!-- top 1 --><!-- #BeginLibraryItem "/Library/top2.lbi" -->
    <div class="t_2 trans_eff btm-header">
        <div class="row">
            <div class="container">

                <div class="col-lg-3 col-md-2 col-xs-12 col-sm-2 logo_area">
                    <a href="{{route('home')}}"><img src="/images/btob.png" alt=""></a>
                </div>
                <div class="col-lg-9 col-md-10 col-xs-12 col-sm-10 searchareadiv">


                    <!-- Begin TranslateThis Button -->

                    <!-- End TranslateThis Button -->

                    <div class="translatediv">
                        @if($telephone)
                            <p class="ph_number">{{__('messages.Contact Us')}}:
                                <b>{{$telephone}}</b></p>
                        @endif
                    </div>
                    <div class="topsearch">
                        <div class="sendquery">
                            @if (Route::has('home.contact_us'))
                                <a href="{{route('home.contact_us')}}" class="sendquerybtn"
                                   title="{{__('messages.Send Your Query')}}">{{__('messages.Send Your Query')}}</a>
                            @endif
                        </div>
                        @if (Route::has('search'))
                            <form class="formsearch" action="{{route('search')}}" method="get">

                                <div class="srch_area  form-row align-items-center">
                                    <div class="txtsearchtop">
                                        <label class="sr-only" for="inlineFormInput">{{__("messages.Name")}}?></label>
                                        <input autocomplete="off" type="text" name="search"
                                               class=" searchinput form-control mb-2 mb-sm-0" size="30"
                                               onkeyup="showResult(this.value)"
                                               placeholder="{{__("messages.Enter your Keyword")}}...." value="">
                                        <div id="livesearch"></div>

                                    </div>
                                    <select name="type" class="select_dg custom-select mb-2 mr-sm-2 mb-sm-0" id="type">
                                    <!--<option value=""><?//=__("messages.Filter")?></option>-->
                                        <option value="buyselllead">{{__("messages.Products")}}</option>
                                        <option value="companies">{{__("messages.Companies")}}</option>
                                        <option value="buylead"> {{__("messages.Buy Offers")}}</option>
                                        <option value="selllead"> {{__("messages.Sell Offers")}}</option>
                                    </select>
                                </div>
                                <div class="btnsearchtop">
                                    <input  name="" type="submit" class="srch_btn trans_eff btn serachbtn" value="&nbsp;">
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="wrappermenu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
            $class="class='act'";
    $class_active="active";

    $route_current = $routeName;
        @endphp
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="container">
                <ul class="navbar-nav">
                    @if (!empty($menus['main_menu']['menus']))
                        @foreach ($menus['main_menu']['menus'] as $menu)
                            @php $active_route = false; @endphp
                            @if (!empty($menu->page_url))
                                @php $param = json_decode($menu->page_url, true); @endphp

                            @else
                                @php $param = []; @endphp
                            @endif
                            @if(!empty($menu['base_url']) && $menu['base_url']==$route_current)
                                @php $active_route = true;@endphp
                            @elseif(!empty($menu['base_url']) && $menu['base_url']!= 'home')
                                @php $current = explode('/',$route_current);
                            $menu_current = explode('/',$menu['base_url']);
                            $array = $menu_current+$current;
                            $path= implode('/',$array);@endphp
                                @if($route_current==$path)
                                    @php $active_route = true;@endphp
                                @endif
                            @endif
                            <li class="nav-item {{ $active_route ? $class_active : ''}}">
                                <a class="nav-link" href="{{route($menu->base_url,$param)}} "
                                   title="{{$menu->title}}" class="{{$menu->class}}"

                                >{{$menu->title}}
                                </a>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</section>

<!-- TOP ENDS -->
@yield('content')


<!-- #BeginLibraryItem "/Library/footer.lbi" -->
<footer>
    <div class="container">
        <div class="col-lg-2 col-md-6 col-xs-12">
            <ul class="footerlink">
                @if (!empty($menus['footer_1']['menus']))


                    <h6>{{data_get($menus,'footer_1.title')}}</h6>
                    @foreach($menus['footer_1']['menus'] as $menu)

                        @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif
                        @php $metaData = json_decode($menu['metaData'],true);
                $url = !empty($metaData['url'])?$metaData['url']:'/';@endphp
                        @if($menu['permission']=='customer' && !$this->identity())
                            @php $href = route('user/email', array("title" => __('messages.Sign In'))); @endphp
                        @else
                            @php $href = route($menu['base_url'], $param); @endphp
                        @endif
                        @if(!empty($menu['permission']) && auth()->user())
                            @php $menu['class'] = str_replace('group1','',$menu['class']);@endphp
                        @endif

                        <li>
                            <a href="{{$href}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            >{{$menu->title}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="col-lg-2 col-md-6 col-xs-12">
            <ul class="footerlink">
                @if (!empty($menus['footer_2']['menus']))


                    <h6>{{data_get($menus,'footer_2.title')}}</h6>
                    @foreach ($menus['footer_2']['menus'] as $menu)

                        @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif
                        @php $metaData = json_decode($menu['metaData'],true);
                $url = !empty($metaData['url'])?$metaData['url']:'/';@endphp
                        @if($menu['permission']=='customer' && !auth()->user())
                            @php $href = route('user/email', array("title" => __('messages.Sign In'))); @endphp
                        @else
                            @php $href = route($menu['base_url'], $param); @endphp
                        @endif
                        @if(!empty($menu['permission']) && auth()->user())
                            @php $menu['class'] = str_replace('group1','',$menu['class']);@endphp
                        @endif

                        <li>
                            <a href="{{$href}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            >{{$menu->title}}
                            </a>
                        </li>
                    @endforeach
                @endif

            </ul>
            <ul class="footerlink">
                @if (!empty($menus['footer_3']['menus']))

                    <h6>{{data_get($menus,'footer_3.title')}}</h6>
                    @foreach ($menus['footer_3']['menus'] as $menu)

                        @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif
                        @php $metaData = json_decode($menu['metaData'],true);
                $url = !empty($metaData['url'])?$metaData['url']:'/';@endphp
                        @if($menu['permission']=='customer' && !auth()->user())
                            @php $href = route('user/email', array("title" => __('messages.Sign In'))); @endphp
                        @else
                            @php $href = route($menu['base_url'], $param); @endphp
                        @endif
                        @if(!empty($menu['permission']) && auth()->user())
                            @php $menu['class'] = str_replace('group1','',$menu['class']);@endphp
                        @endif

                        <li>
                            <a href="{{$href}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            >{{$menu->title}}
                            </a>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>
        <div class="col-lg-2 hidden-md col-xs-12">
            <ul class="footerlink">
                @if (!empty($menus['footer_4']['menus']))


                    <h6>{{data_get($menus,'footer_4.title')}}</h6>
                    @foreach ($menus['footer_4']['menus'] as $menu)

                        @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif
                        @php $metaData = json_decode($menu['metaData'],true);
                $url = !empty($metaData['url'])?$metaData['url']:'/';@endphp
                        @if($menu['permission']=='customer' && !auth()->user())
                            @php $href = route('user/email', array("title" => __('messages.Sign In'))); @endphp
                        @else
                            @php $href = route($menu['base_url'], $param); @endphp
                        @endif
                        @if(!empty($menu['permission']) && auth()->user())
                            @php $menu['class'] = str_replace('group1','',$menu['class']);@endphp
                        @endif

                        <li>
                            <a href="{{$href}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            >{{$menu->title}}
                            </a>
                        </li>
                    @endforeach
                @endif

            </ul>
            <ul class="footerlink">
                @if (!empty($menus['footer_5']['menus']))


                    <h6>{{data_get($menus,'footer_5.title')}}</h6>
                    @foreach ($menus['footer_5']['menus'] as $menu)

                        @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif
                        @php $metaData = json_decode($menu['metaData'],true);
                $url = !empty($metaData['url'])?$metaData['url']:'/';@endphp
                        @if($menu['permission']=='customer' && !auth()->user())
                            @php $href = route('user/email', array("title" => __('messages.Sign In'))); @endphp
                        @else
                            @php $href = route($menu['base_url'], $param); @endphp
                        @endif
                        @if(!empty($menu['permission']) && auth()->user())
                            @php $menu['class'] = str_replace('group1','',$menu['class']);@endphp
                        @endif

                        <li>
                            <a href="{{$href}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            >{{$menu->title}}
                            </a>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>
        <div class="col-lg-4 col-md-8 col-xs-12">
            <ul class="footerlink footerlink2">
                @if (!empty($menus['footer_6']['menus']))


                    <h6>{{data_get($menus,'footer_6.title')}}</h6>
                    @foreach ($menus['footer_6']['menus'] as $menu)

                    @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif

                        <li>
                            <a href="{{route($menu->base_url,$param)}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            >{{$menu->title}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-xs-12">
            <ul class="footerlink">
                @if (!empty($menus['footer_7']['menus']))


                    <h6>{{data_get($menus,'footer_7.title')}}</h6>
                    @foreach ($menus['footer_7']['menus'] as $menu)

                        @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif
                        @php $metaData = json_decode($menu['metaData'],true);
                $url = !empty($metaData['url'])?$metaData['url']:'/';@endphp
                        @if($menu['permission']=='customer' && !auth()->user())
                            @php $href = route('user/email', array("title" => __('messages.Sign In'))); @endphp
                        @else
                            @php $href = route($menu['base_url'], $param); @endphp
                        @endif
                        @if(!empty($menu['permission']) && auth()->user())
                            @php $menu['class'] = str_replace('group1','',$menu['class']);@endphp
                        @endif

                        <li>
                            <a href="{{$href}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            >{{$menu->title}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>

        </div>
    </div>
</footer>
<section class="btmfooter clearfix">
    <div class="container">
        @if (!empty($menus['network']))

            <div class="nw_list hidden-md hidden-xs hidden-sm">
                <p class="titlefooterlink">{{data_get($menus,'network.title')}}</p>
                <ul>
                    @foreach ($menus['network']['menus'] as $menu)

                        @if($menu->page_url)
                            @php $param = json_decode($menu->page_url,true); @endphp
                        @else
                            @php $param = [];@endphp
                        @endif
                        @php $metaData = json_decode($menu['metaData'],true);
                $url = !empty($metaData['url'])?$metaData['url']:'/';@endphp
                        @if($menu['permission']=='customer' && !auth()->user())
                            @php $href = route('user/email', array("title" => __('messages.Sign In'))); @endphp
                        @else
                            @php $href = $menu['type']=='url'?$menu['baseUrl']:route($menu['base_url'], $param); @endphp
                        @endif
                        @if(!empty($menu['permission']) && auth()->user())
                            @php $menu['class'] = str_replace('group1','',$menu['class']);@endphp
                        @endif
                        <li class="col-lg-2 col-sm-2 col-xs-12 col-md-2">
                            <a href="{{$href}}"
                               title="{{$menu->title}}" class="{{data_get($menu,'class')}}"

                            ><span class="title">{{$menu->title}}</span>
                            </a>
                        </li>

                    @endforeach
                    @else
                        <div class='nw_list_clear'></div>
                    @endif
                </ul>
            </div>



            <div class="col-lg-3 col-md-4 col-sm-7 col-xs-12">
                <ul class="social">
                    @if(!empty($social['facebook']))
                        <li><a href="{{ $social['facebook']}}" class="icon-facebook" target="_blank"></a></li>
                    @endif
                    @if(!empty($social['twitter']))

                        <li><a href="{{ $social['twitter']}}" class="icon-twitter" target="_blank"></a></li>
                    @endif
                    @if(!empty($social['plus']))

                        <li><a href="{{ $social['plus']}}" class="icon-social-google" target="_blank"></a></li>
                    @endif
                    @if(!empty($social['linkedin']))

                        <li><a href="{{ $social['linkedin']}}" class="icon-social-linkedin" target="_blank"></a></li>
                    @endif
                    @if(!empty($social['youtube']))

                        <li><a href="{{ $social['youtube']}}" class="icon-youtube" target="_blank"></a></li>
                    @endif
                    @if(!empty($social['telegram']))

                        <li><a href="{{ $social['telegram']}}" class="icon-paper-plane" target="_blank"></a></li>
                    @endif
                    @if(!empty($social['instagram']))

                        <li><a href="{{ $social['instagram']}}" class="icon-social-instagram" target="_blank"></a></li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                @if (Route::has('refer-friend'))
                    <a href="{{route('refer-friend')}}. " ?link=" .Request::url() . "
                       &text="  {{base64_encode(__("messages.Site Buysellyab"))}} "
                       class="footera ajax group1 refer_friend">
                        <img src="/images/b_icon1.png" alt="">{{__("messages.Refer to friend")}}</a>

                @endif
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p class="copyright">{{__("messages.Copyright")}}) © {{date('Y')}} <b
                            class="black weight600">{{__($_SERVER['HTTP_HOST'])}}</b> {{__('messages.. All rights reserved.')}}
                    <br>
                    {{__('messages.Developed and Managed by')}} <a href="https://www.apachish.com" target="_blank"
                                                                   title="apachish.com"
                                                                   class="uo">{{__("messages.Oxin")}})</a></p>
            </div>
    </div>
</section>
<p id="back-top" style="display: block;"><a href="#top"><span>&nbsp;</span></a></p>

<!-- requset -->
<div class="rq_box">
    <p class="ttu red b fs13 mb5"><a href="javascript:void(0)"
                                     onClick="$('.rq_box').hide(0)">[X]{{__('messages.Close')}}</a></p>
    <a href="javascript:void(0)" class="req_link" onClick="$(this).hide(0); $('.req_form').show(0)"><img
                src="{{app()->getLocale() ==  'fa' ? '/images/request_call_fa.jpeg' : '/images/request_call.gif'}}"
                alt=""></a>
    <div class="req_form fs12 dn">

        <form id="popup_form" action="{{route('post_request')}}" method="post">

            <p><label for="name">{{__("messages.Full Name")}}</label></p>
            <p><input name="name" id="name" type="text" class="w100 p4 radius-3"></p>
            <p class="mt7"><label for="company_name">{{__("messages.Company Name")}}</label></p>
            <p><input name="company_name" id="company_name" type="text" class="w100 p4 radius-3"></p>
            <p class="mt7"><label for="email_id">{{__("messages.Email")}}</label></p>
            <p><input name="email" id="email_enquery" type="email" class="w100 p4 radius-3"></p>
            <p class="mt7"><label for="country">{{__("messages.Country")}}</label></p>
            <p><select name="country" class="country w100 p4 radius-3">
                    <option value="">{{__('messages.SELECT Country')}}</option>
                    @foreach ($countries as $country)
                        <option {{($user_country ==$country->id)?"selected":""}}
                                value="{{$country->id}}">
                            {{app()->getLocale()=='fa'?$country->name_fa:$country->name}}
                        </option>
                    @endforeach
                </select></p>
            <p class="mt7"><label for="mobile">{{ __("messages.Mobile Number") }}</label></p>
            <p>
                <input name="mobile" id="mobile" type="text" class="w78 p4 radius-3">
            </p>
            <p class="mt7"><label for="verification_code">{{__('messages.verification_code')}}</label></p>
            <p>
                <input name="captcha_request" id="verification_code_request" type="text"
                       title="{{__('messages.verification_code')}}"
                       placeholder="{{__("messages.Enter the security code") }}"
                       class="inouttyeptext w30 p4 radius-3 vam">
                <img src="{{ captcha_src('flat')}}"
                     class="vam reCaptcha-img" alt="" id="captchaimage_request"/>
                <a href="javascript:false;" title="Change Verification Code">
                    <img src="/images/ref2.png"
                         alt="Refresh"
                         onclick="document.getElementById('verification_code_request').value=''; document.getElementById('verification_code_request').focus(); return true;"
                         width="24" height="23" class="reCaptcha vam ml5">
                </a>
            </p>
            <p class="mt10">
                <input name="input" type="button" id="submit_popup_form" class="btn1  radius-5"
                       value="{{__("messages.Submit")}}">
                <input name="input" type="reset" class="btn2 radius-5" value="{{__("messages.Cancel")}}"
                       onClick="$('.req_link').show(0); $('.req_form').hide(0)"></p>
        </form>
    </div>

    <!--BODY ENDS-->

    <script src="/js/jquery.colorbox.js"></script>


    <script type="text/javascript">var Page = 'home';</script>
    <script src="/js/jquery.easing-1.3.js"></script>
    <script src="/js/jquery.mousewheel-3.1.12.js"></script>
    <script src="/js/jquery.jcarousellite.js"></script>
    <script type='text/javascript' src='{{ asset('js/script.js')}}'></script>

    <script type="text/javascript" src="/js/script.int.dg.js"></script>
    <script type="text/javascript" src="/js/custom_index.js"></script>
    <script type="text/javascript" src="/js/fluid_dg.min.js"></script>
    <script>
        $(function () {
            $('#fluid_dg_wrap_1').fluid_dg({
                thumbnails: false,
                width: '520px',
                height: '250px',
                loader: 'none',
                fx: 'scrollTop,scrollBottom',
                navigation: 'false',
                playPause: 'false',
                hover: 'false',
                time: 3000
            });
        })

    </script>
    <script>
        $(document).ready(function ($) {

            $(".group1").colorbox({rel: 'group1',  width: "auto", height: "320px"});
            $('.changelocal').on('click', function () {
                $('body').removeClass('loaded');

                var locale = $(this).attr('id');
                console.log(locale);
                var port = "{{ $_SERVER['SERVER_PORT']}}";
                var http = "http://";
                if (port == "443") {
                    http = "https://"
                }

                $.post(http + "{{$_SERVER['HTTP_HOST']}}/change-locale", {locale: locale}, function (data, status) {
                    console.log(data);

                    window.location = "/";
                });
            })
        });

        function showResult(str) {
            var type = $('#type').val();
            if (str.length == 0) {
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
                return;
            }
            // if (window.XMLHttpRequest) {
            //     // code for IE7+, Firefox, Chrome, Opera, Safari
            //     xmlhttp=new XMLHttpRequest();
            // } else {  // code for IE6, IE5
            //     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            // }
            // xmlhttp.onreadystatechange=function(data) {
            //     console.log(data);
            //     if (this.readyState==4 && this.status==200) {
            //         var option ="";
            //         $.each(this.responseText, function( index, value ) {
            //             option +="<p>"+value+"</p>"
            //         });
            //         document.getElementById("livesearch").innerHTML=option;
            //         document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            //     }
            // }
            // xmlhttp.open("GET",'/api/search?term='+str+'&type='+type,true);
            // xmlhttp.send();
            $.ajax({
                url: '/api/search?term=' + str + '&type=' + type,
                type: 'GET',
                success: function (data, textStatus, jqXHR) {
                    var option = "";
                    $("#livesearch").html("");

                    $.each(data, function (index, value) {
                        console.log(value);
                        if (value.text) {
                            option += "<p><a style='cursor: pointer' class='text_search'>" + value.text + "</a></p>"
                        }
                    });
                    if (option) {
                        $("#livesearch").html(option);

                    }
                    $('.text_search').on('click', function () {
                        var text = $(this).text();
                        $('.searchinput').val(text);
                        document.getElementById("livesearch").innerHTML = "";
                        document.getElementById("livesearch").style.border = "0px";
                    })
                },
                error: function (jqXHR, textStatus, errorThrown) {
                }
            });
        }
    </script>
        @yield('javascript')


                        </body>
                    </html>
