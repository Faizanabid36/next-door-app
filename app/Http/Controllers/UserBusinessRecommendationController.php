<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessRecommendations;
use App\User;
use App\UserBusinessRecommendation;
use Illuminate\Http\Request;

class UserBusinessRecommendationController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        $user = User::whereId($request->input('owner'))->first();
        $review = UserBusinessRecommendation::create($request->except('_token','owner'));
        $user->notify(new \App\Notifications\BusinessReview($review));
        return back()->withReviewAdded('Your Review Has Been Added');
    }

    public function delete($id)
    {
        UserBusinessRecommendation::whereId($id)->whereUserId(auth()->user()->id)->delete();
        return back()->withReviewDeleted('Your Review Has Been Deleted');
    }

    public function add_recommendation($id)
    {
        Business::whereId($id)->firstOrFail();
        BusinessRecommendations::updateOrCreate([
            'user_id' => auth()->user()->id,
            'business_id' => $id
        ],[
            'user_id' => auth()->user()->id,
            'business_id' => $id
        ]);
        return back()->withRecommendationAdded('You Recommended This Business');
    }
    public function remove_recommendation($id)
    {
        Business::whereId($id)->firstOrFail();
        BusinessRecommendations::whereBusinessId($id)->whereUserId(auth()->user()->id)->delete();
        return back()->withRecommendationRemoved('You Removed Your Recommendation');
    }

}
