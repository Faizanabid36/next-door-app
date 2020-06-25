@extends('layouts.main')
@section('title','Single Product')
@section('styles')
   
 <script src="{{asset('theme/app-assets/js/scripts/pages/app-ecommerce-details.js')}}"></script>
 <script src="{{asset('theme/app-assets/js/scripts/forms/number-input.js')}}"></script>
 
 <script src="{{asset('theme/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
 <script src="{{asset('theme/app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endsection

@section('single')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Post Details</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                </li>
                                <li class="breadcrumb-item"><a href="app-ecommerce-shop.html">Shop</a>
                                </li>
                                <li class="breadcrumb-item active">Details
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- app ecommerce details start -->
            <section class="app-ecommerce-details">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5 mt-2">
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">

                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                           
                                            <div id="carousel-keyboard" class="carousel slide" data-keyboard="true">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-keyboard" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carousel-keyboard" data-slide-to="1"></li>
                                                    <li data-target="#carousel-keyboard" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <img class="img-fluid" src="{{asset('../../../theme/app-assets/images/slider/03.jpg')}}" alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="img-fluid" src="{{asset('../../../theme/app-assets/images/slider/06.jpg')}}" alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="img-fluid" src="{{asset('../../../theme/app-assets/images/slider/01.jpg')}}" alt="Third slide">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6" >
                                <h2 style="font-weight: bold">Canon - EOS 5D Mark IV DSLR Camera with 24-70mm f/4L IS USM Lens
                                </h2>
                                {{-- <p class="text-muted">by Apple</p> --}}
                                <div class="ecommerce-details-price d-flex flex-wrap">

                                    <h3 class="text-primary ">$43.99</h3>
                                    {{-- <span class="pl-1 font-medium-3 border-left">
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-secondary"></i>
                                    </span>
                                    <span class="ml-50 text-dark font-medium-1">424 ratings</span> --}}
                                </div>
                                <hr>
                                <p>Shoot professional photos and videos with this Canon EOS 5D Mk V 24-70mm lens kit. A huge 30.4-megapixel
                                    full-frame sensor delivers outstanding image clarity, and 4K video is possible from this DSLR for powerful
                                    films. Ultra-precise autofocus and huge ISO ranges give you the images you want from this Canon EOS 5D Mk V
                                    24-70mm lens kit.</p>
                                    
                                    
                                <hr>
                                <div class="form-group">
                                   
                                    {{-- <ul class="list-unstyled mb-0 product-color-options">
                                        <li class="d-inline-block selected">
                                            <div class="color-option b-primary">
                                                <div class="filloption bg-primary"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-success">
                                                <div class="filloption bg-success"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-danger">
                                                <div class="filloption bg-danger"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-warning">
                                                <div class="filloption bg-warning"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-black">
                                                <div class="filloption bg-black"></div>
                                            </div>
                                        </li>
                                    </ul> --}}
                                    <span><img class="round"
                                        src="{{asset(auth()->user()->avatar)}}"
                                        alt="avatar" height="60" width="60"> <br><span class="font-weight-bold " > Dennis Clark <br> </span>Australia</span>
                               
                                </div>
                                <hr>
                               

                                <div class="d-flex flex-column flex-sm-row">
                                    <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-message-square mr-25"></i>Message</button>
                                   
                                </div>
                                <hr>
                                {{-- <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i class="feather icon-facebook"></i></button>
                                <button type="button" class="btn btn-icon rounded-circle btn-outline-info mr-1 mb-1"><i class="feather icon-twitter"></i></button>
                                <button type="button" class="btn btn-icon rounded-circle btn-outline-danger mr-1 mb-1"><i class="feather icon-youtube"></i></button>
                                <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i class="feather icon-instagram"></i></button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="item-features py-5">
                        <div class="row text-center pt-2">
                            <div class="col-12 col-md-4 mb-4 mb-md-0 ">
                                <div class="w-75 mx-auto">
                                    <i class="feather icon-award text-primary font-large-2"></i>
                                    <h5 class="mt-2 font-weight-bold">100% Original</h5>
                                    <p>Chocolate bar candy canes ice cream toffee. Croissant pie cookie halvah.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="w-75 mx-auto">
                                    <i class="feather icon-clock text-primary font-large-2"></i>
                                    <h5 class="mt-2 font-weight-bold">10 Day Replacement</h5>
                                    <p>Marshmallow biscuit donut dragée fruitcake. Jujubes wafer cupcake.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="w-75 mx-auto">
                                    <i class="feather icon-shield text-primary font-large-2"></i>
                                    <h5 class="mt-2 font-weight-bold">1 Year Warranty</h5>
                                    <p>Cotton candy gingerbread cake I love sugar plum I love sweet croissant.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="card-body">
                        <div class="mt-4 mb-2 text-center">
                            <h2>RELATED PRODUCTS</h2>
                            <p>People also search for this items</p>
                        </div>
                        <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Bowers & Wilkins</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/apple-watch.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$19.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Alienware - 17.3" Laptop - Intel Core i7 - 16GB Memory - NVIDIA GeForce GTX 1070 - 1TB Hard Drive +
                                            128GB Solid State Drive - Silver
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Alienware</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/beats-headphones.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$35.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Canon - EOS 5D Mark IV DSLR Camera with 24-70mm f/4L IS USM Lens
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Canon</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-3 py-50">
                                        <img src="../../../app-assets/images/elements/macbook-pro.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$49.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Apple - 27" iMac with Retina 5K display - Intel Core i7 - 32GB Memory - 2TB Fusion Drive - Silver
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Apple</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/homepod.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$29.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Bowers Wilkins - CM10 S2 Triple 6-1/2" 3-Way Floorstanding Speaker (Each) - Gloss Black
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Bowers & Wilkins</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/magic-mouse.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$99.98</p>
                                    </div>
                                </div>
                                <div class="swiper-slide rounded swiper-shadow">
                                    <div class="item-heading">
                                        <p class="text-truncate mb-0">
                                            Garmin - fenix 3 Sapphire GPS Watch - Silver
                                        </p>
                                        <p>
                                            <small>by</small>
                                            <small>Garmin</small>
                                        </p>
                                    </div>
                                    <div class="img-container w-50 mx-auto my-2 py-75">
                                        <img src="../../../app-assets/images/elements/iphone-x.png" class="img-fluid" alt="image">
                                    </div>
                                    <div class="item-meta">
                                        <div class="product-rating">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </div>
                                        <p class="text-primary mb-0">$59.98</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                        </div>
                    </div> --}}
                </div>
            </section>
            <!-- app ecommerce details end -->

        </div>
    </div>
</div>
<!-- END: Content-->
    
@endsection