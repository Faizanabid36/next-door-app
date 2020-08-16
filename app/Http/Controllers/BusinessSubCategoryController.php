<?php

namespace App\Http\Controllers;

use App\BusinessCategory;
use Illuminate\Http\Request;

class BusinessSubCategoryController extends Controller
{
    //
    public function index()
    {

        $sub_categories = BusinessCategory::whereNotNull('parent_id')->get();
        $parents = BusinessCategory::whereNull('parent_id')->get();
        return view('admin.business.view_sub_categories', compact('sub_categories','parents'));
    }

    public function create_sub_category(Request $request)
    {
        $parent_categories = BusinessCategory::whereNull('parent_id')->get();
        return view('admin.business.add_sub_category', compact('parent_categories'));
    }

    public function store_sub_category(Request $request)
    {

        $this->validate($request, [
            'category_title' => 'required',
            'parent_id' => 'required',
        ]);
        $request->merge([
            'b_category_title' => $request->input('category_title'),
            'b_category_slug' => preg_replace('/\W|\_+/m', '-', $request->input('category_title')),
        ]);
        BusinessCategory::create($request->except('_token', 'category_title'));
        return back()->with('updated', 'Upadted');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'b_category_title' => 'required',
            'parent_id' => 'required',
        ]);
        \request()->merge(['b_category_slug' => preg_replace('/\W|\_+/m', '-', $request->input('b_category_title'))]);
        BusinessCategory::whereId($request->input('id'))->update($request->except('_token'));
        return back()->with('updated', 'Category Updated Successfully');
    }

    public function delete(Request $request)
    {
        if (!auth()->user()->admin)
            return back();
        BusinessCategory::whereId($request->input('id'))->delete();
        return back()->with('deleted','Deleted Successfully');
    }
}
