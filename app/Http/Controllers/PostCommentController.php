<?php

namespace App\Http\Controllers;

use App\Notifications\PostComment as NotifyComment;
use App\Post;
use App\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store_comment(Request $request)
    {
        $comment_stored[] = PostComment::create($request->except('_token'));
        if ($comment_stored) {
            $post = Post::whereId($comment_stored[0]->post_id)->first();
            $post->user->notify(new NotifyComment(auth()->user(), $post));
            $comment = postCommentsHTML($comment_stored,$post);
            return ['success' => 'You commented has been posted', 'comment' => $comment];
        }
    }

    public function delete_comment(Request $request)
    {
        if ($request->user_id != auth()->user()->id) abort(404);
        PostComment::whereId($request->comment_id)->wherePostId($request->post_id)->whereUserId(auth()->user()->id)->delete();
        return ['success'=>'Comment Deleted Successfully'];
    }
}
