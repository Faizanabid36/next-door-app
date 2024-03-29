<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Salika - Professional A unique and beautiful collection of UI elements">
    <link rel="icon" href="{{asset('salika/assets/images/salika_logo.png')}}">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{asset('salika/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('salika/assets/css/framework.css')}}">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('salika/assets/css/icons.css')}}">

    <!-- Google font
    ================================================== -->
    {{--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">--}}


</head>

<body style="font-family: Helvetica, Arial, 'lucida grande', tahoma, verdana, arial, sans-serif">


<!-- Content
================================================== -->
<div uk-height-viewport class="uk-flex uk-flex-middle uk-grid-collapse uk-grid-match" uk-grid>
    <div class="form-media uk-width-2-3@m uk-width-1-2@s uk-visible@s uk-height-viewport uk-background-cover"
         data-src="{{asset('salika/assets/images/login_page.jpg')}}" uk-img>

        <div class="form-media-content uk-light">
            <div class="logo"><img src="{{asset('salika/assets/images/salika_logo.png')}}" alt="Salika"></div>

            <h1> Tagline of the business <br> goes here</h1>


            <div class="form-media-footer">
                <ul>
{{--                    <li><a href="#"> About </a></li>--}}
{{--                    <li><a href="#"> Contact </a></li>--}}
{{--                    <li><a href="#"> About </a></li>--}}
{{--                    <li><a href="#"> Contact </a></li>--}}
{{--                    <li><a href="#"> About </a></li>--}}
{{--                    <li><a href="#"> Contact </a></li>--}}
                </ul>
            </div>

        </div>

    </div>
    <div class="uk-width-1-3@m uk-width-1-2@s uk-animation-slide-right-medium">
        <div class="px-5">
{{--            <div class="card-body">--}}
{{--                {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                {{ __('If you did not receive the email') }},--}}
{{--                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">--}}
{{--                    .--}}
{{--                </form>--}}
{{--            </div>--}}
            <div class="my-4 uk-text-center">
                <h1 class="mb-2 text-dark"> Verify Your Account</h1>
                <p class="my-2 text-dark">{{ __('A fresh verification link has been sent to your email address.') }}
{{--                    <a href="{{route('login')}}" class="uk-link text-primary">--}}
{{--                        Login Here--}}
{{--                    </a>--}}
                </p>
            </div>
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                @if(Session::has('errors'))
                    <div class="text-center text-danger mb-1">
                        {{Session::get('errors')->first()}}
                    </div>
                @endif
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <button type="submit"
                        class="button primary large block mb-4">{{ __('click here to request another') }}</button>
            </form>
        </div>

    </div>
</div>

<!-- Content -End
================================================== -->


<!-- javaScripts
 ================================================== -->
<script src="{{asset('salika/assets/js/framework.js')}}"></script>
<script src="{{asset('salika/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('salika/assets/js/simplebar.js')}}"></script>
<script src="{{asset('salika/assets/js/main.js')}}"></script>


</body>

</html>

