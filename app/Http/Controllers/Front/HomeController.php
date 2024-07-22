<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id', null)->take(5)->get();
        $products = Product::take(10)->get();
        return view('client.home', compact('products', 'categories'));
    }
    
}
