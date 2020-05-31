<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addcategory(Request $request)
    {
        if($request->isMethod('post'))
        {  
            
            $data = $request->all();
            $cat = new Category;
            $cat->name = $data['name'];
            $cat->save();
            return redirect()->back();
        }
        // // $details = Category::where(['parent_id'=>0])->get();
        // return view('admin.product.category.add_category' , \compact('details'));
    }
    public function viewcategory()
    {
        $cat = Category::all();
        return view('admin.category.view' )->with('cat' , $cat);
    }
    public function deletecategory($id)
    {
        Category::where(['id'=>$id])->delete();
        return redirect()->back();

    }

    public function editcategory(Request $request , $id=null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $find = Category::find($id);
            Category::where(['id'=>$id])->update([
                'name' => $data['name'],
                                
            ]);

            $find->save();
            return back();
        }
        $detail = Category::where(['id' => $id])->first();
        return view('admin.category.view', compact('detail'));
    }
}
