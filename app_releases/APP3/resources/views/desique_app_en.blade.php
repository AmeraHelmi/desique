<!DOCTYPE html>
<html lang="en" class="no-js" >
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="Amera Helmi" />
        <title>DESIQUE</title>
        <link href="{{ asset('/admin-ui/assets/css/font-awesome.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin-ui/assets/css/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin-ui/assets/css/ionicons.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin-ui/assets/js/source/jquery.fancybox.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin-ui/assets/css/animations.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/admin-ui/assets/css/style-blue.css') }}" rel="stylesheet" />
    </head>
    <body data-spy="scroll" data-target="#menu-section">
        @yield('content')
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
        <!-- CORE JQUERY -->
        <script src="{{ asset('/admin-ui/assets/js/jquery-1.11.1.js') }}"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="{{ asset('/admin-ui/assets/js/bootstrap.js') }}"></script>
        <!-- EASING SCROLL SCRIPTS PLUGIN -->
        <script src="{{ asset('/admin-ui/assets/js/vegas/jquery.vegas.min.js') }}"></script>
        <!-- VEGAS SLIDESHOW SCRIPTS -->
        <script src="{{ asset('/admin-ui/assets/js/jquery.easing.min.js') }}"></script>
        <!-- FANCYBOX PLUGIN -->
        <script src="{{ asset('/admin-ui/assets/js/source/jquery.fancybox.js') }}"></script>
        <!-- ISOTOPE SCRIPTS -->
        <script src="{{ asset('/admin-ui/assets/js/jquery.isotope.js') }}"></script>
        <!-- VIEWPORT ANIMATION SCRIPTS   -->
        <script src="{{ asset('/admin-ui/assets/js/appear.min.js') }}"></script>
        <script src="{{ asset('/admin-ui/assets/js/animations.min.js') }}"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="{{ asset('/admin-ui/assets/js/custom.js') }}"></script>
    </body>
</html>
