<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateProperty;
use App\Properties;
use App\PropertyAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PropertiesController extends Controller
{
    public function my_listings(Request $request)
    {
        $properties = Properties::with('main_image')->
        when($request->get('search'), function ($query) use ($request) {
            return $query->where('city', 'like', '%' . $request->get('search') . '%')
                ->orWhere('postal_code', $request->get('search'));
        })->when($request->get('min'), function ($query) use ($request) {
            return $query->where('price', '>', $request->get('min'));
        })->when($request->get('max'), function ($query) use ($request) {
            return $query->orWhere('price', '<', $request->get('max'));
        })->when($request->get('status'), function ($query) use ($request) {
            return $query->whereStatus($request->get('status'));
        })->when($request->get('property_type'), function ($query) use ($request) {
            return $query->wherePropertyType($request->get('property_type'));
        })->whereUserId(auth()->user()->id)->paginate(10);
        return view('web.frontend.real_estate.index', compact('properties'));
    }

    public function index(Request $request)
    {
        $properties = Properties::with('main_image')->
        when($request->get('search'), function ($query) use ($request) {
            return $query->where('city', 'like', '%' . $request->get('search') . '%')
                ->orWhere('postal_code', $request->get('search'));
        })->when($request->get('min'), function ($query) use ($request) {
            return $query->where('price', '>', $request->get('min'));
        })->when($request->get('max'), function ($query) use ($request) {
            return $query->orWhere('price', '<', $request->get('max'));
        })->when($request->get('status'), function ($query) use ($request) {
            return $query->whereStatus($request->get('status'));
        })->when($request->get('property_type'), function ($query) use ($request) {
            return $query->wherePropertyType($request->get('property_type'));
        })->paginate(10);
        return view('web.frontend.real_estate.index', compact('properties'));
    }

    public function create()
    {
        return view('web.frontend.real_estate.create');
    }

    public function show($id)
    {
        $property = Properties::whereId($id)->with(['attachments', 'main_image'])->firstOrFail();
        $related_properties = Properties::where('id', '!=', $property->id)
            ->whereUserId($property->user_id)->orWhere('postal_code',$property->postal_code)->take(3)->get();
        return view('web.frontend.real_estate.show', compact('property','related_properties'));
    }

    public function store(ValidateProperty $request)
    {

        $request->merge(['user_id' => auth()->user()->id, 'address' => get_address($request->input('postal_code'))]);
        $property = Properties::create($request->except('_token'));
        Session::put('property_id', $property->id);
        return back()->with('success', 'Property Created Successfully');
    }

    public function edit($id)
    {
        $property = Properties::find($id);
        return view('web.frontend.real_estate.edit', compact('property'));
    }

    public function update(ValidateProperty $request, $id)
    {
        Properties::whereId($id)->update($request->except('_token'));
        return back()->withSuccess('Property Updated Successfully');
    }

    public function delete($id)
    {
        $property = Properties::find($id);
        $property->delete();
        return redirect()->route('real_estate.listings');
    }

    public function gallery($id)
    {
        $property = Properties::whereId($id)->with('attachments')->firstOrFail();
        return view('web.frontend.real_estate.add_to_gallery', compact('property'));
    }

    public function store_property_image(Request $request)
    {
        $this->validate($request, [
            'Picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);
        $path = storeImage($request->file('Picture'), 'real_estate/property-' . $request->input('property_id'));
        $att = new PropertyAttachment();
        $att->property_id = $request->input('property_id');
        $att->image_url = $path;
        $att->save();
        return back()->withSuccess('Image Uploaded');
    }

    public function delete_gallery($property_id, $id)
    {
        $att = PropertyAttachment::find($id);
        $att->delete();
        return back()->withSuccess('Image Deleted Successfully');
    }
}
