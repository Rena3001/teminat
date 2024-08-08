<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(){
        $blogs=Blog::all();
        return view('client.blogs.blogs', compact('blogs'));
    }
}
