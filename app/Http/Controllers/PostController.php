<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePostItem;
use App\Notifications\PostLiked;
use App\Post;
use App\PostLike;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request, $type)
    {
        if (!in_array($type, ['lost-items', 'news-feed', 'crime-awareness', 'questions', 'dashboard'])) abort(404);
        $type = $type == 'dashboard' ? 'news-feed' : $type;
        $posts = Post::sectionPosts($type);
        if ($request->ajax()) {
            return postsHTML($posts);
        }
        return view('web.frontend.home', compact('type'));
    }

    public function store(ValidatePostItem $request)
    {
        $post = store_post($request);
        return response()->json(['success' => 'Item Posted Successfully', 'post' => $post]);
    }


    public function remove_post(Request $request)
    {
        $post = Post::find($request->post_id);
        if ($post->user_id == auth()->user()->id)
            $post->delete();
        return response()->json(['success' => 'Post Deleted Successfully']);
    }

    public function like_dislike_post(Request $request)
    {
        if (!in_array($request->op, ['dislike', 'like']) || $request->user_id != auth()->user()->id)
            return response()->json(['message' => 'no success']);
        PostLike::updateOrCreate(['post_id' => $request->post_id], [
            'like_dislike' => $request->op == 'like' ? 1 : 0,
            'user_id' => auth()->user()->id,
            'post_id' => $request->post_id
        ]);
        $post = Post::whereId($request->post_id)->first();
        $postState = PostLike::wherePostId($post->id)->whereUserId(auth()->user()->id)->first();
        $liked = $disliked = '';
        $postState->like_dislike == 1 ? $liked = 'text-primary' : $disliked = 'text-danger';
        $operation = $postState->like_dislike == 1 ? 'liked' : 'disliked';
        $post->user->notify(new PostLiked($operation, auth()->user(), $post));
        $response = postStateHTML($post, $liked, $disliked);
        return ['response' => $response, 'operation' => $liked == '' ? 'You disliked this post' : 'You Liked this Post'];
    }
}
