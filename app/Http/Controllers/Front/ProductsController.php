<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(){
        $settings=Setting::first();
        $products = Product::orderBy('order')->get();
        return view('client.product.products',compact('products','settings'));
    }
}
