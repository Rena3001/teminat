<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
<<<<<<< HEAD
    public function index(Request $request)
{
    $selectedTags = $request->input('tag', []);

    if (!is_array($selectedTags)) {
        $selectedTags = [$selectedTags];
=======
    public function index()
    {
        $selectedParent = null;
        $selectedChild = null;
        $categories = Category::where('parent_id', null)->orderBy('order')->get();
        $parents = $categories;
        return view('client.product.categories', compact('categories', 'parents', 'selectedParent', 'selectedChild'));
>>>>>>> 3e72f0a2d9edb3b611b3db2ccf253d4200f5f07d
    }

    $tags = Tag::all();

<<<<<<< HEAD
    if (!empty($selectedTags)) {
        $categories = Category::whereHas('tags', function ($query) use ($selectedTags) {
            $query->whereIn('tags.id', $selectedTags);
        })->get();
    } else {
        $categories = Category::all();
    }

    if ($request->ajax()) {
        // Render the categories section directly
        $html = '';
        foreach ($categories as $category) {
            $html .= '
                <div class="products_item">
                    <div class="products_img">
                        <img src="' . $category->image . '" alt="product" />
                    </div>
                    <div class="products_about">
                        <h3>' . $category->title . '</h3>
                        <div class="products_text">
                            <p>' . $category->description . '</p>
                        </div>
                        <div class="show_more">
                            <a href="#" class="show_more_btn">More</a>
                            <a href="#" class="learn_more_btn">Ətraflı</a>
                        </div>
                        <div class="products_btns">
                            <a href="#">Order Offer</a>
                            <a href="#">Inquiry</a>
                        </div>
                    </div>
                </div>';
=======
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
>>>>>>> 3e72f0a2d9edb3b611b3db2ccf253d4200f5f07d
        }

        return response()->json(['html' => $html]);
    }

    return view('client.categories.categories', compact('tags', 'categories', 'selectedTags'));
}

}
