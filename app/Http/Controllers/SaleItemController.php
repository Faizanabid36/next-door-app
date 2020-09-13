<?php

namespace App\Http\Controllers;

use App\Category;
use App\SaleItems;
use App\SaleItemsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaleItemController extends Controller
{
    public function main()
    {
        $items = SaleItems::with(['main_image','category','user'])->get()->groupBy('category.name');
        return view('web.frontend.sale_and_business.list_items',compact('items'));
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

    public function byCategory($category)
    {
        $category_id = Category::whereCategorySlug($category)->firstOrFail();
        return SaleItems::whereCatId($category_id->id)->with('user', 'images')->get();
    }

    public function itemByCategory($category, $id)
    {
        $category_id = Category::whereCategorySlug($category)->firstOrFail();
        $item = SaleItems::with(['main_image', 'images'])->whereCatId($category_id->id)->whereId($id)->with('user', 'images')->firstOrFail();
        $related_items = SaleItems::with('main_image', 'user')
            ->with('category')
            ->where('id', '!=', $item->id)
            ->where('cat_id', $item->cat_id)->get();

        return view('web.frontend.sale_and_business.single_product', compact('item', 'related_items'));
    }

    public function delete(SaleItems $saleItem)
    {
        if(!isset(auth()->user()->id) && auth()->user()->id != $saleItem->user_id)
            return back();
        $saleItem->delete();
        return back();
    }
}
