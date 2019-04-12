@extends('layouts.admin')

@section('content')

    <!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="{{ url('admin') }}">{{ __("Home") }}</a></li>
        {{--    <li class="{{!$rout_category ? 'active' : '' }}"><a--}}
        {{--                href="{{ url('admin/category') }}">{{ __("Category Management") }}</a></li>--}}
        {{--    @foreach ($rout_category as $i => $rout)--}}
        {{--        {{$class = ""}}--}}
        {{--        @if ($i == (sizeof($rout_category) - 1))--}}
        {{--            {{$class = 'active'}}--}}
        {{--        @endif--}}
        {{--        <li class="{{ $class }}" ><a href="' . $this->url('admin/category/sub-category', $rout['params']) . '">{{$rout['title']}}</li>--}}
        {{--    @endforeach--}}
    </ul>
    <!-- END BREADCRUMB -->
    {{--return message--}}
    <!-- START CONTENT FRAME -->
    <div class="content-frame">

        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">
            <div class="page-title">
                <h2><span class="fa fa-image"></span> {{ __("Category") }}</h2>
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/category/bulkupload')}}" class="btn btn-primary"><span
                            class="fa fa-upload"></span> {{ __("Upload") }}</a>
                <a href="{{ url('admin/category/add')}}" class="btn btn-primary">
                    <span class="fa fa-plus-circle">
                    </span>{{ __("Add Category") }}
                </a>
                <button class="btn btn-default content-frame-right-toggle"><span class="fa fa-bars"></span></button>
            </div>
        </div>

        <!-- START CONTENT FRAME RIGHT -->
        <div class="content-frame-right">
            <div class="list-group border-bottom push-down-20">
                <form action="{{url()->current()}}" method="post">

                    <select name="search[order]" class="form-control ">
                        <option value="">{{ __("Ordering") }}</option>
                        <option {{$search['order']=="categoryName"?"selected":""}} value="categoryName">{{ __("CategoryName") }}</option>
                        <option {{$search['order']=="categoryNameFa"?"selected":""}} value="categoryNameFa">{{ __("Category Name Farsi") }}</option>
                        <option {{$search['order']=="dateAdded"?"selected":""}} value="dateAdded">{{ __("Date Add Category") }}</option>
                        <option {{$search['order']=="dateModified"?"selected":""}} value="dateModified">{{ __("Date update Category") }}</option>
                    </select>
                    <select name="search[by]" class="form-control ">
                        <option {{$search['by']=="ASC"?"selected":""}} value="ASC">{{ __("Ascending") }}</option>
                        <option {{$search['by']=="DESC"?"selected":""}} value="DESC">{{ __("Descending") }}</option>

                    </select>
                    <input type="hidden" value="{{$search['status']}}" name="search[status]">
                    <input type="hidden" value="{{$search['text']}}" name="search[text]">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary">{{ __("Ordering") }}</button>
                    </div>
                </form>
            </div>

            <div class="list-group border-bottom push-down-20">
                <a href="#" class="list-group-item active">{{ __("List Category") }} <span
                            class="badge badge-primary">
                    @if($params['parent'] && $params['sub_cat'])
                            {{ __("Leads") }} {{ $count_products }}
                        @else
                            {{ __("Subcategory") }}{{ $count }}
                        @endif
                </span></a>
                @foreach ($categories as $key => $category)

                    @if($category->parent_id)

                        <a href="{{ url('admin/products')."?category=".$category['parentId']."&subcategory=".$category['parent']."&subsubcategory=".$category['categoryId'] }}"
                           class="list-group-item">{{ $category->title }}
                            <span class="badge {{ $badge[rand(0, 3)] }}">{{ $category->noSubCategory }}</span></a>
                    @else

                        <a href="{{ $category->url }}" class="list-group-item">{{ $category->title }}
                            <span class="badge {{ $badge[rand(0, 3)] }}">{{ $category->noSubCategory }}</span></a>
                    @endif
                @endforeach
            </div>

        </div>
        <!-- END CONTENT FRAME RIGHT -->

        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body content-frame-body-left">


            <div class="panel panel-default">
                <div class="panel-body">


                    <form action="" class="form-horizontal" method="post">
                        <div class="col-md-8">
                            <p>{{ __("Use search to find Category. You can search by: CategoryName.") }}</p></div>
                        <div class="col-md-4" align="right">
                            <button type="submit" name="clear" value="true"
                                    class="btn btn-primary">{{ __("Clear Filter") }}</button>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="fa fa-search"></span>
                                    </div>
                                    <input name="search[text]" type="text" class="form-control"
                                           value="{{$search['text']}}"
                                           placeholder="{{ __("what is it looking for?") }}"/>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">{{ __("Search") }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <select name="search[status]" class="form-control " onchange="this.form.submit()">
                                    <option value="">{{ __("status") }}</option>
                                    <option {{$search['status']=="1"?"selected":""}} value="1">{{ __("Active") }}</option>
                                    <option {{$search['status']=="0"?"selected":""}} value="0">{{ __("in-active") }}</option>
                                </select>

                                <input type="hidden" name="search[order]" value="{{$search['order']}}">
                                <input type="hidden" name="search[by]" value="{{$search['by']}}">
                            </div>

                            <div class="col-md-2">
                                <select name="search[feature]" class="form-control " onchange="this.form.submit()">
                                    <option value="">{{ __("Featured") }}</option>
                                    <option {{$search['feature']=="1"?"selected":""}} value="1">{{ __("YES") }}</option>
                                    <option {{$search['feature']=="0"?"selected":""}} value="0">{{ __("NO") }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select name="search[location_search]" class="form-control "
                                        onchange="this.form.submit()">
                                    <option value="">{{ __("Location Search") }}</option>
                                    <option {{!empty($search['location_search'])?"selected":""}} value=true>{{ __("In This page") }}</option>
                                    <option {{empty($search['location_search'])?"selected":""}} value=false>{{ __("All Category") }}</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="pull-left push-up-10">
                <button class="btn btn-primary" id="gallery-toggle-items">{{ __("Toggle All") }}</button>
            </div>
            <form action="{{ url("admin/category/action") }}" id="jvalidate" class="form-horizontal" method="post">

                <div class="pull-right push-up-10">
                    <div class="btn-group">

                        <button class="btn btn-primary submit" value="delete" name="action" type="submit"><span
                                    class="fa fa-trash-o"></span>{{ __("Delete") }}</button>
                        <button class="btn btn-primary submit" value="deactivate" name="action" type="submit"><span
                                    class="fa fa-circle-thin"></span>{{ __("Deactivate") }}</button>
                        <button class="btn btn-primary submit" value="activate" name="action" type="submit"><span
                                    class="fa fa-circle"></span>{{ __("activate") }}</button>
                        <button class="btn btn-primary submit" value="featured" name="action" type="submit"><span
                                    class="fa fa-circle"></span>{{ __("Featured") }}</button>
                        <button class="btn btn-primary submit" value="not_featured" name="action" type="submit"><span
                                    class="fa fa-circle"></span>{{ __("No Featured") }}</button>
                    </div>
                </div>

                <div class="gallery"><!--id="links"-->
                    @foreach ($categories as $key => $category)
                        <div class="gallery-item">
                            <div class="image">
                                <a class="image"
                                   href="/images/category/{{ $category->image }}"
                                   title="{{ $category->name }}" data-gallery>
                                    <img
                                            src="/images/category/{{ $category->image }}"
                                            alt="{{ $category->name }}" width="173px" height="129px"/>
                                    <ul class="gallery-item-controls">
                                        <li><label class="check">
                                                <input value="{{ $category->id }}"
                                                       name="category_checkbox[]" type="checkbox"
                                                       class="icheckbox"/>
                                            </label></li>
                                        <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                                    </ul>
                                </a>
                            </div>
                            <div class="meta">
                                <span>
                                    <p>
                                        <a href="{{$category->url_edit}}"
                                           title="{{ $category['categoryName'] }}">{{  str_limit($category->name, $limit = 25, $end = '...')}}</a></p>
                                    <p>
                                        <a href="{{$category->url_edit}}"
                                           title="{{ $category->name_fa }}">{{ $category->name_fa }}</a>
                                    </p>
                                </span>
                                <span>
                                @if ($params['depth']==1)
                                        <a href="{{$category->url_product}}"
                                                   title="{{ $category['categoryName'] }}">
                                                    {{ __("Leads") }}
                                                    [{{ $category->noProduct }}]</a>
                                    @else

                                        <a href="{{$category->url}}"
                                           title="{{ $category['categoryName'] }}">
                                                        {{ __("Subcategory") }}
                                            [{{ $category->noSubCategory }}]</a>
                                    @endif

                    </span>
                            </div>
                        </div>

                    @endforeach
                </div>

                <!--        <ul class="pagination pagination-sm pull-right push-down-20 push-up-20">-->
                <!--            <li class="disabled"><a href="#">«</a></li>-->
                <!--            <li class="active"><a href="#">1</a></li>-->
                <!--            <li><a href="#">2</a></li>-->
                <!--            <li><a href="#">3</a></li>-->
                <!--            <li><a href="#">4</a></li>-->
                <!--            <li><a href="#">»</a></li>-->
                <!--        </ul>-->
                <div class="row">
                    {{--                {{--}}
                    {{--                echo--}}
                    {{--                $this->paginationControl(--}}
                    {{--                    $this->pagination,--}}
                    {{--                    'All',--}}
                    {{--                    array(--}}
                    {{--                        'partial/pagination.phtml',--}}
                    {{--                        'Application',--}}
                    {{--                    ),--}}
                    {{--                    array(--}}
                    {{--                        'route' => $this->route,--}}
                    {{--                        'param'=>$params--}}
                    {{--                    )--}}
                    {{--                );--}}
                    {{--                }}--}}
                </div>
            </form>

        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME -->
    <!-- BLUEIMP GALLERY -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
    <!-- END BLUEIMP GALLERY -->
@endsection

@section('javascript')

    <script type="text/javascript"
            src="{{ asset("/js/admin/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js")}}"></script>

    <script type="text/javascript" src="{{ asset("/js/admin/plugins/blueimp/jquery.blueimp-gallery.min.js")}}"></script>
    <script type="text/javascript" src="{{ asset("/js/admin/plugins/dropzone/dropzone.min.js")}}"></script>
    <script type="text/javascript" src="{{ asset("/js/admin/plugins/icheck/icheck.min.js")}}"></script>
    <!-- END THIS PAGE PLUGINS-->

    <!-- START TEMPLATE -->
    <script type="text/javascript" src="{{ asset("/js/admin/settings.js")}}"></script>

    <script type="text/javascript" src="{{ asset("/js/admin/plugins.js")}}"></script>
    <script type="text/javascript" src="{{ asset("/js/admin/actions.js")}}"></script>
    <!-- END TEMPLATE -->

    <!--<script>-->
    <!--    document.getElementById('links').onclick = function (event) {-->
    <!--        event = event || window.event;-->
    <!--        var target = event.target || event.srcElement;-->
    <!--        var link = target.src ? target.parentNode : target;-->
    <!--        var options = {-->
    <!--            index: link, event: event, onclosed: function () {-->
    <!--                setTimeout(function () {-->
    <!--                    $("body").css("overflow", "");-->
    <!--                }, 200);-->
    <!--            }-->
    <!--        };-->
    <!--        var links = this.getElementsByTagName('a');-->
    <!--        blueimp.Gallery(links, options);-->
    <!--    };-->
    <!--</script>-->
@endsection
