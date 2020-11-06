@extends('layouts.salika.index')

@section('meta')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$property->neighbourhood}}={{$property->address}}"/>
    <meta property="og:description" content="{{$property->description}}"/>
    <meta property="og:image" content="{{$property->main_image->image_url}}"/>
    <meta property="og:image:url" content="{{$property->main_image->image_url}}"/>
    <meta property="og:site_name" content="Salika">
    <meta property="og:image:width" content="500"/>
    <meta property="og:image:height" content="500"/>
    <meta name="twitter:image:alt" content="{{$property->neighbourhood}}={{$property->address}}">
@endsection

@section('content')
    <div class="main_content_inner">
        <div class="uk-child-width-1-2@m uk-grid" uk-grid="">
            <div class="uk-first-column">
                <!-- slideshow -->
                <div class="uk-position-relative uk-slideshow"
                     uk-slideshow="animation: fade;min-height: 400; max-height: 600">

                    <ul class=" uk-slideshow-items rounded" style="min-height: 400px;">
                        @foreach($property->attachments as $attachment)
                            <li class="uk-transition-active">
                                <img src="{{$attachment->image_url}}" alt="" uk-cover="" class="uk-cover"
                                     style="height: 400px; width: 601px;">
                            </li>
                        @endforeach
                    </ul>

                    <div class="uk-position-bottom-center uk-position-small">
                        <ul class="uk-thumbnav  uk-flex-center  ">
                            @foreach($property->attachments as $key=>$image)
                                <li uk-slideshow-item="{{$key}}">
                                    <a href="#">
                                        <img src="{{$image->image_url}}" class="rounded" width="80">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>
            <div>

                <h2 class="text-dark">{{$property->neighbourhood}} - {{$property->address}} </h2>
                <div class="text-warning mb-3">
                    <h4 class="text-primary mb-1" style="font-weight: 600;">
                        {{ucfirst(str_replace('_',' ',$property->property_type))}}
                    </h4>
                </div>
                <hr>
                <div class="text-warning mb-3">
                    <span class="text-primary" style="font-weight: 600;">
                        {{ucfirst(str_replace('_',' ',$property->status))}}
                    </span>
                </div>
                <hr>
                <div class="mb-4">
                    <h4 class="mb-2">Total estimated price:</h4>
                    <span class="uk-h1 uk-text-bold mr-3">${{$property->price}}</span>
                </div>
                <div class="mb-4">
                    @auth()
                        @if(auth()->user()->id!=$property->user_id)
                            <button type="button" class="button primary icon-label bg-facebook">
                                <a href="{{route('user',$property->user_id)}}" class="text-white">
                                    <span class="inner-icon"><i class="icon-feather-message-square"></i></span>
                                    <span class="inner-text">Contact Seller</span>
                                </a>
                            </button>
                        @else
                            <button type="button" class="button primary icon-label bg-danger">
                                <a href="#" class="text-white">
                                    <span class="inner-icon"><i class="icon-feather-trash"></i></span>
                                    <span class="inner-text">Remove Item</span>
                                </a>
                            </button>
                        @endif
                    @endauth
                    <div class="or-container">
                        <div class="line-separator text-dark"></div>
                        <div class="or-label text-dark" style="font-weight:600 ;"><i>Share on Social Media</i></div>
                        <div class="line-separator text-dark"></div>
                    </div>
                    <div class="mt-5 text-center">
                        <button type="button" class=" ml-4 button primary icon-label bg-facebook">
                            <span class="inner-icon"><i class="icon-brand-facebook-f"></i></span>
                            <span class="inner-text">
                                <a style="color: white" target="_blank"
                                   href="http://www.facebook.com/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse">
                                    Facebook
                                </a>
                            </span>
                        </button>
                        <button class="button primary icon-label linkedin-color ml-4 ">
                            <span class="inner-icon"><i class="icon-brand-linkedin-in"></i></span>
                            <span class="inner-text">
                                <a target="_blank" style="color: white"
                                   href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$property->neighbourhood." ".$property->address}}">
                                    LinkedIn
                                </a>
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <div class="section-small">

            <div class="uk-grid-large uk-grid" uk-grid="">
                <div class="uk-width-2-3@m uk-first-column">

                    <!-- nav -->
                    <nav class="responsive-tab style-4 mb-5">
                        <ul uk-switcher="connect: #my-id ;animation: uk-animation-fade">
                            <li class="uk-active"><a href="#" aria-expanded="true">Description</a></li>
                            <li><a href="#" aria-expanded="false">Gallery</a></li>
                        </ul>
                    </nav>

                    <ul class="uk-switcher" id="my-id" style="touch-action: pan-y pinch-zoom;">
                        <li class="uk-active">
                            <p>
                                {{$property->description}}
                            </p>
                        </li>
                        <li>
                            <div class="uk-child-width-1-2@s uk-text-center uk-grid-small uk-grid" uk-grid=""
                                 uk-lightbox="animation: fade">
                                @foreach($property->attachments as $image)
                                    <div>
                                        <a href="{{$image->image_url}}" data-caption="{{$property->address}}">
                                            <img src="{{$image->image_url}}" alt="" class="rounded">
                                        </a>
                                    </div>
                                @endforeach
                            </div>


                        </li>

                    </ul>

                </div>

                <!-- sidebar -->
                <div class="uk-width-1-3@m">

                    <div uk-sticky="offset:90 ; media: @s ; bottom: true" class="uk-sticky">

                        <h3 class="mb-lg-5"> Related </h3>
                        <div class="market-list">
                            <div class="item-media" style="height: 160px">
                                <img src="assets/images/product/2.jpg" alt="">
                            </div>
                            <div class="item-inner">
                                <div class="item-price"> 23$</div>
                                <div class="item-title"> Wireless headphones</div>
                                <div class="item-statistic">
                                            <span> <i class="uil-thumbs-up"></i>
                                                <span class="count">16</span> likes </span>
                                    <span> <i class="uil-comment-message"></i>
                                                <span class="count">202</span> views </span>
                                </div>
                            </div>
                        </div>


                        <div class="market-list">
                            <div class="item-media" style="height: 160px">
                                <img src="assets/images/product/1.jpg" alt="">
                            </div>
                            <div class="item-inner">
                                <div class="item-price"> 50$</div>
                                <div class="item-title"> Wireless headphones</div>
                                <div class="item-statistic">
                                            <span> <i class="uil-thumbs-up"></i>
                                                <span class="count">16</span> likes </span>
                                    <span> <i class="uil-comment-message"></i>
                                                <span class="count">202</span> views </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="uk-sticky-placeholder" hidden="" style="height: 554px; margin: 0px;"></div>

                </div>
            </div>


        </div>


        <hr>

        <h2> Related product</h2>

        <div class="uk-position-relative mt-5 uk-slider" uk-slider="finite: true">

            <div class="uk-slider-container pb-3">

                <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-grid-small uk-grid"
                    style="transform: translate3d(0px, 0px, 0px);">

                    <li tabindex="-1" class="uk-active">
                        <div class="market-list">
                            <div class="item-media"><img src="assets/images/product/1.jpg" alt=""></div>

                            <div class="item-inner">
                                <div class="item-price"> 20$</div>
                                <div class="item-title"> Brown headphones</div>
                                <div class="item-statistic">
                                    <span> <span class="count">4</span> likes </span>
                                    <span> <span class="count">106</span> views </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li tabindex="-1" class="uk-active">
                        <div class="market-list">
                            <div class="item-media"><img src="assets/images/product/13.jpg" alt=""></div>

                            <div class="item-inner">
                                <div class="item-price"> 12$</div>
                                <div class="item-title"> Parfum Spray</div>
                                <div class="item-statistic">
                                    <span> <span class="count">2</span> likes </span>
                                    <span> <span class="count">286</span> views </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li tabindex="-1" class="uk-active">
                        <div class="market-list">
                            <div class="item-media"><img src="assets/images/product/2.jpg" alt=""></div>

                            <div class="item-inner">
                                <div class="item-price"> 23$</div>
                                <div class="item-title"> Wireless headphones</div>
                                <div class="item-statistic">
                                    <span> <span class="count">16</span> likes </span>
                                    <span> <span class="count">202</span> views </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li tabindex="-1" class="uk-active">
                        <div class="market-list">
                            <div class="item-media"><img src="assets/images/product/16.jpg" alt=""></div>

                            <div class="item-inner">
                                <div class="item-price"> 60$</div>
                                <div class="item-title"> Paper Coffee Cup</div>
                                <div class="item-statistic">
                                    <span> <span class="count">12</span> likes </span>
                                    <span> <span class="count">160</span> views </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li tabindex="-1" class="uk-active">
                        <div class="market-list">
                            <div class="item-media"><img src="assets/images/product/17.jpg" alt=""></div>

                            <div class="item-inner">
                                <div class="item-price"> 30$</div>
                                <div class="item-title"> Sed diam nonummy</div>
                                <div class="item-statistic">
                                    <span> <span class="count">9</span> likes </span>
                                    <span> <span class="count">136</span> views </span>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li tabindex="-1" class="">
                        <div class="market-list">
                            <div class="item-media"><img src="assets/images/product/15.jpg" alt=""></div>

                            <div class="item-inner">
                                <div class="item-price"> 10$</div>
                                <div class="item-title"> Herbal Shampoo</div>
                                <div class="item-statistic">
                                    <span> <span class="count">2</span> likes </span>
                                    <span> <span class="count">286</span> views </span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev uk-invisible"
                   href="#" uk-slider-item="previous"></a>
                <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#"
                   uk-slider-item="next"></a>
            </div>
        </div>
    </div>
@endsection
