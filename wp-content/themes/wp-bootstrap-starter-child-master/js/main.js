(function(jQuery) {
    "use strict";

    // meanmenu
    jQuery('#mobile-menu').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "991"
    });

    // One Page Nav
    var top_offset = jQuery('.header-area').height() - 5;
    jQuery('.main-menu nav ul').onePageNav({
        currentClass: 'active',
        scrollOffset: top_offset,
    });


    jQuery(window).on('scroll', function() {
        var scroll = jQuery(window).scrollTop();
        if (scroll < 300) {
            jQuery(".header-sticky").removeClass("sticky");
        } else {
            jQuery(".header-sticky").addClass("sticky");
        }
    });

    // mainSlider
    function mainSlider() {
        var BasicSlider = jQuery(".slider-active");
        BasicSlider.on("init", function(e, slick) {
            var jQueryfirstAnimatingElements = jQuery(".single-slider:first-child").find(
                "[data-animation]"
            );
            doAnimations(jQueryfirstAnimatingElements);
        });
        BasicSlider.on("beforeChange", function(e, slick, currentSlide, nextSlide) {
            var jQueryanimatingElements = jQuery(
                '.single-slider[data-slick-index="' + nextSlide + '"]'
            ).find("[data-animation]");
            doAnimations(jQueryanimatingElements);
        });
        BasicSlider.slick({
            autoplay: false,
            autoplaySpeed: 10000,
            dots: true,
            fade: true,
            arrows: true,
            prevArrow: "<button type='button' class='slick-prev pull-left'>prev</button>",
            nextArrow: "<button type='button' class='slick-next pull-right'>next</button>",
            responsive: [
                { breakpoint: 767, settings: { dots: false, arrows: false } }
            ]
        });

        function doAnimations(elements) {
            var animationEndEvents =
                "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
            elements.each(function() {
                var jQuerythis = jQuery(this);
                var jQueryanimationDelay = jQuerythis.data("delay");
                var jQueryanimationType = "animated " + jQuerythis.data("animation");
                jQuerythis.css({
                    "animation-delay": jQueryanimationDelay,
                    "-webkit-animation-delay": jQueryanimationDelay
                });
                jQuerythis.addClass(jQueryanimationType).one(animationEndEvents, function() {
                    jQuerythis.removeClass(jQueryanimationType);
                });
            });
        }
    }
    mainSlider();

    // slider-active
    jQuery('.slider-active-3').slick({
        dots: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><span class="ti-angle-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="ti-angle-right"></span></button>',
        infinite: true,
        fade: true,
        speed: 800,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    // courses-active
    jQuery('.courses-active').slick({
        dots: false,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev pull-left'>prev</button>",
        nextArrow: "<button type='button' class='slick-next pull-right'>next</button>",
        infinite: true,
        speed: 600,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    // testimonilas-active
    jQuery('.testimonilas-active').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 600,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    // testimonilas-active
    jQuery('.testimonilas-active-2').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 600,
        slidesToShow: 2,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    // shop-active
    jQuery('.shop-active').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 600,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    // CIRCLE PROGRESSBAR

    jQuery('#bar1').barfiller();
    jQuery('#bar2').barfiller();
    jQuery('#bar3').barfiller();


    // counter js
    jQuery('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    /* magnificPopup img view */
    jQuery('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    /* magnificPopup video view */
    jQuery('.popup-video').magnificPopup({
        type: 'iframe'
    });

    // scrollToTop
    jQuery.scrollUp({
        scrollName: 'scrollUp', // Element ID
        topDistance: '300', // Distance from top before showing element (px)
        topSpeed: 300, // Speed back to top (ms)
        animation: 'fade', // Fade, slide, none
        animationInSpeed: 200, // Animation in speed (ms)
        animationOutSpeed: 200, // Animation out speed (ms)
        scrollText: '<span class="ti-arrow-up"></span>', // Text for element
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
    });

    // WOW active
    new WOW().init();


})(jQuery);