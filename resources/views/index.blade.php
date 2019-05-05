@extends('layouts.main')

@section('content')
    <section class=" wrappercontent">
        <div class="container">
            <div class="">
                <div id="blog-sidebar" class="col-lg-3 hidden-md  hidden-sm right-sidebar hidden-xs">
                    <p class="morelink"><a href="<?= $this->url('home/category') ?>"
                                           title="View All"><?= __("View All") ?></a></p>
                    <h3 class="title-cat"><?= __("Categories") ?></h3>
                    <div class="wrap">
                        <div class="demo-container right clear">
                            <div class="dcjq-vertical-mega-menu">
                                <ul id="mega-2" class="mega-menu ">

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-sideimg">
                        {{$banner_right}}
                    </div>
                </div>
                <div id="blog-main" class="col-lg-9 col-md-12 col-xs-12 col-sm-12 ">
                    <div class="row">

                        <div class="slider col-lg-8 col-md-8 col-xs-12">
                            @if ($home_scrolling)
                                <div class="fluid_container">
                                    <div class="fluid_dg_wrap fluid_dg_charcoal_skin fluid_container"
                                         id="fluid_dg_wrap_1">
                                        @foreach ($home_scrolling as $j => $scroll)
                                            @if (!empty($scroll->src)) { ?>
                                            <div data-src="{{$scroll->src}}"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if (!empty($articles))
                        <div class="articles col-lg-4 col-md-4 col-xs-12">
                            <p class="morelink"><a href="{{route('articles')}}"
                                                   title="View All">{{__("View All")}}  </a></p>
                            <h3 class="title-cat">{{__("Articles")}}  </h3>
                            <div class="bodyarticles">
                                <p class="art-title"><a
                                            href="{{route('articles',['id'=>$articles->id])}}">{{$articles->title}}</a>
                                </p>
                                <p class="art-date"><?= __("Posted on") ?>
                                    : {{$articles->updated_at}}
                                    - <?= __("by") ?> {{$article->last_modified_by}}</p>

                                <p class="art-des">{{$article->description}},....</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="leads row">
                        <div class="rightlead col-lg-6 col-md-6 col-xs-12">
                            <div class="leadsbody">
                                <h3 class="title-leads"><?= __('New Buying Leads') ?><a
                                            href="<?= $this->url('home/products_new', ['type' => 'buy']) ?>"
                                            class="allleads">{{$count_buy}}</a></h3>
                                <a class="morelead_buy"
                                   href="<?= $this->url('home/products_new', ['type' => 'buy']) ?>"><?= __('View All') ?>
                                </a>
                                <div style="height:120px;" class="rel o-hid">
                                    <div class="{{$count_buy>= 10 ?"lead_scroll1":"" }} body-leads">
                                        <ul class="leads_list">
                                            @foreach ($buy_leads as $buy)
                                            <li>
                                                <a href="{{route('leads',[])}}<?= $this->url('home/product', ['cat_id' => $buy['categoryId'], 'id' => $buy['id']]) ?>"
                                                   title=""> <?= $buy['title'] ?> <span
                                                            class="date-lead"><?= $buy['productPublishDate'] ?></span></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <a class="more-leads <?= $this->identity() ? "" : "group1"?>"
                                   href="<?= $this->identity() ? $this->url('members/post_lead/type_ad', ['type_ad' => 'buy']) : $this->url('user/email', array("title" => __('Sign In')))?>"

                                   title="<?= $this->identity() ? __('Post Buying Leads') : __('Sign In')?>"><?= __('Post Buying Leads') ?></a>

                            </div>
                        </div>
                        <div class="leftlead col-lg-6 col-md-6 col-xs-12">
                            <div class="leadsbody">
                                <h3 class="title-leads"><?= __('New Selling Leads') ?><a
                                            href="<?= $this->url('home/products_new', ['type' => 'sell']) ?>"
                                            class="allleads"><?= $count_sell ?></a></h3>
                                <a class="morelead_sell"
                                   href="<?= $this->url('home/products_new', ['type' => 'Sale']) ?>"><?= __('View All') ?>
                                </a>
                                <div style="height:120px;" class="rel o-hid">
                                    <div class="<?=sizeof($sell_leads) >= 10 ? "lead_scroll2" : ""?> body-leads">
                                        <ul class="leads_list">
                                            <?php foreach ($sell_leads as $sell) { ?>
                                            <li>
                                                <a href="<?= $this->url('home/product', ['cat_id' => $sell['categoryId'], 'id' => $sell['id']]) ?>"
                                                   title=""> <?= $sell['title'] ?> <span
                                                            class="date-lead"><?= $sell['productPublishDate'] ?></span></a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <a class="more-leads <?= $this->identity() ? "" : "group1"?>"
                                   href="<?= $this->identity() ? $this->url('members/post_lead/type_ad', ['type_ad' => 'sell']) : $this->url('user/email', array("title" => __('Sign In')))?>"
                                   title="<?= $this->identity() ? __('Post Selling Leads') : __('Sign In')?>"><?= __('Post Selling Leads') ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="buttom-lead col-lg-9 col-md-12 col-xs-12 col-sm-9">
                            <?php if ($products_featured1 || $products_featured2 || $products_featured3) { ?>
                            <div class="hidden-xs products-home col-lg-12">
                                <p class="morelink products-home-more"><a
                                            href="<?=$this->url('home/featured') . '?featured=-1'?>"
                                            title="View All"><?= __("View All") ?></a>
                                </p>
                                <h3 class="title-cat products-home-title"><?= __("Featured Products") ?></h3>
                                <!--list row 1-->
                                <?php echo $this->partial('buysellyab/product/featured_slider.phtml', ['products_featured' => $products_featured1, 'index' => 1]) ?>
                                <?php echo $this->partial('buysellyab/product/featured_slider.phtml', ['products_featured' => $products_featured2, 'index' => 2]) ?>
                                <?php echo $this->partial('buysellyab/product/featured_slider.phtml', ['products_featured' => $products_featured3, 'index' => 3]) ?>
                            </div>
                        <?php } ?>
                        <!-- End Product Home -->
                            <!-- Categories Home -->
                            <div class="categories-home">
                                <p class="morelink"><a href="<?= $this->url('home/category') ?>" title="View All"
                                                       class="allcat"><?= __("View All") ?></a></p>
                                <h3 class="title-cat"><?= __("Category") ?></h3>
                                <?php if ($categories) { ?>
                                <?php foreach ($categories as $i => $category):
                                if ($i == 6) {
                                    break;
                                }
                                ?>
                                <?php if ($i % 3 == 0) {
                                    echo "<div>";
                                } ?>

                                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 cat-list-home">
                                    <a href="<?= $this->url("home/category/cms-page-cat", ["cat" => $category['friendlyUrl'], "id" => $category["categoryId"]]); ?>"
                                       title=""
                                       class="title-cat"><?= $category['categoryName'];//mb_substr(we, 0, 20) ?></a>
                                    <div class="cat_box">
                                        <a class="cat-img"
                                           href="<?= $this->url("home/category/cms-page-cat", ["cat" => $category['friendlyUrl'], "id" => $category["categoryId"]]); ?>"
                                           title="<?= $category['categoryName'] ?>">
                                            <img src="<?= !empty($category['categoryImage']) ? $this->baseUrl . '/uploaded_files/category/' . $category['categoryImage'] : $this->baseUrl . '/images/noimg.jpg' ?>"
                                                 width="173" height="80"
                                                 alt="<?= $category['categoryName'] ?>">
                                        </a>
                                        <ul class="cat_links">
                                            <?php foreach ($category['subcategory'] as $s=>$subcategory):
                                            if ($s == 4) {
                                                break;
                                            }
                                            $url_Cat = array_filter(explode("/", $subcategory['friendlyUrl']));
                                            if (empty($url_Cat))
                                                continue;
                                            ?>
                                            <li class="cat-list"><a
                                                        href="<?= $this->url("home/category/cms-page-subcat", ["cat" => isset($url_Cat[0]) ? $url_Cat[0] : 0, "subcat" => isset($url_Cat[1]) ? $url_Cat[1] : 0, "id" => $subcategory['categoryId']]) ?>"
                                                        title="<?= $subcategory['categoryName'] ?>"><?= $subcategory['categoryName'];//mb_substr(, 0, 20) ?></a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php if ($i % 3 == 2) {
                                    echo "</div>";
                                } ?>
                                <?php endforeach; ?>
                                <?php } ?>
                            </div>
                            <!-- End Categories -->
                            <!--Special Product -->
                        <?php echo $this->partial('buysellyab/company/company_featured.phtml', ['company_featured' => $companies, 'company_featured_type' => 2]) ?>

                        <!-- End Special -->
                        </div>
                        <div class="innerleftsidebar col-lg-3 hidden-md col-xs-12 hidden-sm">
                        <?php if ($banner_left) { ?>
                        <!--Left Sidebar Images -->
                            <div class="imgleftsidebar">
                                <?= $banner_left ?>
                            </div>
                            <!-- End Left Sidebar Images -->
                        <?php } ?>

                        <!-- Testmonials -->
                            <div class="testimonial">
                                <p class="morelink"><a class="more-testimonial" href="<?= $this->url('testimonials') ?>"
                                                       title="<?= __('View All') ?>"
                                                       class="uo"><?= __('View All') ?></a></p>
                                <h3 class="title-cat"><?= __('Testimonials') ?></h3>
                                <div class="t_scroll col-lg-12">
                                    <div class="testimonial_scroll">
                                        <ul>
                                            <?php foreach ($testimonials as $testimonial) { ?>
                                            <li>
                                                <div class="inner">
                                                    <p class="text-testimonial"><?= substr($testimonial['testimonialDescription'], 0, 100) ?>
                                                        <b class="blue1">...<a
                                                                    href="<?=$this->url('testimonials/details', ['id' => $testimonial['testimonialId']])?>"
                                                                    class="uo"
                                                                    title="more"><?= __('more') ?></a></b>
                                                    </p>
                                                    <p class="name-testimonial"><?= !empty($testimonial['poster_name']) ? $testimonial['poster_name'] : "" ?></p>
                                                    <p class="from-testimonial"><?= !empty($testimonial['company']) ? $testimonial['company'] : "" ?></p>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Testmonials -->
                            <div class="imgleftsidebar">
                                <?= $banner_left_2 //                        <img src="/images/r_bnr7.jpg" class="last-imgsidebar" alt="">
                                ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- LEFT ENDS -->
    </section>
    <!-- MIDDLE ENDS -->
    <section id="blog-footer" class="btm-content">
        <div class="container newsletter">
            <p class="title-newsletter"><?= __("NEWSLETTER") ?></p>
            <p class="des-newsletter"><?= __("Enter your email address to sign up for our special offers and product promotions") ?></p>
            <div class="newletterform">
                <form id="newletterform" action="<?= $this->url('newsLetter') ?>" method="post">
                    <input name="letter[subscriberName]" type="text" class="textbox-newsletter"
                           placeholder="<?= __("FullName") ?>">
                    <input name="letter[subscriberEmail]" type="email" class="textbox-newsletter" id="letter_email"
                           placeholder="<?= __("Email Address") ?>">
                    <input name="letter[verification_code_newsletter]" id="verification_code_newsletter" type="text"
                           autocomplete="off"
                           placeholder="<?= __("Enter the security code") ?>"
                           class="textbox-newsletter captcha">
                    <img src="<?= $this->url("captcha", ['id' => uniqid(time()), 'text_color' => 'ffffff', 'image_bg_color' => '36b3d1', 'name' => 'newsletter']); ?>"
                         class="vam ml10" alt="" id="captchaimage"/>
                    <a href="javascript:false;" title="Change Verification Code">
                        <img src="/images/ref2.png"
                             alt="Refresh"
                             onclick="document.getElementById('captchaimage').src='<?= $this->url("captcha", ['id' => uniqid(time()), 'text_color' => 'ffffff', 'image_bg_color' => '36b3d1', 'name' => 'newsletter']); ?>'; document.getElementById('verification_code_newsletter').value=''; document.getElementById('verification_code_newsletter').focus(); return true;"
                             class="vam ml5">
                    </a>
                    <button class="btn-sub btn-letter" name="letter[status]" value=1
                            type="submit"><?= __("Subscribe") ?></button>
                    <button class="btn-sub btn-letter" name="letter[status]" btn-unsub
                    " value=0
                    type="submit"><?= __("Unsubscribe") ?></button>
                    <img src="/img/blueimp/loading.gif" id="loding_email"
                         style="width: 30px;height: 30px;display: none"/>


                </form>
            </div>
        </div>
        <?php if (!empty($articles[4])) { ?>
        <?php $text = explode("<hr>", $articles[4]['detail']) ?>
        <div class="container aboutus">
            <p class="morelink"><a href="<?= $this->url("home/articles", ["id" => $articles[4]['id']]) ?>"
                                   title="Read More" class="more-about"><?= __("More") ?></a></p>
            <h3 class="title-cat"><?= $articles[4]['title'] ?></h3>
            <p class="des-about"><?= $text[0] ?></div>
        <?php } ?>
    </section>
    <?php if($banner_button){?>
    <div class="bg-gray">
        <div class="wrapper ac">
            <!--        <img src="/images/b_bnr1.jpg" alt=""> <img src="/images/b_bnr2.jpg" class="ml5" alt="">-->
            <?=$banner_button?>
        </div>
    </div>
    <?php }?>
    <!--<script src="/old_js/jssor.slider-25.0.7.min.js" type="text/javascript"></script>-->
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#mega-2').dcVerticalMegaMenu({
                rowItems: '5',
                speed: '1',
                effect: 'show',
                direction: 'left'
            });

            // var jssor_1_SlideshowTransitions = [
            //     {$Duration: 4200, $Opacity: 5}
            // ];
            //
            // var jssor_1_options = {
            //     $AutoPlay: 1,
            //     $SlideshowOptions: {
            //         $Class: $JssorSlideshowRunner$,
            //         $Transitions: jssor_1_SlideshowTransitions,
            //         $TransitionsOrder: 1
            //     },
            //     $ArrowNavigatorOptions: {
            //         $Class: $JssorArrowNavigator$
            //     },
            //     $BulletNavigatorOptions: {
            //         $Class: $JssorBulletNavigator$
            //     }
            // };
            //
            // var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            //
            // /*#region responsive code begin*/
            //
            // /*remove responsive code if you don't want the slider scales while window resizing*/
            // function ScaleSlider() {
            //     var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            //     if (refSize) {
            //         refSize = Math.min(refSize, 980);
            //         jssor_1_slider.$ScaleWidth(refSize);
            //     }
            //     else {
            //         window.setTimeout(ScaleSlider, 30);
            //     }
            // }
            //
            // ScaleSlider();
            // $(window).bind("load", ScaleSlider);
            // $(window).bind("resize", ScaleSlider);
            // $(window).bind("orientationchange", ScaleSlider);

            /*#endregion responsive code end*/
        });
    </script>
