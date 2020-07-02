<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleItems;
use App\User;

class SaleItemController extends Controller
{
    public function main()
    {
        return view('frontend.ecommerce.all_sale_items');
    }
    public function add(Request $request)
    {   
        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'sometimes',
            'cat_id' => 'required',
        ]);
             $request->merge(['user_id'=>auth()->user()->id]);
             $item=SaleItems::create($request->all());
             
             return back()->with('success','Created Successfully');
    }

    public function single()
    {
        return view('frontend.ecommerce.single');
    }
    
    public function item()
    {
        return SaleItems::with('user')->get();
    }
}
