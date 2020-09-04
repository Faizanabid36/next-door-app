<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessCategory;
use App\BusinessImages;
use App\BusinessRecommendations;
use App\Http\Requests\ValidateBusinessPage;
use App\UserBusinessRecommendation;
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
        $businesses = Business::withCount('recommendations')
            ->with('category')
            ->orderBy('recommendations_count','desc')->paginate(10);
//        return $businesses;
        return view('web.frontend.business.all_business',compact('business_categories','businesses'));
    }

    public function create_business_page()
    {
        $categories = BusinessCategory::all();
        return view('web.frontend.business.create_business_page', compact('categories'));
    }

    public function store_business_page(ValidateBusinessPage $request)
    {

        if (!($request->hasFile('banner_1'))) {
            $request->merge(['display_banner' => asset('salika/assets/images/icons/market.png')]);
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

    public function view_business_page($business_id)
    {
        $business = Business::with(['business_owner', 'category'])
            ->withCount('recommendations')
            ->whereId($business_id)->firstOrFail();
        $iRecommended = is_null(BusinessRecommendations::whereBusinessId($business->id)->whereUserId(auth()->user()->id)->first()) ? false : true;
        $reviews = UserBusinessRecommendation::whereBusinessId($business->id)->latest()->get();
        return view('web.frontend.business.view_page', compact('business', 'reviews', 'iRecommended'));
    }

    public function edit_business_page(Business $business)
    {
        $categories = BusinessCategory::all();
        return view('web.frontend.business.edit_business_page', compact('business', 'categories'));
    }

    public function update_business_page(ValidateBusinessPage $request, $business)
    {
        $b=Business::whereId($business)->firstOrFail();
        if (!($request->hasFile('banner_1'))) {
            $request->merge(['display_banner' => $b->display_banner]);
        } else {
            $path = storeImage($request->file('banner_1'), 'business_pages');
            $request->merge(['display_banner' => $path]);
        }
        if (!($request->hasFile('banner_2'))) {
            $request->merge(['cover_banner' => asset('salika/assets/images/avatars/profile-cover.jpg')]);
        }
        Business::whereId($business)->update($request->except(['_token', 'banner_1']));
        return back()->withSuccess('Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Business $business
     * @return \Illuminate\Http\Response
     */
    public function delete_business_page(Business $business)
    {
        //
        $business->delete();
        return back()->withSuccess('Page Deleted');
    }


    public function list_by_category($b_category_slug)
    {
        $category_id = BusinessCategory::whereBCategorySlug($b_category_slug)->firstOrFail()->pluck('id');
        $businesses = Business::with('business_owner')->with('category')
            ->withCount('recommendations')
            ->whereBusinessCategoryId($category_id)
            ->latest()->paginate(10);
        return view('web.frontend.business.business_by_category', compact('businesses'));
    }

    public function my_business()
    {
        $businesses = Business::whereCreatedBy(auth()->user()->id)->get();
        $categories = BusinessCategory::all();
        return view('web.frontend.business.my_pages', compact('businesses', 'categories'));
    }

    public function gallery_settings($business_id)
    {
        $business_images = BusinessImages::whereBusinessId($business_id)->whereUserId(auth()->user()->id)->get();
        return view('web.frontend.business.gallery_settings', compact('business_images', 'business_id'));
    }

    public function store_business_image(Request $request)
    {
        $this->validate($request, [
            'Picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if (!Storage::disk('public')->exists('business_pages/business-' . $request->input('business_id'))) {
            Storage::disk('public')->makeDirectory('business_pages/business-' . $request->input('business_id'));
        }
        $path = storeImage($request->file('Picture'), 'business_pages/business-' . $request->input('business_id'));
        $bi = new BusinessImages();
        $bi->business_id = $request->input('business_id');
        $bi->image_url = $path;
        $bi->user_id = auth()->user()->id;
        $bi->save();
        return back()->withSuccess('Image Uploaded');
    }

    public function delete_business_image($image_id)
    {
        $bi = BusinessImages::find($image_id);
        \File::delete(public_path('storage/business_pages/business-' . $bi->business_id . '/business_pages/' . basename($bi->image_url)));
        $bi->delete();
        return back()->withSuccess('Image Removed');
    }

    public function view_gallery($business_id)
    {
        $gallery_images = BusinessImages::whereBusinessId($business_id)->latest()->get()    ;
        return view('web.frontend.business.view_gallery', compact('gallery_images'));
    }
}
