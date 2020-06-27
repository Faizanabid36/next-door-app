<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SaleItems;
use App\User;

class SaleItemController extends Controller
{
    // public function item()
    // {
    //     return User::with('sale_items')->where('id' , 1)->get();
    // }
    
    public function item()
    {
        return SaleItems::with('user')->get();
    }
}
