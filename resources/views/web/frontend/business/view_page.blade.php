@extends('layouts.salika.index')

@section('content')
    <div class="course-intro-banner">
        <img src="{{$business->cover_banner}}" class="course-intro-banner-img" alt="">
        <div class="course-intro-banner-info uk-light main_content_inner" style="max-width: 1160px">
            <h6>{{$business->category->b_category_title}}</h6>
            <h1 style="text-shadow: 1px 2px 10px black;font-style: italic;"> {{$business->title}}
                <hr class="uk-visible@m">
            </h1>
            <h3 class="">{{$business->recommendations_count}} Recommendations</h3>

            <p><a href="#course-intro" class="uk-link-reset" uk-scroll> Read our story </a></p>

            <div class="course-details-info">
                <ul>
                    <li> By <a
                            href="{{route('view_profile',$business->business_owner->id)}}">{{$business->business_owner->name}} </a>
                    </li>
                </ul>
                @if($business->created_by==auth()->user()->id)
                    <ul>
                        <li> Edit Page <a href="{{route('business.edit_business_page',$business->id)}}">Here </a></li>
                    </ul>
                    <ul>
                        <li> Edit Gallery <a href="{{route('business.gallery_settings',$business->id)}}">Here </a></li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
    <div class="main_content_inner" style="max-width: 1160px">
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m">
                <div class="course-description-content" id="course-intro">
                    <h3 class="text-dark"><i>Our Story</i></h3>
                    <p class="text-dark">
                        {{$business->description}}
                    </p>
                </div>
                <hr>
                <div>
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="sets: true">

                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m">
                            @foreach($business->front_page_business_images as $img)
                                <li>
                                    <img src="{{$img->image_url}}">
                                </li>
                            @endforeach
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                           uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                           uk-slider-item="next"></a>

                    </div>
                    @if(count($business->front_page_business_images)>0)
                        <button class="button primary transition-3d-hover mt-5">
                            <span class="uil-image"></span>
                            <a href="{{route('business.view_gallery',$business->id)}}"
                               class="text-white ml-30">View Media Gallery</a>
                        </button>
                    @endif
                </div>
                @if(auth()->user()->id!=$business->created_by)
                    <div class="comments">
                        <h3 class="text-dark"><i>Tell people what's good about us</i> </h3>
                        <ul>
                            <li>
                                <div class="comments-avatar">
                                    <img src="{{auth()->user()->avatar}}" alt="">
                                </div>
                                <div class="comment-content">
                                    <form class="uk-grid-small uk-grid" action="{{route('reviews.store_review')}}"
                                          method="POST" uk-grid="">
                                        @csrf
                                        <input type="hidden" name="owner" value="{{$business->created_by}}">
                                        <div class="uk-width-1-1@s uk-grid-margin uk-first-column">
                                            <label class="uk-form-label">Your Review</label>
                                            <textarea class="uk-textarea"
                                                      required
                                                      name="review"
                                                      placeholder="Add your review here"
                                                      style=" height:75px"></textarea>
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
                @endif

                <h2 class="uk-heading-line mt-lg-5"><span class="text-dark italic"> <i>Why neighbours love us</i> </span></h2>
                <div class="comments mt-4">
                    <ul>
                        @if(count($reviews)>0)
                            @foreach($reviews as $review)
                                <li>
                                    <div class="comments-avatar"><img src="{{$review->user->avatar}}" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-by font-weight-bold">{{$review->user->name}}
                                        </div>
                                        <span class="font-weight-bold">{{$review->review}}</span>
                                        @if($review->user->id==auth()->user()->id)
                                            <a href="{{route('reviews.delete_review',$review->id)}}">
                                                <span class="text-danger uil-trash"></span>
                                            </a>
                                        @endif
                                        <br>
                                        <sub class="uk-text-small">{{$review->created_at->diffForHumans()}}</sub>
                                    </div>
                                </li>
                                <hr>
                            @endforeach
                        @else
                            <li class="text-dark">
                                No Review Added Yet
                            </li>
                        @endif
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
                        @if(auth()->user()->id!=$business->created_by)
                            @if(!$iRecommended)
                                <div class="text-center">
                                    <a title="Recommend" href="{{route('reviews.add_recommendation',$business->id)}}"
                                       class="button danger mb-2">
                                        <i class="uil-heart"></i>
                                        Recommend Our Business Here
                                    </a>
                                </div>
                            @else
                                <div class="text-center">
                                    <a title="Un-recommend"
                                       href="{{route('reviews.remove_recommendation',$business->id)}}"
                                       class="button primary mb-2">
                                        <i class="uil-heart-sign"></i>
                                        You've Already Recommended
                                    </a>
                                </div>
                            @endif
                        @endif

                        <h4 class=""> Business Info </h4>
                        <div class="uk-child-width-2-2 uk-grid-small uk-text-small" uk-grid>
                            <div>
                                <span> <i class="uil-envelope"></i> {{$business->email}}</span>
                            </div>
                            <div>
                                <span> <i class="uil-phone"></i> {{$business->contact_1}} </span>
                            </div>
                            <div>
                                <span> <i class="uil-phone"></i> {{$business->contact_2}} </span>
                            </div>
                            <div>
                                <span> <i class="uil-envelope-send"></i> {{$business->address}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function () {
            @if(Session::has('review_added'))
                UIkit.notification({
                    message: '<span class=\'uil-check\'></span>{{Session::get('review_added')}}',
                    status: 'success',
                    pos: 'top-center',
                    timeout: 5000
                })
            @endif
            @if(Session::has('review_deleted'))
                UIkit.notification({
                    message: '<span class=\'uil-check\'></span>{{Session::get('review_deleted')}}',
                    status: 'success',
                    pos: 'top-center',
                    timeout: 5000
                })
            @endif
            @if(Session::has('recommendation_added'))
                UIkit.notification({
                    message: '<span class=\'uil-check\'></span>{{Session::get('recommendation_added')}}',
                    status: 'success',
                    pos: 'top-center',
                    timeout: 5000
                })
            @endif
            @if(Session::has('recommendation_removed'))
                UIkit.notification({
                    message: '<span class=\'uil-check\'></span>{{Session::get('recommendation_removed')}}',
                    status: 'danger',
                    pos: 'top-center',
                    timeout: 5000
                })
            @endif

        })
    </script>
@endsection
