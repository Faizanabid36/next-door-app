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
            $item = $request->all();
            $sale = new SaleItems;
            $sale->user_id = User::auth()->user()->id;
            $sale->title = $item['title'];
            $sale->price = $item['price'];
            $sale->description = $item['description'];
            $sale->cat_id = $item['cat_id'];
            $sale->save();
            return back()->with('created','Created Successfully');
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
