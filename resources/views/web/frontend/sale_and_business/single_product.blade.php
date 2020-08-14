@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner">


        <div class="uk-child-width-1-2@m" uk-grid>
            <div>

                <!-- slideshow -->
                <div class="uk-position-relative"
                     uk-slideshow="animation: fade;min-height: 400; max-height: 600">

                    <ul class=" uk-slideshow-items rounded">
                        @foreach($item->images as $image)
                            <li>
                                <img src="{{$image->image_url}}" alt="{{$item->title}}" uk-cover>
                            </li>
                        @endforeach
                    </ul>

                    <div class="uk-position-bottom-center uk-position-small">
                        <ul class="uk-thumbnav  uk-flex-center">
                            @foreach($item->images as $key=>$image)
                                <li uk-slideshow-item="{{$key}}">
                                    <a href="#"><img src="{{$image->image_url}}" class="rounded" width="80"
                                                     alt="{{$image->title}}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div>
                <h1 class="color-black">{{ucfirst($item->title)}}</h1>
                <h5 class="mb-2 color-black">Description:</h5>
                <p class="color-black">{{ucfirst($item->description)}}
                </p>
                <hr>
                <div class="mb-4">
                    @if(!is_null($item->price))
                        <h6 class="mb-2 color-black">Total price:</h6>
                        <span class="uk-h1 uk-text-bold mr-3 color-black"><span class="icon-line-awesome-tag"></span>{{$item->price}}$</span>
                    @else
                        <h2 class="color-links"><span class="icon-line-awesome-tag"></span>FREE</h2>
                    @endif
                </div>
                <div class="mb-4">
                    <div>
                        {{--                        <button class="button primary"><span class="icon-feather-message-square"></span> Contact Seller </button>--}}
                        <button type="button" class="button primary icon-label bg-facebook">
                            <span class="inner-icon"><i class="icon-feather-message-square"></i></span>
                            <span class="inner-text">Contact Seller</span>
                        </button>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <h5 class="mb-4 color-black">Share on Social Media:</h5>
                        <button type="button" class="button primary icon-label bg-facebook">
                            <span class="inner-icon"><i class="icon-brand-facebook-f"></i></span>
                            <span class="inner-text">
                                <a target="_blank" style="color: white"
                                   href="http://www.facebook.com/sharer.php?u={{url()->current()}}&title={{$item->title}}">
                                    Facebook
                                </a>
                            </span>
                        </button>
                        <button class="button primary icon-label whatsapp-color">
                            <span class="inner-icon"><i class="icon-brand-whatsapp"></i></span>
                            <span class="inner-text">
                                <a target="_blank" style="color: white"
                                   href="https://wa.me/?text={{$item->title}}+{{url()->current()}}">
                                    Whatsapp
                                </a>
                            </span>
                        </button>
                        <button class="button primary icon-label linkedin-color">
                            <span class="inner-icon"><i class="icon-brand-linkedin-in"></i></span>
                            <span class="inner-text">
                                <a target="_blank" style="color: white"
                                   href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&summary={{$item->single}}">
                                    LinkedIn
                                </a>
                            </span>
                        </button>
                    </div>
                    <div class="mt-4">
                        <button data-url="" type="button" class="button primary icon-label bg-twitter twitter-color">
                            <span class="inner-icon"><i class="icon-brand-twitter"></i></span>
                            <span class="inner-text">
                                <a target="_blank" style="color: white"
                                   href="http://twitter.com/share?url={{url()->current()}}&text={{$item->title}}&hashtags=salika">
                                    Twitter
                                </a>
                            </span>
                        </button>
                        <button data-url="" type="button" class="button primary icon-label pinterest-color">
                            <span class="inner-icon"><i class="icon-brand-pinterest"></i></span>
                            <span class="inner-text">
                                <a target="_blank" style="color: white"
                                   href="https://pinterest.com/pin/create/button/?media={{$item->main_image->image_url}}&url={{url()->current()}}&description={{$item->title}}">
                                    Pinterest
                                </a>
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <h2> Related product</h2>

        <div class="uk-position-relative mt-5" uk-slider="finite: true">

            <div class="uk-slider-container pb-3">

                <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-grid-small uk-grid">

                    <li>
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
                    <li>
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
                    <li>
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
                    <li>
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
                    <li>
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
                    <li>
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

                <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev" href="#"
                   uk-slider-item="previous"></a>
                <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#"
                   uk-slider-item="next"></a>

            </div>

        </div>

    </div>
@endsection
