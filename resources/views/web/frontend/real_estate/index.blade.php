@extends('layouts.salika.index')
@section('content')
    <div class="main_content_inner">
        @include('web.frontend.real_estate.components.nav_links')
        <hr>
        <div class="shadow uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-grid mt-2 rounded" uk-grid="">
            <div class="uk-card-media-left uk-cover-container uk-first-column rounded">
                <img src="{{asset('salika/assets/images/business/business_image.jpg')}}" alt="" uk-cover=""
                     class="uk-cover" style="height: 272px; width: 408px;">
                <canvas width="600" height="300"></canvas>
            </div>
            <div>
                <div class="uk-card-body rounded">
                    <h3 class="uk-card-title font-weight-bold color-black mb-2">
                        <i>Real Estate Agents: Post Your Property Today!</i>
                    </h3>
                    <h6 class="color-black mb-0">Connect with local customers on Nextdoor and become your neighborhood's
                        favorite.</h6>
                    <button class="button primary mt-3 ">
                        <a href="{{route('real_estate.create')}}" class="color-white">
                            <i>Add Listing</i>
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="section-small">
            <h3 class="color-black"><i><u>Most Recommended Business</u></i></h3>
            <div class="uk-child-width-1-1@m uk-grid-collapse" uk-grid>
                @foreach($properties as $business)
                    <div>
                        <div class="pages-card">
                            <div class="page-card-media"><img src="{{$business->display_banner}}"
                                                              alt="{{$business->title}}">
                            </div>
                            <div class="page-card-innr">
                                <h3 style="margin-bottom: 0px"
                                    class="color-black font-weight-bold"><i>{{ucfirst($business->title)}}</i></h3>
                                <p style="margin-bottom: 0px"
                                   class="font-weight-bold pl-1"> {{ucfirst($business->category->b_category_title)}}</p>
                                <h6 style="margin-bottom: 0px"
                                    class="pl-1">{{substr($business->description,0,180)}}...</h6>

                                <div class="uk-flex uk-flex-middle mt-2">
                                    <div class="uk-width-expand pl-1">
                                        <p>
                                            <i>
                                                <strong>Recommended by:</strong> {{$business->recommendations_count}} people
                                            </i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="page-card-btn">
                                <a href="{{route('business.view_business_page',$business->id)}}" class="button primary">
                                    <i class="uil-eye"></i>
                                    View Page
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>
            @endforeach
            <!-- pagination menu -->
                <ul class="uk-flex-center my-5">
                    {{$properties->links()}}
                </ul>

            </div>


        </div>
@endsection
