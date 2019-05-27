@if($company_featured_type==1)
    <h3 class="title-cat">{{__("messages.Featured Company")}}</h3>
    <p class="morelink"><a
                href="{{route('home.featured',['type'=>'company','slug_category'=>$category_slug]) }}"
                title="{{__("messages.View All")}}" class="uo">{{__("messages.View All")}}</a></p>
    <ul class="listfeatureleft">
        @if($company_featured)

            @foreach ($company_featured as $company)
                <li class="bb1">
                    <div class="pro_list auto mb10 mt10">
                        <div class="pro_pc">
                            <figure><a href="{{route('home.companies.info', ['slug_companies' => $company->slug])}}"
                                       title=""><img
                                            src="{{url('images/logo/'.$company->logo)}}"
                                            alt="" width="100px" height="100px"></a></figure>
                        </div>
                        <p class="pro-list-title"><a
                                    href="{{route('home.companies.info', ['slug_companies' => $company->slug])}}" class="uo"
                                    title="">{{$company->getCompanyName($company)}}</a>
                        </p>
                        <p class="pro-detials">
                            {{$company->viewSellers}}
                        </p>
                        <p class="pro-list-des">{{$company->company_details}}</p>
                    </div>
                </li>
            @endforeach
        @endif

    </ul>
@elseif ($company_featured_type==2)
    <div class="specialproduct">
        <p class="morelink"><a class="morespecial"
                               href="{{route('home.featured',['type'=>'company','slug_category'=>$category_slug])}}">{{__('messages.View All') }}
            </a></p>
        <h3 class="title-cat">{{__('messages.Featured Companies') }}</h3>
        <ul class="speciallist">
            @if($company_featured)

                @foreach ($company_featured as $company)
                    <li class="col-lg-6 col-xs-12">
                        <a href="{{route('home.companies.info', ['slug_companies' => $company->slug])}}">
                            {{$company->getCompanyName($company)}}
                            <span class="cat-special">{{$company->category->getCategoryTitle()}}</span>
                        </a>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>

@elseif ($company_featured_type==3)
    <h3 class="title-cat"><{{__("messages.Featured Company") }}</h3>
    <p class="morelink"><a
                href="{{route('home.featured',['type'=>'company','slug_category'=>$category_slug]) }}"
                title="{{__("messages.View All") }}" class="
                uo">{{__("messages.View All") }}</a></p>
    <ul class="listfeatureleft">
        @if ($company_featured)

            @foreach ($company_featured as $company)

                <li class="bb1">
                    <div class="pro_list auto mb10 mt10">
                        <p class="pro-list-title"><a
                                    href="{{route('home.companies.info', ['slug_companies' => $company->slug])}}"
                                    class="uo"
                                    title="">{{$company->getCompanyName($company)}}</a>
                        </p>
                        <p class="pro-detials"><{{__($messages.featured['sellerType']) }}</p>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>

@elseif ($company_featured_type==4)
    <div class="specialproduct specialleft">
        <h3 class="title-cat">{{__("messages.Featured Companies")}}</h3>
        <p class="morelink"><a
                    href="<{{route('home.featured',['type'=>'company','slug_category'=>$category_slug]) }}"
                    title="View All" class="uo">{{__("messages.View All")}}</a></p>
        <ul class="speciallist">
            @if ($company_featured) { }}

            @foreach ($company_featured as $company)
                <li>
                    <a href="{{route('home.companies.info', ['slug_companies' => $company->slug])}}">{{$company->getCompanyName($company)}}
                        <span class="cat-special">{{$company->category->getCategoryTitle()}}</span></a>
                </li>
            @endforeach
            @endif
        </ul>
    </div>
@endif