<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(){
        $products = Product::query();
        $parents = Category::where('parent_id', null)->orderBy('order')->get();
        if (request()->has('category') && request()->filled('category')) {
            $products = $products->where('category_id', request('category'));
        }
        if (request()->has('search_products') && request()->filled('search_products')) {
            $products = $products->where('title', 'LIKE', '%' . request('search_products') . '%');
        }
        $products = $products->orderBy('order')->get();
        return view('client.product.products',compact('products','parents'));
    }
}
