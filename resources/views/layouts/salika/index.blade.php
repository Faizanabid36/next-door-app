<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Salika</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salika">
    @yield('meta')
    <link rel="icon" href="{{asset('salika/assets/images/salika_logo.png')}}">
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('salika/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/night-mode.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/framework.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/custom.css')}}">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('salika/assets/css/icons.css')}}">

    <!-- Google font
    ================================================== -->
{{--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">--}}
{{--    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet'>--}}
    <link href='https://fonts.googleapis.com/css?family=IBM Plex Sans' rel='stylesheet'>
{{--    <link href="webfonts/ss-social-regular.css" rel="stylesheet" />--}}
</head>

{{--<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';">--}}
<body style="font-family: 'IBM Plex Sans'">
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

<script src="{{asset('salika/assets/js/jquery.min.js')}}"></script>
@yield('footer_scripts')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="{{asset('salika/assets/js/framework.js')}}"></script>
<script src="{{asset('salika/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('salika/assets/js/simplebar.js')}}"></script>
<script src="{{asset('salika/assets/js/main.js')}}"></script>


@yield('modal')
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=261958965240905&autoLogAppEvents=1" nonce="GLWZhynL"></script>

</body>
</html>
