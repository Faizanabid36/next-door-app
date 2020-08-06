@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner pt-0">

        <div class="profile">
            <div class="profile-cover">

                <!-- profile cover -->
                <img src="{{asset('salika/assets/images/avatars/profile-cover.jpg')}}" alt="">

            </div>

            <div class="profile-details">
                <div class="profile-image">
                    <img src="{{$profile->avatar}}" alt="">
                </div>
                <div class="profile-details-info">
                    <h1 class="text-dark"> {{$profile->name}} </h1>
                    <p class="text-dark"> {{$profile->user_extra->bio}}</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="section-small">

            <div class="uk-grid">

                <div class="uk-width-2-3@m fead-area">
                    <div class="post">
                        <div class="post-heading">
                            <div class="post-avature">
                                <img src="{{asset('salika/assets/images/avatars/avatar-6.jpg')}}" alt="">
                            </div>
                            <div class="post-title">
                                <h4> Mariah Ali </h4>
                                <p> 5 <span> hrs</span> <i class="uil-users-alt"></i></p>
                            </div>
                            <div class="post-btn-action">
                                <span class="icon-more uil-ellipsis-h"></span>
                                <div class="mt-0 p-2" uk-dropdown="pos: top-right;mode:hover ">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a href="#"> <i class="uil-share-alt mr-1"></i> Share</a></li>
                                        <li><a href="#" class="text-danger"> <i class="uil-trash-alt mr-1"></i>
                                                Delete </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="post-description">
                            <div class="fullsizeimg">
                                <img src="{{asset('salika/assets/images/post/img-1.jpg')}}" alt="">
                            </div>

                            <div class="post-state-details">
                                <div>
                                    <img src="{{asset('salika/assets/images/icons/reactions_like.png')}}" alt="">
                                    <img src="{{asset('salika/assets/images/icons/reactions_love.png')}}" alt="">
                                    <p> 13 </p>
                                </div>
                                <p> 24 Comments</p>
                            </div>

                        </div>

                        <div class="post-state">
                            <div class="post-state-btns"><i class="uil-thumbs-up"></i> 126<span> Likes </span>
                            </div>
                            <div class="post-state-btns"><i class="uil-thumbs-down"></i> 126<span> Dislikes </span>
                            </div>
                            <div class="post-state-btns"><i class="uil-comment"></i> 18 <span> Coments</span>
                            </div>
                            <div class="post-state-btns"><i class="uil-share-alt"></i>  <span> Share
                                        </span>
                            </div>
                        </div>

                        <!-- post comments -->
                        <div class="post-comments">
                            <a href="#" class="view-more-comment"> Veiw 8 more Comments</a>
                            <div class="post-comments-single">
                                <div class="post-comment-avatar">
                                    <img src="{{asset('salika/assets/images/avatars/avatar-5.jpg')}}" alt="">
                                </div>
                                <div class="post-comment-text">
                                    <div class="post-comment-text-inner">
                                        <h6> Alex Dolgove</h6>
                                        <p> Ut wisi enim ad minim laoreet dolore magna aliquam erat </p>
                                    </div>
                                    <div class="uk-text-small">
                                        <a href="#" class="text-primary mr-1"> <i class="uil-thumbs-up"></i> Like
                                        </a>
                                        <a href="#" class="text-secondary mr-1"> <i class="uil-thumbs-down"></i> Dislike
                                        </a>
{{--                                        <a href="#" class=" mr-1"> Replay </a>--}}
                                        <span> 1d</span>
                                    </div>
                                </div>
                                <a href="#" class="post-comment-opt"></a>
                            </div>
                            <div class="post-add-comment">
                                <div class="post-add-comment-avature">
                                    <img src="{{$profile->avatar}}" alt="">
                                </div>
                                <div class="post-add-comment-text-area">
                                    <input type="text" placeholder="Write your comment...">
                                </div>
                            </div>

                        </div>


                    </div>

                </div>

                <!-- sidebar -->
                <div class="uk-width-expand ml-lg-2">


                    <h3> About </h3>
                    <div class="list-group-items">
                        <i class="uil-home-alt"></i>
                        <h5> Live in <span> Cairo , Eygept </span></h5>
                    </div>

                    <div class="list-group-items">
                        <i class="uil-location-point"></i>
                        <h5> From <span> Aden , Yemen </span></h5>
                    </div>

                    <div class="list-group-items">
                        <i class="uil-heart"></i>
                        <h5> in a <span> Relationship </span></h5>
                    </div>


                    <div class="list-group-items">
                        <i class="uil-rss"></i>
                        <h5> Flowwed by <span> 3,240 </span> <span> Peaple </span></h5>
                    </div>

                    @if(auth()->user()->id==$profile->id)
                        <a href="#" class="button soft-primary block my-3"> edit </a>
                    @endif


                    <hr class="mt-3 mb-0">
                </div>

            </div>

        </div>

    </div>
@endsection
