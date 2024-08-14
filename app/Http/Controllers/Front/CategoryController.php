<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
{
    $selectedTags = $request->input('tag', []);

    if (!is_array($selectedTags)) {
        $selectedTags = [$selectedTags];
    }

    $tags = Tag::all();

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
        }

        return response()->json(['html' => $html]);
    }

    return view('client.categories.categories', compact('tags', 'categories', 'selectedTags'));
}

}
