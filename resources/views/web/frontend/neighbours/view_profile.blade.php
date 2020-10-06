@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner pt-0">
        <div class="profile">
            <div class="profile-cover">
                <!-- profile cover -->
                <img src="{{$user->cover??asset('users/cover/default_agency_cover.png')}}" alt="">
            </div>
            <div class="profile-details">
                <div class="profile-image">
                    <img src="{{$user->avatar}}" alt="">
                </div>
                <div class="profile-details-info">
                    <h1 class="text-dark"> {{$user->name}} </h1>
                    <p class="text-dark"> {{$user->user_extra->bio}}</p>
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
                                <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:click ">
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
                            <div class="post-state-btns"><i class="uil-share-alt"></i> <span> Share
                                        </span>
                            </div>
                            <div class="post-state-btns">
                                <i class="uil-share-alt"></i> <span> Share</span>
                                <div class="" uk-dropdown="pos: bottom-left;mode:hover">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a href="#"> <i class="uil-share-alt"></i> Share</a></li>
                                        <li><a href="#" class="text-danger"> <i class="uil-trash-alt"></i>
                                                Delete </a></li>
                                    </ul>
                                </div>
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
                                    <img src="{{$user->avatar}}" alt="">
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
                    <h3 class="text-dark"><i>About</i></h3>
                    @if(!$user->user_extra->hide_address)
                        <div class="list-group-items" style="font-style: italic">
                            <i class="uil-home-alt"></i>
                            <h5> Community <span> {{$user->address??'Unavailable'}} </span></h5>
                        </div>
                    @endif

                    @if(!$user->user_extra->hide_phone)
                        <div class="list-group-items" style="font-style: italic">
                            <i class="uil-phone-volume"></i>
                            <h5> Contact <span> {{$user->contact??'Unavailable'}} </span></h5>
                        </div>
                    @endif

                    <div class="list-group-items" style="font-style: italic">
                        <i class="uil-phone-times"></i>
                        <h5> Emergency Phone <span> {{$user->user_extra->emergency_contact??'Unavailable'}} </span>
                        </h5>
                    </div>
                    @if(!is_null($user->user_extra->birthdate))
                        <div class="list-group-items" style="font-style: italic">
                            <i class="icon-line-awesome-birthday-cake"></i>
                            <h5> DOB <span> {{($user->user_extra->birthdate)}} </span></h5>
                        </div>
                    @endif


                    @if(auth()->user()->id==$user->id)
                        <a href="{{route('edit_profile')}}" class="button soft-primary block my-3">
                            <span class="icon-feather-edit"></span>
                            Edit Profile
                        </a>
                    @endif

                    <hr class="mt-3 mb-0">
                </div>

            </div>

        </div>

    </div>
@endsection
