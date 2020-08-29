<?php

namespace App\Http\Controllers;

use App\User;
use App\UserBusinessRecommendation;
use Illuminate\Http\Request;

class UserBusinessRecommendationController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->merge(['user_id'=>auth()->user()->id]);
        UserBusinessRecommendation::create($request->except('_token'));
        return back()->withSucccess('Review Added');
    }
    public function delete($id)
    {
//        if(auth()->user()->id!=$id)
//            return back();
        UserBusinessRecommendation::whereId($id)->whereUserId(auth()->user()->id)->delete();
        return back();
    }
}
