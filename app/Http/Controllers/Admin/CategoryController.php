<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lang;
use App\Services\DataService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    public function index()
    {
        $langs = Lang::all();
        $models = Category::all();
        return view('admin.categories.index', compact('models', 'langs'));
    }

    public function create()
    {
        $langs = Lang::all();
        $select_items = Category::where('parent_id', 0)->get();
        return view('admin.categories.create', compact('langs', 'select_items'));
    }

    public function store(Request $request)
    {
        $data = $request->only('title', 'image', 'parent_id');
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $data['parent_id'] = (int)$data['parent_id'] ?? 0;
        $created = Category::create($data);

        if ($created) {
            if ($request->file()) {
                $fileExtension = $request->image->extension();
                $imgName = 'categories_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/categories', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route('admin.categories.index')
                ->with('type', 'success')
                ->with('message', 'Kateqoriya uğurla əlavə edildi.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Kateqoriyanı əlavə etmək mümkün olmadı!')
                ->withInput($data);
        }
    }

    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
