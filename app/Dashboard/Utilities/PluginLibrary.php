<?php

namespace App\Dashboard\Utilities;

class PluginLibrary
{
    protected $plugins = [
        //  Global Plugins
        'global' => [

            /** @App controls - Vue.js, Bootstrap, Jquery)*/
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/app.css']  ],

            /** @AnimateCSS */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'vendor/animate/animate.css']   ],

            /** @FontAwesome */
            [   'location' => 'cdn', 'status' =>  true, 'url' => ['js' => null, 'css' => 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'] ],

            /** @GoogleAPIFonT @OpenSans */
            [   'location' => 'cdn', 'status' =>  true, 'url' => ['js' => null, 'css' => 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700']    ],

            /** @GoogleAPIFonT @Oswald */
            [   'location' => 'cdn', 'status' =>  true, 'url' => ['js' => null, 'css' => 'http://fonts.googleapis.com/css?family=Oswald:700,400']   ],

            /** @GoogleAnalytics */
            [   'location' => 'cdn', 'status' =>  true, 'url' => ['js' => '//www.google-analytics.com/analytics.js', 'css' => null] ],
        ],
        //  Front End Plugins
        'front-end' => [

            /** @JqueryEasing */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/easing/jquery.easing.1.3.js', 'css' => null]   ],

            /** @Hud */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/lib/hud.js', 'css' => null]    ],

            /** @OldJquery required by some front end modules */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/jquery/jquery-1.10.2.min.js', 'css' => null]   ],

            /** @ElasticSlider */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/elasic-slider/jquery.eislideshow.js', 'css' => 'vendor/elasic-slider/elastic.css'] ],

            /** @IconMoon */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'vendor/iconmoon/linea-icon.css']   ],

            /** @BreakPoint */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/breakpoint/breakpoint.js', 'css' => null]  ],

            /** @JqueryCountTo */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/count-to/jquery.countTo.js', 'css' => null]    ],

            /** @JqueryCountdown */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/countdown/jquery.countdown.js', 'css' => null] ],

            /** @JqueryEasyPieChart */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/easy-pie-chart/jquery.easypiechart.min.js', 'css' => null] ],

            /** @JqueryFlexSlider */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/flex-slider/jquery.flexslider-min.js', 'css' => null]  ],

            /** @ImagesLoaded */
            [   'location' => 'public', 'status' =>  true,  'url' => ['js' => 'vendor/images-loaded/imagesloaded.js', 'css' => null]    ],

            /** @JqueryIsotope */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/isotope/jquery.isotope.js', 'css' => null] ],

            /** @JqueryMagnificPopup */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/magnific-popup/jquery.magnific-popup.min.js', 'css' => 'vendor/magnific-popup/magnific-popup.css'] ],

            /** @JqueryMailchimp */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/mailchimp/jquery.ajaxchimp.min.js', 'css' => null] ],

            /** @Menuzord */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/menuzord/menuzord.js', 'css' => null]  ],

            /** @JqueryNav */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/nav/jquery.nav.js', 'css' => null] ],

            /** @OwlCarousel */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/owl-carousel/owl.carousel.min.js', 'css' => 'vendor/owl-carousel/owl.carousel.css']    ],

            /** @OwlCarouselTheme */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'vendor/owl-carousel/owl.theme.css']    ],

            /** @Smooth */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/smooth/smooth.js', 'css' => null]  ],

            /** @Touchspin */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/touchspin/touchspin.js', 'css' => null]    ],

            /** @Typist */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/typist/typist.js', 'css' => null]  ],

            /** @Sticky */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/sticky/jquery.sticky.min.js', 'css' => null]   ],

            /** @Visible */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/visible/visible.js', 'css' => null]    ],

            /** @Wow */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/wow/wow.min.js', 'css' => null]    ],

            /** @ShortCodes */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/shortcodes.css']   ],

            /** @Default-Theme */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/default-theme.css']    ],

            /** @Scripts */
            [   'location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/scripts.js', 'css' => null]    ],
        ],
        //  Back End Plugins
        'back-end' => [
            /** @Admin */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/pages/admin.js', 'css' => null]],

            /** @JqueryEasing */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'vendor/easing/jquery.easing.1.3.js', 'css' => null]],

            /** @JqueryCookies */
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'jquery.cookie/jquery.cookie.js', 'css' => null]],

            /** @HTypeAhead @Handlebars */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/admin/typeahead/handlebars.js', 'css' => null]],

            /** @HTypeAhead @Bundle */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/admin/typeahead/typeahead.bundle.js', 'css' => null]],

            /** @Jquery @NiceScroll */
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'jquery.nicescroll/jquery.nicescroll.js', 'css' => null]],

            /** @Jquery @SparkLine */
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'jquery-sparkline/jquery.sparkline.js', 'css' => null]],

            /** @IonSound */
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'ion-sound/js/ion.sound.js', 'css' => null]],

            /** @Bootbox */
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'bootbox/bootbox.js', 'css' => null]],

            /** @Bootstrap @SessionTimeout */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/admin/bootstrap-session-timeout.js', 'css' => null]],

            /** @Jquery @Flot */
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'flot/jquery.flot.js', 'css' => null]],

            /** @Jquery @Flot @Categories*/
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'flot/jquery.flot.categories.js', 'css' => null]],

            /** @Jquery @Flot @Resize*/
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'flot/jquery.flot.resize.js', 'css' => null]],

            /** @Jquery @Flot @Pie*/
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'flot/jquery.flot.pie.js', 'css' => null]],

            /** @Jquery @Flot @Spline*/
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/lib/jquery.flot.spline.min.js', 'css' => null]],

            /** @Jquery @Flot @Tooltip*/
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/lib/jquery.flot.tooltip.min.js', 'css' => null]],

            /** @Jquery @Gritter */
            ['location' => 'npm', 'status' =>  true, 'url' => ['js' => 'gritter/js/jquery.gritter.min.js', 'css' => 'gritter/css/jquery.gritter.css']],

            /** @Admin @Interface */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/admin/interface.js', 'css' => null]
            ],

            /** @Admin @Dashboard */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => 'js/admin/blankon.dashboard.js', 'css' => null]],

            /** @AdminCSS @Reset */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/admin/reset.css']],

            /** @AdminCSS @Layout */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/admin/layout.css']],

            /** @AdminCSS @Components */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/admin/components.css']],

            /** @AdminCSS @Plugins */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/admin/plugins.css']],

            /** @AdminCSS @Theme */
            ['location' => 'public', 'status' =>  true, 'url' => ['js' => null, 'css' => 'css/admin/theme.css']],
        ],
    ];
}
