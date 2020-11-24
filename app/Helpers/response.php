<?php

use App\PostLike;

if (!function_exists('postsHTML')) {
    function postsHTML($posts)
    {
        $myLikes = PostLike::whereUserId(auth()->user()->id)->get();
        $myLikesID = $myLikes->pluck('post_id')->toArray();
        $data = '';
        foreach ($posts as $post) {
            $liked = '';
            $disliked = '';
            $res = '';
            $showDelete = '';
            $showReport = '';

            if (isset(auth()->user()->id) && $post->user_id == auth()->user()->id) {
                $showReport = '<li>
                                <a data-toggle="modal"
                                   data-post-id="' . $post->id . '"
                                   class="reportModal"
                                   data-target="#reportModal">
                                   <i class="uil-cancel mr-1"></i>
                                   Report
                                </a>
                            </li>';
            }
            if (isset(auth()->user()->id) && $post->user_id == auth()->user()->id) {
                $showDelete = '<div class="mt-0 p-2 uk-dropdown" uk-dropdown="pos: bottom-right;mode:hover ">' .
                    '<ul class="uk-nav uk-dropdown-nav">' .
                    '<li><a id="del-post-' . $post->id . '" onclick="deletePost(this)" class="text-danger">' .
                    ' <i class="uil-trash-alt mr-1"></i>' .
                    'Delete </a></li>' . $showReport . '</ul></div>';
            }
            if (!is_null($myLikes)) {
                if (in_array($post->id, $myLikesID))
                    $res = $myLikes->where('post_id', $post->id)->first();
                if (isset($res->like_dislike))
                    $res->like_dislike == 1 ? $liked = 'text-primary' : $disliked = 'text-danger';
            }
            $data .= '<div class="post uk-box-shadow-hover-large shadow-md" id="post-' . $post->id . '">' .
                '<div class="post-heading">' .
                '<div class="post-avature">' .
                '<img src="' . $post->user->avatar . '" alt="">' .
                '</div>' .
                '<div class="post-title">' .
                '<h4>' . $post->user->name . '</h4>' .
                '<p>' . $post->created_at->diffForHumans() . '<i class="uil-users-alt"></i></p>' .
                '</div>' .
                '<div class="post-btn-action">' .
                '<span class="icon-more uil-ellipsis-h" aria-expanded="false"></span>' .
                $showDelete .
                '</div>' .
                '</div>' .
                '<div class="post-description">' .
                '<p><b><i>' . ucfirst($post->subject) . '.</i></b>' . '' . ucfirst($post->body) . '</p>' .
                '</div>' .
                postAttachments($post) .
                postStateHTML($post, $liked, $disliked) .
                '<div class="post-comments" id="post-all-comments-' . $post->id . '"> ' .
//                '<a class="view-more-comment" > Veiw 8 more Comments </a > ' .
                postCommentsHTML($post->comments, $post) .
                '</div >' .
                '<div class="post-add-comment mt-0 pb-4" style="width: 94%;margin: 0px auto;">' .
                '<div class="post-add-comment-avature">' .
                '<img src="' . auth()->user()->avatar . '">' .
                '</div>' .
                '<div onkeyup="write_comment(this)" class="post-add-comment-text-area" id="form-post-comment-' . $post->id . '">' .
                '<input type="text" id="input-post-comment-' . $post->id . '" placeholder="Enter your comment...">' .
                '<div class="icons">' .
                '<a onclick="post_comment(this)" id="icon-post-comment-' . $post->id . '">' .
                '<span class="uil-arrow-right"></span>' .
                '</a>' .
                '</div>' .
                '</div>' .
                '</div >' .
                '</div >' .
                '</div >';
        }
        return $data;
    }
}
if (!function_exists('postCommentsHTML')) {
    function postCommentsHTML($comments, $post)
    {
        $comment_data = '';
        foreach ($comments as $comment) {
            $is_deletable = isset(auth()->user()->id) && $comment->user_id == auth()->user()->id ? '<a
onclick="delete_comment_from_post(' . $post->id . ',' . $comment->id . ')"
class="ml-1 mt-4 text-danger uil-trash" ></a >' : '';
            $comment_data .=
                '<div class="post-comments-single" id="post-' . $post->id . '-comment-' . $comment->id . '"> ' .
                '<div class="post-comment-avatar" > ' .
                '<img src = "' . $comment->user->avatar . '" > ' .
                '</div > ' .
                '<div class="post-comment-text" > ' .
                '<div class="post-comment-text-inner" > ' .
                '<h6 > ' . $comment->user->name . ' </h6 >' .
                '<p > ' . $comment->comment_text . ' </p >' .
                '</div >' .
                '<div class="uk-text-small" >' .
                '<a class="text-primary mr-1" > <i class="uil-thumbs-up" ></i > Like' .
                '</a >' .
                '<a class="text-secondary mr-1" > <i class="uil-thumbs-down" ></i > Dislike' .
                '</a >' .
                '<span > ' . $comment->created_at->diffForHumans() . ' </span >' .
                '</div >' .
                '</div >' .
                $is_deletable .
                '</div >';
        }
        return $comment_data;
    }
}

