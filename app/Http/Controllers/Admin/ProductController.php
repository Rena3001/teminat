<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\DataService;
use App\Models\Lang;
use App\Models\ValveCategory;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function index()
    {

        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ValveCategory::get();
        $langs = Lang::all();
        return view('admin.products.create', compact('langs','categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->only('title','category_id');
        if ($request->hasFile('pdf_file')) {
    $data['pdf_file'] = $request->file('pdf_file')->store('pdf_files');
}

if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')->store('images');
}
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');

        $created = Product::create($data);

        if ($created) {
            return redirect()->route('admin.products.index')
                ->with('type', 'success')
                ->with('message', 'Məhsul uğurla əlavə edildi.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Məhsulu əlavə etmək mümkün olmadı!')
                ->withInput($data);
        }
    }

    public function show(Product $product)
    {
        if (!empty($product)) {
            $product['slugs'] = $product->getTranslations('slug');
            $product['titles'] = $product->getTranslations('title');
            $category = ValveCategory::where('id', $product->category_id)->first();
            return view('admin.products.show', compact('product', 'category'));
        } else {
            abort(404);
        }
    }


    public function edit(Product $product)
    {
        if (!empty($product)) {
            $product['json_field'] = $product->getTranslations('title');
            $langs = Lang::all();
            $categories = ValveCategory::get();

            return view('admin.products.edit', compact('product', 'langs', 'categories'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, Product $product)
    {
        if (!empty($product)) {
            $data = $request->only('title');
            if ($request->hasFile('pdf_file')) {
                $data['pdf_file'] = $request->file('pdf_file')->store('pdf_files');
            }

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('images');
            }
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');

            $update = $product->update($data);

            if ($update) {
                return redirect()->route('admin.products.index')
                    ->with('type', 'success')
                    ->with('message', 'Məhsul uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Məhsulu yeniləmək mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(Product $product)
    {
        if (!empty($product)) {
            $product->delete();
            return redirect()->route('admin.products.index')
                ->with('type', 'success')
                ->with('message', 'Məhsul uğurla silindi.');
        } else {
            abort(404);
        }
    }
}
