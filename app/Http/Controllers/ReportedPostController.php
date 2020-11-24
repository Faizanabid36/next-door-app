<?php

namespace App\Http\Controllers;

use App\ReportedPost;
use Illuminate\Http\Request;

class ReportedPostController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        ReportedPost::updateOrCreate([
            'user_id' => auth()->user()->id,
            'item_id' => $request->get('item_id')
        ], $request->except('_token'));
        return response()->json(['success' => ucfirst($request->type) . ' Reported']);
    }
}
