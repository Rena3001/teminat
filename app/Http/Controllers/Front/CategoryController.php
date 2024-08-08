<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $tags=Tag::all();
        $categories=Category::all();
        return view('client.categories.categories',compact('categories','tags'));
    }
}
