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
            <h3 class="color-black"><i><u>Real Estate Listings</u></i></h3>
            <div class="uk-grid-large uk-grid" uk-grid="">
                <div class="uk-width-3-4@m uk-first-column">
                    @foreach($properties as $property)
                        <div class="course-card course-card-list shadow rounded pb-0">
                            <div class="course-card-thumbnail">
                                <a href="{{route('real_estate.show',$property->id)}}"><img
                                        src="{{isset($property->main_image)?$property->main_image->image_url:''}}"></a>
                            </div>
                            <div class="course-card-body m-3">
                                <a href="{{route('real_estate.show',$property->id)}}">
                                    <h3 class=" text-dark mb-1">
                                        {{$property->price}}$
                                    </h3>
                                </a>
                                <p class="text-primary"><i class="icon-feather-globe mr-1"></i>
                                    <i>{{ucfirst($property->address)}}</i>
                                    <span style="float: right"
                                          class="blog-post-info-tag button warning"> {{ucfirst($property->status)}}</span>
                                </p>
                                <div class="course-details-info text-dark">
                                    <ul>
                                        <li class="text-dark"><h5>
                                                {{$property->no_of_bed_rooms??0}} Bed Rooms
                                            </h5>
                                        </li>
                                        <li class="text-dark"><h5>
                                                {{$property->no_of_bath_rooms??0}} Bath Rooms
                                            </h5>
                                        </li>
                                        <li class="text-dark"><h5>
                                                {{$property->area_in_sqft??0}} Sqft
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                @endforeach

                <!-- pagination menu -->
                    <ul class="uk-flex-center my-5">
                        {{$properties->links()}}
                    </ul>
                </div>
                <div class="uk-width-expand">
                    <div class="sidebar-filter uk-sticky" uk-sticky="offset:30 ; media : @s: bottom: true" style="">
                        <div class="sidebar-filter-contents">
                            <h4 class="text-primary"><i>Apply Filters</i></h4>
                            <form action="">
                                <ul class="sidebar-filter-list uk-accordion" uk-accordion="multiple: true">
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#"> Search </a>
                                        <div class="uk-accordion-content" aria-hidden="false">
                                            <div class="uk-form-controls">
                                                <label>
                                                    <input class="uk-input uk-form-width-medium uk-form-small" min="0" name="search" type="text" placeholder="Zip,City or Neighbourhood">
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="uk-open">
                                        <a class="uk-accordion-title" href="#"> Pricing </a>
                                        <div class="uk-accordion-content" aria-hidden="false">
                                            <div class="uk-form-controls">
                                                <label>
                                                    <input class="uk-input uk-form-width-medium uk-form-small" min="0" name="min" type="number" placeholder="Min">
                                                </label>
                                                <label>
                                                    <input class="uk-input uk-form-width-medium uk-form-small" min="0" name="max" type="number" placeholder="Max">
                                                </label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="">
                                        <a class="uk-accordion-title" href="#"> Property Type </a>
                                        <div class="uk-accordion-content" aria-hidden="false">
                                            <div class="uk-form-controls">
                                                <label>
                                                    <input class="uk-radio" type="radio" name="property_type" value="residential">
                                                    <span class="test"> Residential </span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" type="radio" name="property_type" value="rental">
                                                    <span class="test"> Rental </span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="">
                                        <a class="uk-accordion-title" href="#"> Property Status </a>
                                        <div class="uk-accordion-content" aria-hidden="true" hidden="">
                                            <div class="uk-form-controls">
                                                <label>
                                                    <input class="uk-radio" value="pending" type="radio" name="status">
                                                    <span class="test"> Pending </span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" value="sold" type="radio" name="status">
                                                    <span class="test"> Sold</span>
                                                </label>
                                                <label>
                                                    <input class="uk-radio" value="for_sale" type="radio" name="status">
                                                    <span class="test"> For Sale</span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="mt-1">
                                    <input type="submit" class="button primary small" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="uk-sticky-placeholder" style="height: 365px; margin: 0px;" hidden=""></div>
                </div>
            </div>
        </div>
@endsection
