<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductModelRequest;
use App\Models\ModelProduct;
use App\Services\DataService;
use Illuminate\Http\Request;

class ModelProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    public function index()
    {
        $models = ModelProduct::get();
        return view('admin.model_products.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $models = ModelProduct::get();
        return view('admin.model_products.create', compact( 'models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductModelRequest $request)
    {
        $data = $request->only('title', 'parent_id');
        $created = ModelProduct::create($data);

        if ($created) {
            return redirect()->route('admin.model_products.index')->with('success', 'Model Product created successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to create Model Product.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ModelProduct $model_product)
    {
        if (!empty($model_product)) {
            $model_product['titles'] = $model_product->title;

            return view('admin.model_products.show', compact('model_product'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModelProduct $model_product)
    {
        if (!empty($model_product)) {

            $model_product['json_field'] = $model_product->title;
            return view('admin.model_products.edit', compact('model_product'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductModelRequest $request, ModelProduct $model_product)
    {
        if (!empty($model_product)) {
            $data = $request->only('title');
            $update = $model_product->update($data);

            if ($update) {
                  return redirect()->route('admin.model_products.index')
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

    /**
     * Remove the specified resource from storage.
     */
    public function delete_selected_model_products(Request $request){
        $ids = $request->input('selected_ids');
        if ($ids && is_array($ids)) {
            ModelProduct::whereIn('id', $ids)->delete();
            return redirect()->route('admin.model_products.index')->with('success', 'Seçilmiş Model Produktları silindi.');
        }

        return redirect()->route('admin.model_products.index')->with('error', 'Seçiminizde məhsul yoxdur.');
    }
    public function destroy(ModelProduct $model_product)
{
    if ($model_product) {
        $deleted = $model_product->delete();

        if ($deleted) {
            return redirect()->route('admin.model_products.index')
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



}
