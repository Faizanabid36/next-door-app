<?php

namespace App\Http\Controllers;


use App\Http\Requests\ValidatePostItem;
use App\Post;
use Illuminate\Http\Request;

class LostAndFoundController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::sectionPosts('lost-items');
        if ($request->ajax()) {
            return postsHTML($posts);
        }
        return view('web.frontend.lost_and_found.index');
    }

    public function store(ValidatePostItem $request)
    {
        $post = store_post($request);
        return response()->json(['success' => 'Item Posted Successfully', 'post' => $post]);
    }
}
