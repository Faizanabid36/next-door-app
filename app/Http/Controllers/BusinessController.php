<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessCategory;
use App\Http\Requests\ValidateBusinessPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $business_categories = BusinessCategory::WhereNull('parent_id')->get();
        return view('web.frontend.business.all_business',compact('business_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Business $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }

    public function view_business_page($business_id)
    {
        $business = Business::with(['business_owner', 'category'])->whereId($business_id)->firstOrFail();
        return view('web.frontend.business.view_page', compact('business'));
    }

    public function list_by_category($b_category_slug)
    {
        $category_id = BusinessCategory::whereBCategorySlug($b_category_slug)->firstOrFail()->pluck('id');
        $businesses = Business::with('business_owner')->with('category')
            ->whereBusinessCategoryId($category_id)
            ->latest()->paginate(10);
        return view('web.frontend.business.business_by_category', compact('businesses'));
    }

    public function create_business_page()
    {
        $categories = BusinessCategory::all();
        return view('web.frontend.business.create_business_page', compact('categories'));
    }

    public function store_business_page(ValidateBusinessPage $request)
    {

        if (!($request->hasFile('banner_1'))) {
            $request->merge(['cover_banner' => asset('salika/assets/images/icons/market.png')]);
        } else {
            if (!Storage::disk('public')->exists('business_pages')) {
                Storage::disk('public')->makeDirectory('business_pages');
            }
            $path = storeImage($request->file('banner_1'), 'business_pages');
            $request->merge(['display_banner' => $path]);
        }
        if (!($request->hasFile('banner_2'))) {
            $request->merge(['cover_banner' => asset('salika/assets/images/avatars/profile-cover.jpg')]);
        }
        $request->merge([
            'created_by' => auth()->user()->id,
        ]);
        $business = Business::create($request->except(['_token', 'banner_1']));
        return back()->withSuccess('Your Page Has Been Published.');
    }
    public function edit_business_page(Business $business)
    {
        return view('web.frontend.business.edit_business_page',compact('business'));
    }
}
