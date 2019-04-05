function include(url) {
    document.write('<script src="' + url + '" type="text/javascript"></script>');
}

include('/js/helpers.min.js');
include('/js/jquery.placeholder.js');
include('/fancybox/jquery.fancybox.pack.js');

if (Page == 'home') {
// include('/old_js/Scripts/fluid_dg.min.js');
}
if (Page == 'details') {
    include('/zoom/magiczoomplus.js');
}
else {
}

$(window).load(function (e) {
// $('.fancybox').fancybox();
// $('.mygallery').fancybox({/*use class 'mygallery' and rel 'gallery' in 'A tag' */
// wrapCSS    : 'fancybox-custom',closeClick : true, openEffect : 'none',
// helpers : {
// title : {type : 'inside'},
// overlay : {css : {'background' : 'rgba(0,0,0,0.6)'}}
// }
// });

// $('.forgot').fancybox({'width':300,'height':175,'type':'iframe',title:{type:'outside'}});
// // $('.newsletter').fancybox({'width':300,'height':220,'type':'iframe',title:{type:'outside'}});
// $('.refer').fancybox({'width':300,'height':300,'type':'iframe',title:{type:'outside'}});
// $('.enquiry').fancybox({'width':395,'height':300,'type':'iframe',title:{type:'outside'}});

    $('input').placeholder();
    $('textarea').placeholder();
    if ($(".testimonial_scroll ul li").length) {
        $(function () {
            $(".testimonial_scroll").jCarouselLite({
                vertical: true,
                hoverPause: true,
                visible: 3,
                auto: 3000,
                speed: 400
            });
        });

    }
    if ($(".lead_scroll1 ul li").length) {

        $(function () {
            $(".lead_scroll1").jCarouselLite({vertical: true, hoverPause: true, visible: 5, auto: 3000, speed: 400});
        });
    }
    if ($(".lead_scroll2 ul li").length) {

        $(function () {
            $(".lead_scroll2").jCarouselLite({
                vertical: true,
                hoverPause: true,
                visible: 5,
                auto: 4000,
                speed: 400
            });
        });
    }
    if ($(".pro_scroll_1 ul li").length) {
        var action = $('.pro_scroll_1').attr('data-action');
        if(action == 'none-scroll'){
            // $(function () {
            //     $(".pro_scroll_1").jCarouselLite({
            //         auto:false,
            //         btnPrev: ".prev1",
            //         btnNext: ".next1",
            //         vertical: false,
            //         visible: 4,
            //
            //     });
            // });
        }else {
            $('.prev1').show();
            $('.next1').show();
            $(function () {
                $(".pro_scroll_1").jCarouselLite({
                    btnPrev: ".prev1",
                    btnNext: ".next1",
                    vertical: false,
                    hoverPause: true,
                    visible: 4,
                    auto: 3000,
                    speed: 400
                });
            });
        }


    }
    if ($(".pro_scroll_2 ul li").length) {
        var action2 = $('.pro_scroll_2').attr('data-action');
        if(action2 == 'none-scroll'){
            // $(function () {
            //     $(".pro_scroll_2").jCarouselLite({
            //         btnPrev: ".prev2",
            //         btnNext: ".next2",
            //         vertical: false,
            //         visible: 4,
            //     });
            // });
        }else {
            $('.prev2').show();
            $('.next2').show();
            $(function () {
                $(".pro_scroll_2").jCarouselLite({
                    btnPrev: ".prev2",
                    btnNext: ".next2",
                    vertical: false,
                    hoverPause: true,
                    visible: 4,
                    auto: 4000,
                    speed: 400
                });
            });
        }

    }
    if ($(".pro_scroll_3 ul li").length) {
        var action3 = $('.pro_scroll_3').attr('data-action');
        if(action3 == 'none-scroll'){
            // $(function () {
            //     $(".pro_scroll_3").jCarouselLite({
            //         btnPrev: ".prev3",
            //         btnNext: ".next3",
            //         vertical: false,
            //         visible: 4,
            //     });
            // });
        }else {
            $('.prev3').show();
            $('.next3').show();
            $(function () {
                $(".pro_scroll_3").jCarouselLite({
                    btnPrev: ".prev3",
                    btnNext: ".next3",
                    vertical: false,
                    hoverPause: true,
                    visible: 4,
                    auto: 5000,
                    speed: 400
                });
            });
        }

    }


    


// $("a[rel=dg_group]").fancybox({'type'	: 'image','titlePosition' : 'over','titleFormat'   : function(title, currentArray, currentIndex, currentOpts) {return '';}});


//$('.dd_text p').click(function(){var win = ($(this).attr('title'));	$('.mytext').text(win)})

    if (Page == 'home') {
// $(function(){$('#fluid_dg_wrap_1').fluid_dg({thumbnails: false,height:'250px',loader:'none',fx:'scrollLeft',navigation:'false',playPause:'false',hover:'false',time:3000});})
    }

});
