<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LostAndFoundController extends Controller
{
    public function index()
    {
        return view('web.frontend.lost_and_found.index');
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
