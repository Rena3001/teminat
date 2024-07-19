<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Services\DataService;
use App\Models\Lang;
use App\Models\ModelProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function index()
    {
        $products = Product::orderBy('order')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', '!=', null)->get();
        $brands = Brand::get();
        $langs = Lang::all();
        $model_products=ModelProduct::get();
        return view('admin.products.create', compact('langs', 'categories', 'brands', 'model_products'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->only('title', 'category_id', 'brand_id', 'model_id');
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');

        $created = Product::create($data);

        if ($created) {
            if ($request->hasFile('image')) {
                $fileExtension = $request->image->extension();
                $imgName = 'product_' . $created->id . '_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/products/images', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }

            if ($request->hasFile('pdf_file')) {
                $fileExtension = $request->pdf_file->extension();
                $imgName = 'product_' . $created->id . '_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('pdf_file')->storeAs('uploads/admin/products/pdfs', $imgName, 'public');
                $created->pdf_file = '/storage/' . $imgPath;
                $created->save();
            }
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
            $category = Category::where('id', $product->category_id)->first()->getTranslations('title');
            $brand = Brand::where('id', $product->brand_id)->first();
            $model_product=ModelProduct::where('id', $product->model_id)->first();;

            return view('admin.products.show', compact('product', 'category', 'brand','model_product'));
        } else {
            abort(404);
        }
    }


    public function edit(Product $product)
    {
        if (!empty($product)) {
            $product['json_field'] = $product->getTranslations('title');

            $categories = Category::where('parent_id', '!=', null)->get();
            $brands = Brand::get();
            $langs = Lang::all();
            $model_products=ModelProduct::get();


            return view('admin.products.edit', compact('product', 'langs', 'categories', 'brands', 'model_products'));
        } else {
            abort(404);
        }
    }

    public function update(ProductRequest $request, Product $product)
    {
        if (!empty($product)) {
            $data = $request->only('title', 'category_id', 'brand_id','model_id');
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');

            $image = $product->image;
            $pdf_file = $product->pdf_file;

            $update = $product->update($data);

            if ($update) {
                if ($request->hasFile('image')) {
                    if ($image && file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = 'product_' . $product->id . '_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/products/images', $imgName, 'public');
                    $product->image = '/storage/' . $imgPath;
                    $product->save();
                }

                if ($request->hasFile('pdf_file')) {

                    if ($pdf_file && file_exists(public_path($pdf_file))) {
                        unlink(public_path($pdf_file));
                    }
                    $fileExtension = $request->pdf_file->extension();
                    $imgName = 'product_' . $product->id . '_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                    $imgPath = $request->file('pdf_file')->storeAs('uploads/admin/products/pdfs', $imgName, 'public');
                    $product->pdf_file = '/storage/' . $imgPath;
                    $product->save();
                }
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
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            if ($product->pdf_file && file_exists(public_path($product->pdf_file))) {
                unlink(public_path($product->pdf_file));
            }
            $deleted = $product->delete();

            if ($deleted) {

                return redirect()->route('admin.products.index')
                    ->with('type', 'success')
                    ->with('message', 'Məhsul uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Məhsulu silmək mümükün olmadı!');
            }
        } else {
            abort(404);
        }
    }

    public function delete_selected_products(Request $request)
    {
        $ids = $request->input('selected_ids');
        if ($ids && is_array($ids)) {
            Category::whereIn('id', $ids)->delete();
            return redirect()->route('admin.products.index')->with('success', 'Selected products deleted successfully.');
        }

        return redirect()->route('admin.products.index')->with('error', 'No products selected for deletion.');
    }


    public function changeOrder(Request $request)
    {
        foreach ($request->all()  as $product) {
            Product::where('id', $product['id'])->update(['order' => $product['order']]);
        }

        return response()->json(['success' => true]);
    }
}
