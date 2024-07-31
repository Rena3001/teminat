<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    public function index()
    {
        $selectedParent = null;
        $selectedChild = null;
        $categories = Category::where('parent_id', null)->orderBy('order')->get();
        $parents = $categories;
        return view('client.product.categories', compact('categories', 'parents', 'selectedParent', 'selectedChild'));
    }


    public function getSubCategories(string $slug)
    {

        $selectedParent = null;
        $selectedChild = null;
        $category = Category::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        $category = $category ?? Category::where('slug', 'LIKE', '%' . $slug . '%')->first();
        if ($category) {
            $parents = Category::where('parent_id', null)->orderBy('order')->get();
            if ($category->parent_id == null) {
                $selectedParent = $category;
                $categories = Category::where('parent_id', $category->id)->orderBy('order')->get();
                return view('client.product.categories', compact('categories', 'parents', 'selectedParent', 'selectedChild'));
            } else {
                $selectedChild  =  $category;
                $selectedParent = Category::where('id', $category->parent_id)->first();
                $products = Product::where('category_id', $category->id)->orderBy('order')->get();
                return view('client.product.products', compact('products', 'parents', 'selectedParent', 'selectedChild'));
            }
        } else {
            abort(404);
        }
    }

    public function fetchSubCategories(string $slug)

    {
        $categories = collect();
        $category = Category::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        $category = $category ?? Category::where('slug', 'LIKE', '%' . $slug . '%')->first();
        if ($category && $category->parent_id == null) {
            $categories = Category::where('parent_id', $category->id)->orderBy('order')->get();
        }

        return response()->json(['categories' => $categories, 'lang' => app()->getLocale()]);
    }
}
