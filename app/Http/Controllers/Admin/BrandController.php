<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $models = Brand::all();
        return view('admin.brands.index', compact('models'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $data = $request->only('title');
        $created = Brand::create($data);

        if ($created) {
            return redirect()->route('admin.brands.index')
                ->with('type', 'success')
                ->with('message', 'Brend uğurla əlavə edildi.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Brendi əlavə etmək mümkün olmadı!')
                ->withInput($data);
        }
    }

    public function show(Brand $brand)
    {
        if (!empty($brand)) {
            $model = $brand;
            return view('admin.brands.show', compact('model'));
        } else {
            abort(404);
        }
    }

    public function edit(Brand $brand)
    {
        if (!empty($brand)) {
            $model = $brand;
            return view('admin.brands.edit', compact('model'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, Brand $brand)
    {
        if (!empty($brand)) {

            $data = $request->only('title');

            $update = $brand->update($data);

            if ($update) {
                return redirect()->route('admin.brands.index')
                    ->with('type', 'success')
                    ->with('message', 'Brend uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Brendi yeniləmək mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(Brand $brand)
    {
        if (!empty($brand)) {
            $deleted = $brand->delete();

            if ($deleted) {
                return redirect()->route('admin.brands.index')
                    ->with('type', 'success')
                    ->with('message', 'Brend uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Brendi silmək mümkün olmadı!');
            }
        } else {
            abort(404);
        }
    }
}