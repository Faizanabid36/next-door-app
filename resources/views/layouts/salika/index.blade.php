<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Salika</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salika">
    <link rel="icon" href="{{asset('salika/assets/images/salika_logo.png')}}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('salika/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/night-mode.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/framework.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/custom.css')}}">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('salika/assets/css/icons.css')}}">

    <!-- Google font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">


</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

    <!-- sidebar -->
        @include('layouts.salika.sidebar')
    <!-- sidebar -->

    <!-- header -->
    <div id="main_header">
        @include('layouts.salika.header')
    </div>

    <div class="main_content">
        @yield('content')
    </div>
</div>

<!-- javaScripts
            ================================================== -->


@yield('footer_scripts')
<script src="{{asset('salika/assets/js/framework.js')}}"></script>
<script src="{{asset('salika/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('salika/assets/js/simplebar.js')}}"></script>
<script src="{{asset('salika/assets/js/main.js')}}"></script>

</body>
</html>
