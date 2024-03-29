<!doctype html>
<html lang="en">
<head>

    <!-- Basic Page Needs ================================================== -->
    <title>Salika</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salika">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth_id" content="{{auth()->user()->id??0}}">
    @yield('meta')
    <link rel="icon" href="{{asset('salika/assets/images/salika_logo.png')}}">

    <!-- CSS ================================================== -->
    <link rel="stylesheet" href="{{asset('salika/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/style.css?version='.time())}}">
    {{--    <link rel="stylesheet" href="{{asset('salika/assets/css/night-mode.css')}}">--}}
    <link rel="stylesheet" href="{{asset('salika/assets/css/framework.css?version='.time())}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/custom.css?version='.time())}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="{{asset('salika/assets/css/image-uploader.css')}}">

    <!-- icons ================================================== -->
    <link rel="stylesheet" href="{{asset('salika/assets/css/icons.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
</head>

<body style="font-family: 'Lato'!important;">
<!-- Wrapper -->
<div id="wrapper" class="{{str_contains(url()->current(),'business/view/page/')?'collapse-sidebar mobile-visible':''}}">

    <!-- sidebar -->
@auth()
    @include('layouts.salika.sidebar')
@endauth
<!-- sidebar -->

    <!-- header -->
    @auth()
        <div id="main_header">
            @include('layouts.salika.header')
        </div>
    @endauth

    <div class="main_content">
        @yield('content')
    </div>

    @auth()
        @include('layouts.salika.chat_sidebar')
    @endauth
</div>
@yield('modal')
<!--
==================================================
                    javaScripts
==================================================
-->
<script src="{{asset('salika/assets/js/jquery.min.js?version='.time())}}"></script>
<script src="{{asset('salika/assets/js/toastr.js')}}"></script>
<script type="text/javascript" src="{{asset('salika/assets/js/image-uploader.min.js')}}"></script>
@yield('footer_scripts')

<script src="{{asset('salika/assets/js/jquery-3.5.1.slim.min.js')}}"></script>
<script src="{{asset('salika/assets/js/popper.min.js')}}"></script>
<script src="{{asset('salika/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('salika/assets/js/framework.js?version='.time())}}"></script>
<script src="{{asset('salika/assets/js/simplebar.js?version='.time())}}"></script>
<script src="{{asset('salika/assets/js/main.js?version='.time())}}"></script>
<script src="{{asset('salika/assets/js/moment.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('salika/assets/js/pusher.min.js')}}"></script>



<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=261958965240905&autoLogAppEvents=1"
        nonce="GLWZhynL">
</script>

<script src="{{asset('salika/assets/js/code/public.js')}}"></script>
<script>
    const auth_id = document.querySelector('meta[name="auth_id"]').content || 0
    var pusher = new Pusher("{{ config('chatify.pusher.key') }}", {
        encrypted: true,
        cluster: "{{ config('chatify.pusher.options.cluster') }}",
        authEndpoint: '{{route("pusher.auth")}}',
        auth: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    });
</script>
<script src="{{asset('salika/assets/js/code/ajaxRequests.js')}}"></script>
<script src="{{asset('salika/assets/js/code/notifications_from_api.js')}}"></script>
<script src="{{asset('salika/assets/js/code/public.js')}}"></script>


</body>
</html>
