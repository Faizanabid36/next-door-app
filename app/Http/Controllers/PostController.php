<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function remove_post(Request $request)
    {
        $post = Post::find($request->post_id);
        if ($post->user_id == auth()->user()->id)
            $post->delete();
        return response()->json(['success' => 'Post Deleted Successfully']);
    }
}
