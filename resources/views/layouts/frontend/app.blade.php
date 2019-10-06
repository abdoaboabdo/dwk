<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Honest &mdash; Free Website Template, Free HTML5 Template by GetTemplates.co</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="GetTemplates.co" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">


    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">


    <!-- Modernizr JS -->
    <script src="{{asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <style>
        body,*{


            font-family: 'Cairo', sans-serif;
            font-weight: bold;
        }
        .gtco-nav ul li.has-dropdown .dropdown{
            right: 0;
            left: auto;
            width: 168px;
        }
        .gtco-nav ul li{
            float: right;
        }
        .gtco-nav ul li.has-dropdown .dropdown li a:hover {

            color: #66D37E;

        }
        #showData .row{
            padding-top: 50px;
        }
        figure{
            height: 224px
        }

    </style>
    @yield('css')
</head>

<body>

<!-- Start your project here-->
    <div class="gtco-loader"></div>
    <div id="page">
        <div class="page-inner">
            @include('layouts.frontend.partials.header')
            @yield('content')
            @include('layouts.frontend.partials.footer')
        </div>
    </div>










<!-- Start your project here-->
<!-- jQuery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/sticky.js')}}"></script>
<!-- Carousel -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{asset('frontend/js/jquery.countTo.js')}}"></script>

<!-- Stellar Parallax -->
<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>

<!-- Magnific Popup -->
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/magnific-popup-options.js')}}"></script>
<script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>
<!-- Main -->
<script src="{{asset('frontend/js/main.js')}}"></script>
<script !src="">
    $(document).ready(function () {

        $(document).on('click','.pagination a',function (event) {
            console.log($(window).scrollTop(50));

        });
        $(document).on('click','a[disabled]',function (event) {
            event.preventDefault();
        });
        $(document).on('click','#contact',function (e) {
            e.preventDefault();
            let n = $(document).height();
            $('html, body').animate({ scrollTop: n }, 900);
        })
    })
</script>
<script type="text/javascript" src="{{asset('frontend/js/jssor.slider.min.js')}}"></script>
@yield('js')
</body>

</html>
