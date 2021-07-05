<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //for-mobile-apps -->
    <link href="{{ asset('site/css/bootstrap.css') }}"  rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome icons -->
    <link href="{{ asset('site/css/font-awesome.css') }}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="{{ asset('site/js/jquery-1.11.1.min.js') }}"></script>
    <!-- //js -->
    <link
        href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="{{ asset('site/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('site/js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });

    </script>
    <!-- start-smoth-scrolling -->

    <link href="{{ asset('site/css/custom.css') }}" rel="stylesheet">

</head>

<body>
    <!-- header -->
    @include('site.layouts.header')
    <!-- //header -->

    <!-- navigation -->
    @include('site.layouts.navbar')
    <!-- //navigation -->

    <!-- //content -->
    @yield('content')
    <!-- //end-content -->

    <!-- //footer -->
    @include('site.layouts.footer')
    <!-- //footer -->

    <!-- // messenger -->
    @include('site.layouts.messenger')
    <!--// end-messenger -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>

    <!-- top-header and slider -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear'
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });

    </script>
    <!-- //here ends scrolling icon -->
    <script src="{{ asset('site/js/minicart.min.js') }}"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });

        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }

    </script>
    <!-- main slider-banner -->
    <script src="{{ asset('site/js/skdslider.min.js') }}"></script>
    <link href="{{ asset('site/css/skdslider.css') }}" rel="stylesheet">
    
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#demo1').skdslider({
                'delay': 5000,
                'animationSpeed': 2000,
                'showNextPrev': true,
                'showPlayButton': true,
                'autoSlide': true,
                'animationType': 'fading'
            });

            jQuery('#responsive').change(function () {
                $('#responsive_wrapper').width(jQuery(this).val());
            });

        });

    </script>
    <!-- //main slider-banner -->

    
    {{-- <script type="text/javascript" src="{{ asset('site/js/script.js') }}"></script> --}}
    @include('site.scripts.functions')
</body>

</html>
