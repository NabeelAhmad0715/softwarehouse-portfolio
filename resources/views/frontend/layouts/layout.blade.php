<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('head')
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Titanium" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

   <!-- Favicon -->
   <link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}" />
   <!-- bootstrap -->
   <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- font awesome -->
   <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- ionicons icon -->
   <link href="{{ asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- mega menu -->
   <link href="{{ asset('css/mega-menu/mega_menu.css')}}" rel="stylesheet" type="text/css" />
   <!-- owl-carousel -->
   <link href="{{ asset('css/owl-carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
   <!-- magnific popup -->
   <link href="{{ asset('css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
   <!-- animate -->
   <link href="{{ asset('css/animate.css')}}" rel="stylesheet" type="text/css" />
   <!-- media element player -->
   <link href="{{ asset('css/mediaelementplayer.min.css')}}" rel="stylesheet" type="text/css" />
   <!-- REVOLUTION STYLE SHEETS -->
   <link href="{{ asset('revolution/css/settings.css')}}" rel="stylesheet" type="text/css">
   <!-- ADD-ONS CSS FILES -->
   <link href="{{ asset('revolution/css/revolution.addon.particles.css')}}" rel="stylesheet" type="text/css">
   <!-- shortcodes -->
   <link href="{{ asset('css/shortcodes.css')}}" rel="stylesheet" type="text/css" />
   <!-- main style -->
   <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />
   <!-- shop -->
   <link href="{{ asset('css/shop.css')}}" rel="stylesheet" type="text/css" />
   <!-- responsive -->
   <link href="{{ asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />
   <!-- custom -->
   <link href="{{ asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>

        @include('frontend.partials.header')
            @yield('content')
        @include('frontend.partials.footer')
    <!-- back-to-top -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a>
    </div>
    <!-- back-to-top End -->
    
    <!--================ Jquery =================-->
    <!-- Jquery  -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{ asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

    <!-- Google captcha code Js -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Mega Menu -->
    <script src="{{ asset('js/mega-menu/mega_menu.js')}}"></script>
    <!-- Main -->
    <script src="{{ asset('js/main.js')}}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{ asset('revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ asset('revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    
    
    <!-- Custom -->
    <script src="{{ asset('js/custom.js')}}"></script>
    <script>
                        var revapi117,
            tpj;
(function() {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();

    function onLoad() {
        if (tpj===undefined) { tpj = jQuery; if("off" == "on") tpj.noConflict();}
                if(tpj("#rev_slider_117_1").revolution == undefined){
                    revslider_showDoubleJqueryError("#rev_slider_117_1");
                }else{
                    revapi117 = tpj("#rev_slider_117_1").show().revolution({
                        sliderType:"standard",
jsFileLocation:"//localhost/revslider-standalone/revslider/public/assets/js/",
                        sliderLayout:"fullwidth",
                        dottedOverlay:"none",
                        delay:9000,
                        navigation: {
                            keyboardNavigation:"off",
                            keyboard_direction: "vertical",
                            mouseScrollNavigation:"off",
                             mouseScrollReverse:"reverse",
                            onHoverStop:"off",
                            arrows: {
                                style:"hesperiden",
                                enable:true,
                                hide_onmobile:false,
                                hide_onleave:false,
                                tmp:'',
                                left: {
                                    h_align:"left",
                                    v_align:"center",
                                    h_offset:20,
                                    v_offset:0
                                },
                                right: {
                                    h_align:"right",
                                    v_align:"center",
                                    h_offset:20,
                                    v_offset:0
                                }
                            }
                        },
                        visibilityLevels:[1240,1024,778,480],
                        gridwidth:1170,
                        gridheight:790,
                        lazyType:"none",
                        shadow:0,
                        spinner:"spinner0",
                        stopLoop:"off",
                        stopAfterLoops:-1,
                        stopAtSlide:-1,
                        shuffle:"off",
                        autoHeight:"off",
                        disableProgressBar:"on",
                        hideThumbsOnMobile:"off",
                        hideSliderAtLimit:0,
                        hideCaptionAtLimit:0,
                        hideAllCaptionAtLilmit:0,
                        debugMode:false,
                        fallbacks: {
                            simplifyAll:"off",
                            nextSlideOnWindowFocus:"off",
                            disableFocusListener:false,
                        }
                    });
    }; /* END OF revapi call */
             }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */
        </script>
</body>

</html>
