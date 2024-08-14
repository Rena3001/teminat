<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
<<<<<<< HEAD
    
=======

    public function index(){
        $products = Product::query();
        $parents = Category::where('parent_id', null)->orderBy('order')->get();
        $selectedParent = null;
        $selectedChild = null;
        if(request()->has('parent_category') && request()->filled('parent_category')){
            if (request()->has('category') && request()->filled('category')) {
                $slug = request('category');
                $category = Category::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
                $category = $category??Category::where('slug', 'LIKE', '%'.$slug.'%')->first();
                if ($category) {
                    if ($category->parent_id) {
                        $selectedChild  =  $category;
                        $selectedParent = Category::where('id', $category->parent_id)->first();
                    }else{
                        $selectedParent  =  $category;
                    }
                }else {
                $slugParent = request('parent_category');
                $parentCategory = Category::where('slug->' . LaravelLocalization::getCurrentLocale(), $slugParent)->first();
                $parentCategory = $parentCategory??Category::where('slug', 'LIKE', '%'.$slugParent.'%')->first();
                if ($parentCategory->parent_id == null) {
                    $selectedParent = $parentCategory;
                    $categories = Category::where('parent_id', $parentCategory->id)->orderBy('order')->get();
                    return view('client.product.categories', compact('categories', 'parents', 'selectedParent', 'selectedChild'));
                 }
            }
                $products = $products->where('category_id', $category?->id);
            } else {
                $slugParent = request('parent_category');
                $parentCategory = Category::where('slug->' . LaravelLocalization::getCurrentLocale(), $slugParent)->first();
                $parentCategory = $parentCategory??Category::where('slug', 'LIKE', '%'.$slugParent.'%')->first();
                if ($parentCategory->parent_id == null) {
                    $selectedParent = $parentCategory;
                    $categories = Category::where('parent_id', $parentCategory->id)->orderBy('order')->get();
                    return view('client.product.categories', compact('categories', 'parents', 'selectedParent', 'selectedChild'));
                 }
            }
        }
        if (request()->has('search_products') && request()->filled('search_products')) {
            $products = $products->where('title', 'LIKE', '%' . request('search_products') . '%');
        }
        $products = $products->orderBy('order')->get();
        return view('client.product.products',compact('products','parents','selectedParent','selectedChild'));
    }
>>>>>>> 3e72f0a2d9edb3b611b3db2ccf253d4200f5f07d
}

