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
        <div class="px-5" style="margin-top: -50px">
            <div class="my-4 uk-text-center">
                <h1 class="mb-2 text-dark"> Login</h1>
                <p class="my-2 text-dark">Don't have an account?
                    <a href="{{ route('register') }}" class="uk-link text-primary">
                        Register Here
                    </a>
                </p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="uk-form-group">
                    <div class="uk-position-relative">
                        <input type="email" class="uk-input bg-secondary @error('email') is-invalid @enderror"
                               id="email"
                               placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email"
                               autofocus>
                    </div>
                </div>
                <div class="uk-form-group">
                    <div class="uk-position-relative">
                        <input type="password" class="uk-input bg-secondary @error('password') is-invalid @enderror"
                               id="password" placeholder="Password" name="password" required
                               autocomplete="current-password">
                    </div>
                </div>
                <div class="text-right mb-2"> @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div>

                @if(Session::has('errors'))
                    <div class="text-center text-danger mb-1">
                        {{Session::get('errors')->first()}}
                    </div>
                @endif
                <button type="submit" class="button primary large block mb-4">Login</button>
                {{--                <a href="#" class="text-center uk-display-block">--}}
                {{--                    <label><input class="uk-checkbox mr-2" type="checkbox"> I Agree terms </label>--}}
                {{--                </a>--}}
            </form>
            <div class="or-container" style="margin-top: 50px">
                <div class="line-separator text-dark"></div>
                <div class="or-label text-dark">OR</div>
                <div class="line-separator text-dark"></div>
            </div>

            <div class="text-center">
                <button class="button primary icon-label bg-facebook mr-2">
                    <span class="inner-icon"><i class="icon-brand-facebook-f"></i></span>
                    <span class="inner-text">
                    <a style="color: white" class="fb-share-button"
                       href="{{ url('/login/facebook') }}">
                        Facebook
                    </a>
                </span>
                </button>
                <button class="button primary icon-label google-color ml-2">
                    <span class="inner-icon"><i class="icon-brand-google"></i></span>
                    <span class="inner-text">
                    <a style="color: white" class="fb-share-button"
                       href="{{ url('/login/google') }}">
                                    Google
                    </a>
                </span>
                </button>
            </div>
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
