;(function () {
    "use strict";

    let $window, $document, $body;

    $window = $(window);
    $document = $(document);
    $body = $("body");

    
    /*==============================================
     Pre loader init
     ===============================================*/
    $window.on("load", function () {
        $body.imagesLoaded(function () {
            $(".tb-preloader-wave").fadeOut();
            $("#tb-preloader").delay(200).fadeOut("slow").remove();
        });
    });

    /*==============================================
     Wow init
     ===============================================*/
    if (typeof WOW === "function")
        new WOW().init();

    $document.ready(function () {
        /*==============================================
         Smooth scroll init
         ===============================================*/
        if (typeof smoothScroll === "object") {
            smoothScroll.init();
        }

        /*==============================================
         Menuzord init
         ===============================================*/
        $(".js-primary-navigation").menuzord();

        /*==============================================
         Flex slider init
         ===============================================*/
        $window.on('load',function () {
            $(".portfolio-slider").flexslider({
                animation: "slide",
                direction: "vertical",
                slideshowSpeed: 3000,
                start: function () {
                    imagesLoaded($(".portfolio"), function () {
                        setTimeout(function () {
                            $(".portfolio-filter li:eq(0) a").trigger("click");
                        }, 500);
                    });
                }
            });
        });

        $window.on('load',function () {
            $(".portfolio-slider-alt").flexslider({
                animation: "slide",
                direction: "horizontal",
                slideshowSpeed: 4000,
                start: function () {
                    imagesLoaded($(".portfolio"), function () {
                        setTimeout(function () {
                            $(".portfolio-filter li:eq(0) a").trigger("click");
                        }, 500);
                    });
                }
            });
        });

        $window.on('load',function () {
            $(".post-slider-thumb").flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });

        $window.on('load',function () {
            $(".post-slider").flexslider({
                animation: "slide"
            });
        });

        $window.on('load',function () {
            $(".news-slider").flexslider({
                animation: "slide",
                slideshowSpeed: 3000
            });
        });


        /*==============================================
         Full screen banner init
         ===============================================*/



        /*==============================================
         Portfolio filterable grid init
         ===============================================*/
        let $portfolioGeneral = $(".portfolio:not(.portfolio-masonry)").isotope({
            itemSelector: ".portfolio-item",
            layoutMode: "fitRows",
            filter: "*"
        });

        let $portfolioMasonry = $(".portfolio-masonry").isotope({
            itemSelector: ".portfolio-item",
            resizesContainer: false,
            layoutMode: "masonry",
            filter: "*"
        });

        if (typeof imagesLoaded === "function") {
            $portfolioGeneral.imagesLoaded().progress(function () {
                $portfolioGeneral.isotope("layout");
            });

            $portfolioMasonry.imagesLoaded().progress(function () {
                $portfolioMasonry.isotope("layout");
            });
        }


        /*==============================================
         Portfolio filter nav
         ===============================================*/
        $(".portfolio-filter").on("click", "a", function (event) {
            event.preventDefault();
            let $this = $(this);
            $this.parent().addClass("active").siblings().removeClass("active");
            $this.parents(".text-center").next().isotope({filter: $this.data("filter")});
        });


        /*==============================================
         Portfolio item slider init
         ===============================================*/
        $(".portfolio-slider, .portfolio-slider-alt").each(function () { // the containers for all your galleries
            let _items = $(this).find("li > a");
            let items = [];
            for (let i = 0; i < _items.length; i++) {
                items.push({src: $(_items[i]).attr("href"), title: $(_items[i]).attr("title")});
            }
            $(this).parent().find(".action-btn").magnificPopup({
                items: items,
                type: "image",
                gallery: {
                    enabled: true
                }
            });
            $(this).parent().find(".portfolio-description").magnificPopup({
                items: items,
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        });


        /*==============================================
         Portfolio popup gallery init
         ===============================================*/
        $(".portfolio-gallery").each(function () { // the containers for all your galleries
            $(this).find(".popup-gallery").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
            $(this).find(".popup-gallery2").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        });


        /*==============================================
         Magnific popup init
         ===============================================*/
        $(".popup-link").magnificPopup({
            type: "image"
            // other options
        });

        $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            disableOn: 700,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });


        /*==============================================
         Accordion init
         ===============================================*/
        let allPanels = $(".accordion > dd").hide();
        allPanels.first().slideDown("easeOutExpo");
        $(".accordion").each(function () {
            $(this).find("dt > a").first().addClass("active").parent().next().css({display: "block"});
        });

        $(".accordion > dt > a").click(function () {

            let current = $(this).parent().next("dd");
            $(this).parents(".accordion").find("dt > a").removeClass("active");
            $(this).addClass("active");
            $(this).parents(".accordion").find("dd").slideUp("easeInExpo");
            $(this).parent().next().slideDown("easeOutExpo");

            return false;

        });


        /*==============================================
         Toggle init
         ===============================================*/
        let allToggles = $(".toggle > dd").hide();
        $(".toggle > dt > a").click(function () {

            if ($(this).hasClass("active")) {

                $(this).parent().next().slideUp("easeOutExpo");
                $(this).removeClass("active");

            }
            else {
                let current = $(this).parent().next("dd");
                $(this).addClass("active");
                $(this).parent().next().slideDown("easeOutExpo");
            }

            return false;
        });

        /*==============================================
         Carousel init
         ===============================================*/
        if ($.fn.owlCarousel) {
            $("#clients-1").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 6,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]

            });

            $("#testimonial-2").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 1
            });

            $("#testimonial-3").owlCarousel({
                autoPlay: 4000, //Set AutoPlay to 3 seconds
                items: 1
            });

            $("#testimonial-4").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 1
            });

            $("#testimonial-5").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 1
            });

            $("#carousel-object").owlCarousel({
                autoPlay: 4000, //Set AutoPlay to 3 seconds
                items: 1
                //pagination : false
            });

            $("#owl-slider").owlCarousel({
                autoPlay: 4000, //Set AutoPlay to 3 seconds
                items: 1,
                navigation: true,
                //pagination : false,
                navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            });

            $("#img-carousel").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]

            });

            $("#portfolio-carousel").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3],
                navigation: true,
                pagination: false,
                navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]

            });

            $("#portfolio-carousel-alt").owlCarousel({
                autoPlay: false, //Set AutoPlay to 3 seconds
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3],
                navigation: true,
                pagination: false,
                navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
            });
        }

        $(".portfolio-with-title").addClass("portfolio");
    });

})(jQuery);
