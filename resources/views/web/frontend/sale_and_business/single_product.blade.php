@extends('layouts.salika.index')

@section('meta')
    <meta property="og:url"           content="{{url()->current()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$item->title}}" />
    <meta property="og:description"   content="{{$item->description}}" />
    <meta property="og:image"         content="{{$item->main_image->image_url}}"/>
    <meta property="og:image:url"     content="{{$item->main_image->image_url}}"/>
    <meta property="og:site_name"     content="Salika">
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="500" />
    <meta name="twitter:image:alt"    content="{{$item->title}}">
@endsection

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
                                    <a href="#">
                                        <img src="{{$image->image_url}}" class="rounded" width="80"
                                                     alt="{{$image->title}}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <h1 class="color-black"><i>{{ucfirst($item->title)}}</i></h1>
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
                        @if(isset(auth()->user()->id)&&auth()->user()->id!=$item->user_id)
                            <button type="button" class="button primary icon-label bg-facebook">
                                <a href="{{route('user',$item->user_id)}}" class="text-white">
                                    <span class="inner-icon"><i class="icon-feather-message-square"></i></span>
                                    <span class="inner-text">Contact Seller</span>
                                </a>
                            </button>
                        @endif

                        @if(isset(auth()->user()->id) && auth()->user()->id == $item->user_id)
                            <button type="button" class="button primary icon-label bg-danger">
                                <a href="{{route('delete_item',$item->id)}}" class="text-white">
                                    <span class="inner-icon"><i class="icon-feather-trash"></i></span>
                                    <span class="inner-text">Remove Item</span>
                                </a>
                            </button>
                        @endif
                    </div>
                    <div class="or-container">
                        <div class="line-separator text-dark"></div>
                        <div class="or-label text-dark"><i>Share on Social Media</i></div>
                        <div class="line-separator text-dark"></div>
                    </div>
                    <div class="mt-5">
                        <button type="button" class="button primary icon-label bg-facebook">
                            <span class="inner-icon"><i class="icon-brand-facebook-f"></i></span>
                            <span class="inner-text">
                                <a style="color: white" target="_blank"
                                   href="http://www.facebook.com/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse">
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
                                   href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$item->title}}">
                                    LinkedIn
                                </a>
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

        @if(count($related_items)>0)
            <h2 class="mt-5">
                <i>Related products</i>
            </h2>
        @endif
        <div class="uk-position-relative mt-5" uk-slider="finite: true">

            <div class="uk-slider-container pb-3">

                <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-grid-small uk-grid">
                    @foreach($related_items as $rel)
                        <li>
                            <div class="market-list">
                                <div class="item-media">
                                    <img style="height: 85%;width: 100%" src="{{$rel->main_image->image_url}}"
                                         alt="{{$rel->title}}">
                                </div>
                                <div class="item-inner pt-0 mt-0">
                                    <div class="item-title">
                                        <h2 class="color-black font-weight-bold mb-0 mt-0">
                                            <a class="text-dark" href="{{route('sale_and_free.byItemInCategory',[$rel->category->category_slug,$rel->id])}}">
                                               <i> {{$rel->title}}</i>
                                            </a>
                                        </h2>
                                    </div>
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
