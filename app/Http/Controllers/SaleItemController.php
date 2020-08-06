<?php

namespace App\Http\Controllers;

use App\SaleItems;
use App\SaleItemsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaleItemController extends Controller
{
    public function main()
    {
        return view('web.frontend.sale_and_business.list_items');
//        return view('frontend.ecommerce.all_sale_items');
    }

    public function add(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'price' => 'sometimes',
            'cat_id' => 'required',
            'image_0' => 'required|file|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_1' => 'sometimes|file|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_2' => 'sometimes|file|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if (!Storage::disk('public')->exists('sale_and_free')) {
            Storage::disk('public')->makeDirectory('sale_and_free');
        }

        $request->merge(['user_id' => auth()->user()->id]);
        $item = SaleItems::create($request->except(['image_0', 'image_1', 'image_2']));

        $image0 = $request->file('image_0');

        if (isset($image0)) {
            $path = storeImage($image0, 'sale_and_free');
            $image = new SaleItemsImage();
            $image->image_url = $path;
            $item->images()->save($image);
        }
        $image1 = $request->file('image_1');
        if (isset($image1)) {
            $path = storeImage($image1, 'sale_and_free');
            $image = new SaleItemsImage();
            $image->image_url = $path;
            $item->images()->save($image);
        }

        $image2 = $request->file('image_2');
        if (isset($image2)) {
            $path = storeImage($image2, 'sale_and_free');
            $image = new SaleItemsImage();
            $image->image_url = $path;
            $item->images()->save($image);
        }

        return back()->with('success', 'Your Item has been posted successfully');
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