@endsection
@section('javascript')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#mega-2').dcVerticalMegaMenu({
                rowItems: '5',
                speed: '1',
                effect: 'show',
                direction: 'left'
            });

            // var jssor_1_SlideshowTransitions = [
            //     {$Duration: 4200, $Opacity: 5}
            // ];
            //
            // var jssor_1_options = {
            //     $AutoPlay: 1,
            //     $SlideshowOptions: {
            //         $Class: $JssorSlideshowRunner$,
            //         $Transitions: jssor_1_SlideshowTransitions,
            //         $TransitionsOrder: 1
            //     },
            //     $ArrowNavigatorOptions: {
            //         $Class: $JssorArrowNavigator$
            //     },
            //     $BulletNavigatorOptions: {
            //         $Class: $JssorBulletNavigator$
            //     }
            // };
            //
            // var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            //
            // /*#region responsive code begin*/
            //
            // /*remove responsive code if you don't want the slider scales while window resizing*/
            // function ScaleSlider() {
            //     var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
            //     if (refSize) {
            //         refSize = Math.min(refSize, 980);
            //         jssor_1_slider.$ScaleWidth(refSize);
            //     }
            //     else {
            //         window.setTimeout(ScaleSlider, 30);
            //     }
            // }
            //
            // ScaleSlider();
            // $(window).bind("load", ScaleSlider);
            // $(window).bind("resize", ScaleSlider);
            // $(window).bind("orientationchange", ScaleSlider);

            /*#endregion responsive code end*/
        });
    </script>

@endsection