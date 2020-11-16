@extends('layouts.salika.index')
@section('meta')
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$post->subject}}"/>
    <meta property="og:description" content="{{$post->body}}"/>
    <meta property="og:site_name" content="Salika">
    @if ($post->has_attachments && $post->attachments->first()->type=='image')
        <meta property="og:image" content="{{$post->attachments->first()->attachment_path}}"/>
        <meta property="og:image:url" content="{{$post->attachments->first()->attachment_path}}"/>
        <meta name="twitter:image:alt" content="{{$post->subject}}">
        <meta property="og:image:width" content="500"/>
        <meta property="og:image:height" content="500"/>
    @endif

@endsection

@section('content')
    <div class="main_content_inner">
        <div class="uk-grid-large" uk-grid>
            <div class="uk-width-2-3@m fead-area" id="feed-area">
                <div class="post uk-box-shadow-hover-large shadow-md" id="post-{{$post->id}}">
                    <div class="post-heading">
                        <div class="post-avature">
                            <img src="{{$post->user->avatar}}" alt="">
                        </div>
                        <div class="post-title">
                            <h4> {{$post->user->name}} </h4>
                            <p> {{$post->created_at->diffForHumans()}} <i class="uil-users-alt"></i></p>
                        </div>
                    </div>
                    <div class="post-description">
                        <p><b><i> {{ucfirst($post->subject)}} </i></b> {{ucfirst($post->body)}} </p>
                    </div>
                    @if ($post->has_attachments)
                        <div uk-slideshow="animation: pull">
                            <div class=" uk-visible-toggle uk-light" tabindex="-1">
                                <ul class="uk-slideshow-items">
                                    @foreach ($post->attachments as $attachment)
                                        <li>
                                            @if ($attachment->type == 'image')
                                                <img style="height: 100vh!important"
                                                     src="{{$attachment->attachment_path}}"
                                                     alt="" uk-cover>
                                            @else
                                                <video controls>
                                                    <source src="{{$attachment->attachment_path}}" type="video/mp4">
                                                </video>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
                                   uk-slidenav-previous uk-slideshow-item="previous"></a>
                                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
                                   uk-slidenav-next uk-slideshow-item="next"></a>
                            </div>
                        </div>
                    @endif
                    <div class="post-state state-{{$post->id}}">
                        <div onclick="like_dislike_post(this)" id="like-post-{{$post->id}}"
                             class="post-state-btns"><i class="uil-thumbs-up"></i>
                            {{count($post->likes)}}
                            <span> Likes </span>
                        </div>
                        <div onclick="like_dislike_post(this)" id="dislike-post-{{$post->id}}"
                             class="post-state-btns">
                            <i class="uil-thumbs-down"></i>
                            {{count($post->dislikes)}}
                            <span> Dislikes </span>
                        </div>
                        <div class="post-state-btns"><i class="uil-comment"></i> {{count($post->comments)}}
                            <span> Comments</span>
                        </div>
                        <div class="post-state-btns"><i class="uil-share-alt"></i>
                            Share
                            <span class="mt-0 p-2 uk-dropdown" uk-dropdown="pos: bottom-right;mode:hover ">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse"><i
                                                class="uil-facebook mr-1"></i> Share on Facebook</a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}&title={{$post->subject}}"> <i
                                                class="uil-linkedin mr-1"></i> Share on LinkedIn</a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </div>
                    <div class="post-comments" id="post-all-comments-{{$post->id}}">
                        @foreach($post->comments as $comment)
                            <div class="post-comments-single" id="post-{{$post->id}}-comment-{{$comment->id}}">
                                <div class="post-comment-avatar">
                                    <img src="{{$comment->user->avatar}}">
                                </div>
                                <div class="post-comment-text">
                                    <div class="post-comment-text-inner">
                                        <h6> {{$comment->user->name}} </h6>
                                        <p> {{$comment->comment_text}} </p>
                                    </div>
                                    <div class="uk-text-small">
                                        <a class="text-primary mr-1"> <i class="uil-thumbs-up"></i> Like
                                        </a>
                                        <a class="text-secondary mr-1"> <i class="uil-thumbs-down"></i> Dislike
                                        </a>
                                        <span>   {{$comment->created_at->diffForHumans()}}   </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @auth()
                        <div class="post-add-comment mt-0 pb-4" style="width: 94%;margin: 0px auto;">
                            <div class="post-add-comment-avature">
                                <img src="{{auth()->user()->avatar}}">
                            </div>
                            <div onkeyup="write_comment(this)" class="post-add-comment-text-area"
                                 id="form-post-comment-  $post->id  ">
                                <input type="text" id="input-post-comment-  $post->id  "
                                       placeholder="Enter your comment">
                                <div class="icons">
                                    <a onclick="post_comment(this)" id="icon-post-comment-  $post->id  ">
                                        <span class="uil-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
