@extends('layouts.salika.index')

@section('content')
    <div class="main_content_inner">
        <div class="uk-flex uk-flex-between">
            <h1 class="color-black"><i>Lost and Found</i></h1>
            <button class="button primary small circle pull-right" data-toggle="modal" data-target="#addNewModal"><i
                    class="uil-plus"> </i> Add New
            </button>
        </div>
        <div class="uk-grid-large" uk-grid>
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
                            <div class="mt-0 p-2" uk-dropdown="pos: bottom-right;mode:hover ">
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
                            <img src="{{asset('salika/assets/images/post/img-1.jpg')}}">
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
                        <div class="post-state-btns"><i class="uil-thumbs-up"></i> 126
                            <span> Likes </span>
                        </div>
                        <div class="post-state-btns"><i class="uil-thumbs-down"></i> 126
                            <span> Dislikes </span>
                        </div>
                        <div class="post-state-btns"><i class="uil-comment"></i> 18
                            <span> Coments </span>
                        </div>
                        <div class="post-state-btns"><i class="uil-share-alt"></i>
                            <span> Share </span>
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
                                    <span> 1d</span>
                                </div>
                            </div>
                            <a href="#" class="post-comment-opt"></a>
                        </div>
                        <div class="post-add-comment">
                            <div class="post-add-comment-avature">
                                <img src="{{auth()->user()->avatar}}" alt="{{auth()->user()->name}}">
                            </div>
                            <div class="post-add-comment-text-area">
                                <input type="text" placeholder="Write your comment...">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('web.frontend.public_agencies.components.side_info')
        </div>
    </div>
@endsection

@include('web.frontend.components.new_post_modal',[$action='LostAndFoundController@store'])
