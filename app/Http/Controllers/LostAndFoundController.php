<?php

namespace App\Http\Controllers;

class LostAndFoundController extends Controller
{
    public function index()
    {
        return view('web.frontend.lost_and_found.index');
    }
}
