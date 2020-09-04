<?php

namespace App\Http\Controllers;

use App\AdminAd;
use App\Http\Requests\ValidateAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads = AdminAd::all();
        return view('admin.ads.all_ads',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (auth()->user()->admin) return view('admin.ads.create_ad');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateAds $request)
    {
        $this->validate($request, [
            'Picture' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
        if (!Storage::disk('public')->exists('ads'))
            Storage::disk('public')->makeDirectory('ads');
        $request->merge([
            'ad_media' => storeImage($request->file('Picture'), 'ads'),
            'user_id' => auth()->user()->id
        ]);
        AdminAd::create($request->except('_token', 'Picture'));
        return back()->withCreated('Ad Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminAd  $adminAd
     * @return \Illuminate\Http\Response
     */
    public function show(AdminAd $adminAd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminAd  $adminAd
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminAd $adminAd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminAd  $adminAd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminAd $adminAd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AdminAd $adminAd
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminAd $adminAd)
    {
        //
    }

    public function update_ad(ValidateAds $request)
    {
        $bi = AdminAd::whereId($request->input('id'))->first();
        if (request()->hasFile('Picture')) {
            $request->merge(['ad_media' => storeImage($request->file('Picture'),'ads')]);
            \File::delete(public_path('storage/ads/' . basename($bi->ad_media)));
        }
        AdminAd::whereId($request->input('id'))->whereUserId(auth()->user()->id)->update($request->except('_token', 'Picture'));
        return back()->withupdated('Success');
    }

}
