<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use App\Services\DataService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    public function index()
    {
        $models = Brand::orderBy('order')->get();
        return view('admin.brands.index', compact('models'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(BrandRequest $request)
    {
        $data = $request->only('title','image');
        $created = Brand::create($data);

        if ($created) {

            if ($request->hasFile('image')) {
                $fileExtension = $request->image->extension();
                $imgName = 'brands_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/brands', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }

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

    public function update(BrandRequest $request, Brand $brand)
    {
        if (!empty($brand)) {

            $data = $request->only('title');

            $image = $brand->image;
            $update = $brand->update($data);

            if ($update) {
                if ($request->hasFile('image')) {
                    if ($image && file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = 'categories_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/categories', $imgName, 'public');
                    $brand->image = '/storage/' . $imgPath;
                    $brand->save();
                }
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

            if ($brand->image && file_exists(public_path($brand->image))) {
                unlink(public_path($brand->image));
            }
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
    public function delete_selected_brands(Request $request)
    {
        $ids = $request->input('selected_ids');
        if ($ids && is_array($ids)) {
            Brand::whereIn('id', $ids)->delete();
            return redirect()->route('admin.brands.index')->with('success', 'Selected brands deleted successfully.');
        }

        return redirect()->route('admin.brands.index')->with('error', 'No brands selected for deletion.');
    }

    public function changeOrder(Request $request)
    {
        foreach ($request->all() as $brand) {
            Brand::where('id', $brand['id'])->update(['order' => $brand['order']]);
        }

        return response()->json(['success' => true, 'message' => 'Order updated successfully.']);
    }

}
