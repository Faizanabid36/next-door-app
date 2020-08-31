@extends('layouts.salika.index')
@section('meta')
    <meta property="og:url"           content="{{url()->current()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
{{--    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />--}}
@endsection
@section('content')
    <div class="main_content_inner">

        <div class="section-header pb-0">
            <div class="section-header-left">
                <h3 class="color-black" style="margin-bottom: 0px"> Business List </h3>
                <p class="color-black font-weight-normal"> Find Business <span class="uk-visible@s"> By Browsing Categories </span></p>
            </div>
        </div>
        <div class="uk-position-relative" uk-slider="finite: true">
            <div class="uk-slider-container py-3">
                <ul
                    class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-3 uk-grid-small uk-grid">
                    @foreach($business_categories as $category)
                        <li>
                            <a href="{{route('business.list_by_category',$category->b_category_slug)}}">
                                <div class="group-catagroy-card animate-this"
                                     data-src="{{asset($category->b_category_icon)}}" uk-img>
                                    <div class="group-catagroy-card-content">
                                        <h4> {{$category->b_category_title}} </h4>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev" href="#"
                   uk-slider-item="previous"></a>
                <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#"
                   uk-slider-item="next"></a>
            </div>
        </div>
        <hr>
        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-grid mt-2" uk-grid="">
            <div class="uk-card-media-left uk-cover-container uk-first-column">
                <img src="{{asset('salika/assets/images/business/business_image.jpg')}}" alt="" uk-cover="" class="uk-cover" style="height: 272px; width: 408px;">
                <canvas width="600" height="300"></canvas>
            </div>
            <div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title font-weight-bold color-black mb-2">Business owners: Create your free business page today!</h3>
                    <h6 class="color-black mb-0">Connect with local customers on Nextdoor and become your neighborhood's favorite.</h6>
                    <button class="button primary mt-3 ">
                        <a href="{{route('business.create_business_page')}}" class="color-white">
                            Get Started
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="section-small">
            <h3 class="color-black"> Most Recommended Business </h3>

            <div class="uk-child-width-1-1@m uk-grid-collapse" uk-grid>
                @foreach($businesses as $business)
                    <div>
                        <div class="pages-card">
                            <div class="page-card-media"><img src="{{$business->display_banner}}"
                                                              alt="{{$business->title}}">
                            </div>
                            <div class="page-card-innr">
                                <h3 style="margin-bottom: 0px"
                                    class="color-black font-weight-bold"> {{ucfirst($business->title)}} </h3>
                                <p style="margin-bottom: 0px"
                                   class="font-weight-bold pl-1"> {{ucfirst($business->category->b_category_title)}}</p>
                                <h6 style="margin-bottom: 0px"
                                    class="pl-1">{{substr($business->description,0,180)}}...</h6>

                                <div class="uk-flex uk-flex-middle mt-2">
                                    <div class="uk-width-expand pl-1">
                                        <p><strong>Recommended by:</strong> {{$business->recommendations_count}} people
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="page-card-btn">
                                <a href="#" class="button primary">
                                    <i class="uil-eye"></i>
                                    View Page
                                </a>
                                {{--                            <a href="#" class="button danger">--}}
                                {{--                                <i class="uil-heart"></i>--}}
                                {{--                                Recommend--}}
                                {{--                            </a>--}}
                            </div>
                        </div>
                    </div>
                    <hr>
            @endforeach

            <!-- pagination menu -->
                <ul class="uk-flex-center my-5">
                    {{$businesses->links()}}
                </ul>

            </div>


        </div>
@endsection
