@extends('layouts.salika.index')

@section('content')

    <div class="course-intro-banner">

        <img src="{{$business->cover_banner}}" class="course-intro-banner-img" alt="">


        <div class="course-intro-banner-info uk-light main_content_inner" style="max-width: 1160px">
            <h6> {{$business->category->b_category_title}} </h6>
            <h1 class="mb-lg-6"> {{$business->title}}
                <hr class="uk-visible@m">
            </h1>

            <p><a href="#course-intro" class="uk-link-reset" uk-scroll> View Page details </a></p>

            <div class="course-details-info">
                <ul>
                    <li> By <a href="{{route('view_profile',$business->business_owner->id)}}">{{$business->business_owner->name}} </a></li>
                </ul>
                @if($business->created_by==auth()->user()->id)
                    <ul>
                        <li> Edit Page <a href="{{route('business.edit_business_page',$business->id)}}">Here </a></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="main_content_inner" style="max-width: 1160px">
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m">
                <div class="course-description-content" id="course-intro">
                    <h3> Description</h3>
                    <p>
                        {{$business->description}}
                    </p>
                </div>
                <h2 class="uk-heading-line mt-lg-5"><span class="text-dark"> Reviews </span></h2>
                <div class="comments mt-4">
                    <ul>
                        @foreach($reviews as $review)
                            <li>
                                <div class="comments-avatar"><img src="{{$review->user->avatar}}" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-by">{{$review->user->name}}
                                    </div>
                                    <p>{{$review->review}}
                                        @if($review->user->id==auth()->user()->id)
                                            <a href="{{route('reviews.delete_review',$review->id)}}">
                                                <span class="text-danger uil-trash"></span>
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>

                <hr>
                <div class="comments">
                    <h3 class="text-dark">Add Review </h3>
                    <ul>
                        <li>
                            <div class="comments-avatar">
                                <img src="{{auth()->user()->avatar}}" alt="">
                            </div>
                            <div class="comment-content">
                                <form class="uk-grid-small uk-grid" action="{{route('reviews.store_review')}}" method="POST" uk-grid="">
                                    @csrf
                                    <div class="uk-width-1-1@s uk-grid-margin uk-first-column">
                                        <label class="uk-form-label">Your Review</label>
                                        <textarea class="uk-textarea"
                                                  required
                                                  name="review"
                                                  placeholder="Add your review here"
                                                  style=" height:100px"></textarea>
                                    </div>
                                    <input type="hidden" name="business_id" value="{{$business->id}}">
                                    <div class="uk-grid-margin uk-first-column">
                                        <input type="submit" value="Add Review" class="button primary">
                                    </div>
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>


            </div>


            <div class="uk-width-1-3@m uk-flex-last@s uk-flex-first">
                <div class="course-intro-card"
                     uk-sticky="offset:95px;bottom:true;animation: uk-animation-slide-top-medium; bottom ; media: @s">

                    <div class="uk-inline overly-gradient-top">
                        <img src="{{$business->display_banner}}" alt="{{$business->title}}">
                    </div>
                    <div class="course-intro-card-innr">
                        <div class="text-center">
                            <a href="#" class="button danger mb-2">
                                <i class="uil-heart"></i>
                                Recommend Our Business Here
                            </a>
                        </div>
                        <h4 class=""> Business Info </h4>
                        <div class="uk-child-width-2-2 uk-grid-small uk-text-small" uk-grid>
                            <div>
                                <span> <i class="uil-mailbox"></i> {{$business->email}}</span>
                            </div>
                            <div>
                                <span> <i class="uil-phone"></i> {{$business->contact_1}} </span>
                            </div>
                            <div>
                                <span> <i class="uil-phone"></i> {{$business->contact_2}} </span>
                            </div>
                            <div>
                                <span> <i class="uil-globe"></i> {{$business->address}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
