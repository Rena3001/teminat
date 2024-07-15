<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $models = Category::orderBy('order')->get();
        $settings = Setting::first();
        return view('client.product.wires_and_fluxes',compact('models','settings'));
    }
}
