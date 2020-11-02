<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateProperty;
use App\Properties;
use Illuminate\Support\Facades\Session;


class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Properties::paginate(10);
        return view('web.frontend.real_estate.index', compact('properties'));
    }

    public function create()
    {
        return view('web.frontend.real_estate.create');
    }

    public function store(ValidateProperty $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
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

    public function destroy($id)
    {
        $property = Properties::find($id);
        $property->delete();
        return back()->withSuccess('Property Deleted Successfully');
    }
}
