<?php

namespace App\Http\Controllers;

use App\BusinessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (auth()->user()->admin)
            return view('admin.business.add_category');
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessCategory $businessCategory)
    {
        //
    }
}
