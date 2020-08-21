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
                                   href="http://www.facebook.com/sharer.php?u={{url()->current()}}">
                                    Facebook
                                </a>
                            </span>
                        </button>
                        <div class="fb-share-button"
                             data-href="{{url()->current()}}?"
                             data-layout="button_count">
                            {{--                                        <a target="_blank" style="color: green"--}}
                            {{--                                           href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup">--}}
                            {{--                                            Facebook--}}
                            {{--                                        </a>--}}
                        </div>
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

        <h2> Related products</h2>

        <div class="uk-position-relative mt-5" uk-slider="finite: true">

            <div class="uk-slider-container pb-3">

                <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-grid-small uk-grid">
                    @foreach($related_items as $rel)
                        <li>
                            <div class="market-list">
                                <div class="item-media">
                                    <img style="height: 100%" src="{{$rel->main_image->image_url}}" alt="{{$rel->title}}">
                                </div>
                                <div class="item-inner">
                                    <div class="item-title color-black font-weight-bold"> {{$rel->title}}</div>
                                    @if(!is_null($rel->price))
                                        <div class="item-price color-black">Price: {{$rel->price}}$
                                        </div>
                                    @else
                                        <div>
                                            <button class="primary button small circle">FREE</button>
                                        </div>
                                    @endif
                                    <span class="color-black"> Posted By: {{ucfirst($rel->user->name)}}</span>
                                    <span class="color-black">{{$rel->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev" href="#"
                   uk-slider-item="previous"></a>
                <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#"
                   uk-slider-item="next"></a>

            </div>

        </div>

    </div>
@endsection