if (!function_exists('postStateHTML')) {
    function postStateHTML($post, $liked = '', $disliked = '')
    {
        return '<div class="post-state state-' . $post->id . '">' .
            '<div onclick="like_dislike_post(this)" id="like-post-' . $post->id . '" class="post-state-btns ' . $liked . '"><i class="uil-thumbs-up"></i>'
            . count($post->likes) .
            '<span> Likes </span>' .
            '</div>' .
            '<div onclick="like_dislike_post(this)" id="dislike-post-' . $post->id . '" class="post-state-btns ' . $disliked . '">' .
            '<i class="uil-thumbs-down"></i> ' .
            count($post->dislikes) . '' .
            '<span> Dislikes </span>' .
            '</div>' .
            '<div class="post-state-btns"><i class="uil-comment"></i> ' . count($post->comments) . ' <span> Comments</span>' .
            '</div>' .
            '<div class="post-state-btns"><i class="uil-share-alt"></i>' .
            'Share' .
            '<span class="mt-0 p-2 uk-dropdown" uk-dropdown="pos: bottom-right;mode:hover "> ' .
            '<ul class="uk-nav uk-dropdown-nav">' .
            '<li><a target="_blank" href="http://www.facebook.com/sharer.php?u=' . route('single.post', $post->id) . '&amp;src=sdkpreparse"> <i class="uil-facebook mr-1"></i> Share on Facebook</a></li>' .
            '<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=' . route('single.post', $post->id) . '"> <i class="uil-linkedin mr-1"></i> Share on LinkedIn</a></li>' .
            '</ul>' .
            '</span > ' .
            '</div > ' .
            '</div > ';
    }
}
if (!function_exists('postAttachments')) {
    function postAttachments($post)
    {
        $data = '';
        if ($post->has_attachments) {
            $data .= '<div uk-slideshow = "animation: pull" >' .
                '<div class=" uk-visible-toggle uk-light" tabindex = "-1" >' .
                '<ul class="uk-slideshow-items" >';
            foreach ($post->attachments as $attachment) {
                $data .= '<li >';
                if ($attachment->type == 'image')
                    $data .= '<img style="height: 100vh!important" src = "' . $attachment->attachment_path . '" alt = "" uk-cover >';
                else {
                    $data .= '<video controls>' .
                        '<source src="' . $attachment->attachment_path . '" type="video/mp4">' .
                        '</video >';
                }
                $data .= '</li >';
            }
            $data .= '</ul >' .
                '<a class="uk-position-center-left uk-position-small uk-hidden-hover" href = "#" uk-slidenav-previous uk-slideshow-item = "previous" ></a >' .
                '<a class="uk-position-center-right uk-position-small uk-hidden-hover" href = "#" uk-slidenav-next uk-slideshow-item = "next" ></a >' .
                '</div >' .
                '</div >';

        }
        return $data;
    }
}

