<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::query();
        $parents = Category::where('parent_id', null)->orderBy('order')->get();
        if (request()->has('category') && request()->filled('category')) {
            $slug = request('category');
            $category = Category::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
            $category = $category ?? Category::where('slug', 'LIKE', '%' . $slug . '%')->first();
            $products = $products->where('category_id', $category->id);
        }
        if (request()->has('search_products') && request()->filled('search_products')) {
            $products = $products->where('title', 'LIKE', '%' . request('search_products') . '%');
        }
        $products = $products->orderBy('order')->get();
        return view('client.product.products', compact('products', 'parents'));
    }
}
