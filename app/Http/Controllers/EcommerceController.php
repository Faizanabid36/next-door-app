<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function main()
    {
        return view('frontend.ecommerce.all_sale_items');
    }

    public function single()
    {
        return view('frontend.ecommerce.single');
    }
}
