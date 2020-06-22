<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function main()
    {
        return view('frontend.ecommerce.main');
    }
}
