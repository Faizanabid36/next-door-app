<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleItemsImage;
use App\User;

class SaleItemsImageController extends Controller
{
    public function itemimage()
    {
        return SaleItemsImage::with('image')->get();
    }
}
