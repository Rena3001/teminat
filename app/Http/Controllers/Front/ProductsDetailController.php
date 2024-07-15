<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductsDetailController extends Controller
{
    public function index($id){
        $settings=Setting::first();
        $models = Brand::orderBy('order')->get();
        $product = Product::findOrFail($id);
        return view('client.product.detail',compact('settings', 'models', 'product'));
    }
}
