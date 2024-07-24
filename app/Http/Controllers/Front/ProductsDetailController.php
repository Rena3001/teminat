<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductsDetailController extends Controller
{
    // public function index($id){
    //     $models = Brand::orderBy('order')->get();
    //     $product = Product::findOrFail($id);
    //     return view('client.product.detail',compact('models', 'product'));
    // }
    public function index(string $slug){

        $product = Product::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        $product = $product??Product::where('slug', 'LIKE', '%'.$slug.'%')->first();
        if ($product) {
            $relateds = Product::where('category_id', $product->category_id)->get();
            return view('client.product.detail',compact('product','relateds'));
        }else{
            abort(404);
        }
    }
}
