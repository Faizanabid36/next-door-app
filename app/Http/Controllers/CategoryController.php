<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addcategory(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->all();
            $cat = new Category;
            $cat->name = $data['name'];
            $cat->category_slug = preg_replace('/\W|\_+/m', '-', $request->input('name'));
            $cat->save();
            return back()->with('created','Created Successfully');
        }
        // // $details = Category::where(['parent_id'=>0])->get();
        // return view('admin.product.category.add_category' , \compact('details'));
    }
    public function viewcategory()
    {
        $cat = Category::all();
        return view('admin.category.view', compact('cat'));
    }
    public function deletecategory($id)
    {
        if (auth()->user()->admin) {
            Category::where(['id' => $id])->delete();
            return back()->with('deleted', 'Category Deleted');
        }
        return back();
    }

    public function editcategory(Request $request , $id=null)
    {
        if (auth()->user()->admin) {
            Category::whereId($request->input('id'))->update([
                'name' => $request->input('name'),
                'category_slug' => preg_replace('/\W|\_+/m', '-', $request->input('name'))
            ]);
            return back()->with('updated', 'Updated Successfully');
        }
        return back();
    }
}
