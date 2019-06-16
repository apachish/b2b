@extends('layouts.main')
@section('css')
@endsection
@section('content')
    <div class="changepass leadswrapper">
        <!-- breadcrumb -->
        <section class="breadcrumb">
            <div class="container">
                <span class="right-align">{{__('messages.You are here')}} :</span>
                <div class="right-align" itemscope="" itemtype="{{route(('home'))}} ">
                    <a href="{{route(('home'))}}" itemprop="url"><span
                                itemprop="title">{{__('messages.Home')}}</span></a>
                </div>
                <i class="right-align icon-angle-left"></i>
                <div class="right-align divinhere" itemscope="" itemtype="{{ route('search')}}">
                    <span itemprop="title"><strong>{{$title_page}}</strong></span>
                </div>
            </div>
        </section>
        <!-- breadcrumb ENDS -->
        <section class="contentinnerwrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12 divmaincontent leaddetailsdiv">
                        <h2 class="title-cat">{{__('messages.Search Results')}}</h2>
                        <form action="#" method="get" id="form_filter">
                            <div class="col-sm-12">

                                <div class="col-sm-8 col-xs-12">
                                    <p class="boxlead">

                                        @foreach ($seller_type as $seller_item)

                                        <label>
                                            <input name="seller[]" class="form_filter" type="checkbox"
                                                   value="{{$seller_item->id}}"
                                                    {{in_array($seller_item,$seller)?"checked":""}} >
                                            {{__('messages.'.$seller_item->title)}}
                                        </label>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    | <label class="label_filter">{{__('messages.Sort by')}}</label>
                                    <select class="form-control form_filter select" data-live-search="true" name="city">
                                        <option value="">{{__('messages.Select a City...')}}</option>

                                        @foreach ($cities as $key=>$city)
                                            <option {{!empty($city_filter == $city->id)?"selected":""}} value='{{$city->id}}'>{{$city->getName()}}</option>

                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </form>
                        <div class="ts_inr_list companies">
                            <ul>
                                @if($result)
                                @foreach ($result as $item)
                                <li>
                                    <div class="title">
                                        <p class="title-company"><a
                                                    href="{{ route('home.companies.info', ['slug_companies' => $item->slug]) }}"
                                                    class="uo">{{$item->getCompanyName()}}
                                            </a>
                                        </p>
                                        <p class="location">{{$item->city->getName()}}, {{$item->country->getName()}}</p>
                                    </div>
                                    <div class="fullwith companysearch">
                                        <!--                                    <p class="textcompanies"><b><a href="buy-leads-details.htm" class="uo">Adidas India Ltd</a> -</b> <span class="gray">Manufacturer, Exporters, Wholesale Suppliers</span></p>-->
                                        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-3">
                                            <figure><a href="{{ route('home.companies.info', ['slug_companies' => $item->slug]) }}"><img
                                                            src="{{url('images/logo/'.$item->company_logo)}}"
                                                            alt=""></a></figure>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-xs-12 col-sm-9">
                                            <div class="bodylead">
                                                <p class="typelead">{{__('messages.Deals in')}}
                                                    :
                                                @foreach($item->sellers as $seller)
                                                    <p> - {{__('messages.'.$seller->title)}}</p>
                                                    @endforeach
                                                </p>
                                                <p class="textlead">{{$item->company_details}}</p>
                                                <div class="sec2_btn">
                                                    <a href="{{ route('home.companies.info', ['slug_companies' => $item->slug]) }}"
                                                       class="enq trans_eff"> <i
                                                                class="icon-align-center"></i>{{__('messages.Leads')}}
                                                        -{{$item->leads_count}} </a>
                                                    <a href="{{ route('refer-friend') . "?link=" . base64_encode(route('home.companies.info', ['slug_companies' => $item->slug])) . "&text=" . base64_encode($item->getCompanyName()) }}"
                                                       class=" refer trans_eff group1"><i
                                                                class="icon-email"></i>{{__('messages.Refer to Friend')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @else
                                    <p class="ac b">{{__('messages.No record(s) Found !')}}</p>
                                @endif
                            </ul>
                        </div>
                        <div class="ordering">
                            <div class="col-sm-3 col-xs-12">
                                <span class="totlpage">{{__('messages.Total Company')}} : {{$countItem}}</span>
                            </div>
                            <div class="col-sm-9 col-xs-12">
                                {{ $result->links()}}
                            </div>
                        </div>

                        @include('banner_middle',['offset'=>0,'limit' => 1])

                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 col-xs-12  left-sidebar-inner ">
                        @include('banner_left',['offset'=>0,'limit' => 5])

                        @include('companies.company_featured',[ 'company_featured_type' => 1,'category_slug'=>null])

                        @include('banner_left',['offset'=>5,'limit' => 6])

                    </div>


                </div>
            </div>
    </div>
    </div>
    </section>
    </div>

    @if($banner_button){?>
    <div class="bg-gray">
        <div class="wrapper ac">
            <!--        <img src="/images/b_bnr1.jpg" alt=""> <img src="/images/b_bnr2.jpg" class="ml5" alt="">-->
            {{$banner_button}}
        </div>
    </div>
    @endif
@endsection
@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {

            $('.form_filter').on('change', function () {
                $('#form_filter').submit();
            })


        })
    </script>
@endsection
