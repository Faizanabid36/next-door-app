<!doctype html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Socialite Network HTML Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">
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
            <div class="logo"><img src="{{asset('salika/assets/images/salika_logo.png')}}" alt=""></div>

            <h1> Tagline of the business <br> goes here</h1>


            <div class="form-media-footer">
                <ul>
                    <li><a href="#"> About </a></li>
                    <li><a href="#"> Contact </a></li>
                    <li><a href="#"> About </a></li>
                    <li><a href="#"> Contact </a></li>
                    <li><a href="#"> About </a></li>
                    <li><a href="#"> Contact </a></li>
                </ul>
            </div>

        </div>

    </div>
    <div class="uk-width-1-3@m uk-width-1-2@s uk-animation-slide-right-medium">
        <div class="px-5" style="margin-top: -50px">
            <div class="my-4 uk-text-center">
                <h1 class="mb-2 text-dark"> {{ __('Reset Password') }}</h1>
                <p class="my-2 text-dark">Don't have an account?
                    <a href="{{ route('register') }}" class="uk-link text-primary">
                        Register Here
                    </a>
                </p>
            </div>
            @if (session('status'))
                <div class="bg-gradient-success shadow-success uk-light text-white text-center" uk-alert>
                    <a class="uk-alert-close color-white" uk-close></a>
                    <strong>Success:</strong> {{Session::get('status')}}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="uk-form-group">
                    <div class="uk-position-relative">
                        <input type="email" class="uk-input bg-secondary @error('email') is-invalid @enderror"
                               id="email"
                               placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email"
                               autofocus>
                    </div>
                </div>

                @error('email')
                <div class="text-center text-danger mb-1">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <button type="submit" class="button primary large block mb-4">Get Password Reset Link</button>
                {{--                <a href="#" class="text-center uk-display-block">--}}
                {{--                    <label><input class="uk-checkbox mr-2" type="checkbox"> I Agree terms </label>--}}
                {{--                </a>--}}
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
