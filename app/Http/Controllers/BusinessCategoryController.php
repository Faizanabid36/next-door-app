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
        $categories = BusinessCategory::whereNull('parent_id')->get();
        return view('admin.business.view_categories', compact('categories'));
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
        $this->validate($request, [
            'category_title' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $file = $request->file('icon');
        $imageName = $request->get('category_title') . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/business_icons');
        $file->move($destinationPath, $imageName);
        $bc = new BusinessCategory();
        $bc->b_category_icon = asset('/business_icons/' . $imageName);
        $bc->b_category_title = $request->get('category_title');
        $bc->b_category_slug = preg_replace('/\W|\_+/m', '-', $request->input('category_title'));
        $bc->save();
        return back()->with('created', 'Created Successfully');
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
     * @param \App\BusinessCategory $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $businessCategory=BusinessCategory::with('children')->whereId($id)->firstOrFail();

        if (count($businessCategory->children) > 0)
            return back()->with('error', 'Cannot Delete Category');
        $businessCategory->delete();

        return back()->with('deleted', 'Category Deleted');
    }

    public function edit_business_category(Request $request)
    {
        $this->validate($request, [
            'b_category_title' => 'required',
        ]);
        if (request()->hasFile('icon')) {
            $file = $request->file('icon');
            $imageName = $request->get('b_category_title') . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/business_icons');
            $file->move($destinationPath, $imageName);
            (\request()->merge(['b_category_icon' => asset('/business_icons/' . $imageName)]));
        }
        \request()->merge(['b_category_slug' => preg_replace('/\W|\_+/m', '-', $request->input('b_category_title'))]);

        BusinessCategory::whereId($request->input('id'))->update($request->except('_token', 'icon'));
        return back()->with('updated', 'Category Updated Successfully');
    }
}