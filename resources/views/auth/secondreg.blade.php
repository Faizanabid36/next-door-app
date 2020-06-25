
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Register Page </title>
    <link rel="apple-touch-icon" href="{{asset('../../../theme/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('../../../theme/app-assets/images/ico/favicon.ico')}}">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600')}}" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('../../../theme/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="{{asset('../../../theme/app-assets/images/pages/register.jpg')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Create Account</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Fill the below form to create a new account.</p><br>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form method="POST" action="{{ route('register_continue') }}">
                                                    @csrf
                                                    {{-- <div class="btn-group mb-1">
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Primary
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="#">Option 1</a>
                                                                <a class="dropdown-item" href="#">Option 2</a>
                                                                <a class="dropdown-item" href="#">Option 3</a>
                                                            </div>
                                                        </div>
                                                    </div> --}}


                                                     <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <select class="form-control">

                                                            <option>Select Country</option>
                                                            <option value="AD">Andorra</option>
                                                            <option value="AR">Argentina</option>
                                                            <option value="AS">American Samoa</option>
                                                            <option value="AT">Austria</option>
                                                            <option value="AU">Australia</option>
                                                            <option value="BD">Bangladesh</option>
                                                            <option value="BE">Belgium</option>
                                                            <option value="BG">Bulgaria</option>
                                                            <option value="BR">Brazil</option>
                                                            <option value="CA">Canada</option>
                                                            <option value="CH">Switzerland</option>
                                                            <option value="CZ">Czech Republic</option>
                                                            <option value="DE">Germany</option>
                                                            <option value="DK">Denmark</option>
                                                            <option value="DO">Dominican Republic</option>
                                                            <option value="ES">Spain</option>
                                                            <option value="FI">Finland</option>
                                                            <option value="FO">Faroe Islands</option>
                                                            <option value="FR">France</option>
                                                            <option value="GB">Great Britain</option>
                                                            <option value="GF">French Guyana</option>
                                                            <option value="GG">Guernsey</option>
                                                            <option value="GL">Greenland</option>
                                                            <option value="GP">Guadeloupe</option>
                                                            <option value="GT">Guatemala</option>
                                                            <option value="GU">Guam</option>
                                                            <option value="GY">Guyana</option>
                                                            <option value="HR">Croatia</option>
                                                            <option value="HU">Hungary</option>
                                                            <option value="IM">Isle of Man</option>
                                                            <option value="IN">India</option>
                                                            <option value="IS">Iceland</option>
                                                            <option value="IT">Italy</option>
                                                            <option value="JE">Jersey</option>
                                                            <option value="JP">Japan</option>
                                                            <option value="LI">Liechtenstein</option>
                                                            <option value="LK">Sri Lanka</option>
                                                            <option value="LT">Lithuania</option>
                                                            <option value="LU">Luxembourg</option>
                                                            <option value="MC">Monaco</option>
                                                            <option value="MD">Moldavia</option>
                                                            <option value="MH">Marshall Islands</option>
                                                            <option value="MK">Macedonia</option>
                                                            <option value="MP">Northern Mariana Islands</option>
                                                            <option value="MQ">Martinique</option>
                                                            <option value="MX">Mexico</option>
                                                            <option value="MY">Malaysia</option>
                                                            <option value="NL">Holland</option>
                                                            <option value="NO">Norway</option>
                                                            <option value="NZ">New Zealand</option>
                                                            <option value="PH">Phillippines</option>
                                                            <option value="PK">Pakistan</option>
                                                            <option value="PL">Poland</option>
                                                            <option value="PM">Saint Pierre and Miquelon</option>
                                                            <option value="PR">Puerto Rico</option>
                                                            <option value="PT">Portugal</option>
                                                            <option value="RE">French Reunion</option>
                                                            <option value="RU">Russia</option>
                                                            <option value="SE">Sweden</option>
                                                            <option value="SI">Slovenia</option>
                                                            <option value="SJ">Svalbard & Jan Mayen Islands</option>
                                                            <option value="SK">Slovak Republic</option>
                                                            <option value="SM">San Marino</option>
                                                            <option value="TH">Thailand</option>
                                                            <option value="TR">Turkey	</option>
                                                            <option value="US">United States</option>
                                                            <option value="VA">Vatican</option>
                                                            <option value="VI">Virgin Islands</option>
                                                            <option value="YT">Mayotte</option>
                                                            <option value="ZA">South Africa</option>


                                                        </select>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>

                                                </fieldset>

                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input id="postal" type="number" class="form-control" name="postal" required autocomplete="postal">

                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                    <label for="postal-code" class="col-md-4 col-form-label">{{ __('Postal Code') }}</label>
                                                </fieldset>
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input id="contact" type="number" class="form-control" name="contact" required autocomplete="contact">

                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                    <label for="contact" class="col-md-4 col-form-label">{{ __('Emergency Contact') }}</label>
                                                </fieldset>


                                                    {{-- <fieldset class="form-label-group form-group position-relative has-icon-left">

                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input  id="female" type="radio" name="gender" value="1" {{ (old('sex') == 'female') ? 'checked' : '' }}>
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        Male
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input id="male" type="radio" name="gender" value="0" {{ (old('sex') == 'male') ? 'checked' : '' }} >
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        Female
                                                                    </div>
                                                                </fieldset>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </fieldset>                                               --}}



                                                {{-- <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input id="address" type="text" class="form-control" name="address" required autocomplete="address">

                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                <label for="address" class="col-md-4 col-form-label">{{ __('Address') }}</label>
                                            </fieldset> --}}
                                            {{-- <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                <input id="contact" type="number" class="form-control" name="contact" required autocomplete="contact">

                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                            <label for="contact" class="col-md-4 col-form-label">{{ __('Emergency Contact') }}</label>
                                        </fieldset> --}}
                                                    {{-- <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <a href="{{ route('login') }}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a> --}}
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50"> {{ __('Register') }}</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('../../../theme/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('../../../theme/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('../../../theme/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('../../../theme/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>


