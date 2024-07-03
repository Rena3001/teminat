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
        $select_items = Category::where('parent_id', null)->get();
        return view('admin.categories.create', compact('langs', 'select_items'));
    }

    public function store(Request $request)
    {
        $data = $request->only('title', 'image', 'parent_id');
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $data['parent_id'] = isset($data['parent_id']) && $data['parent_id'] != 0 ? (int)$data['parent_id'] : null;
        $created = Category::create($data);

        if ($created) {
            if ($request->hasFile('image')) {
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
        if (!empty($category)) {
            $model = $category;
            $model['slugs'] = $model->getTranslations('slug');
            $model['titles'] = $model->getTranslations('title');
            return view('admin.categories.show', compact('model'));
        } else {
            abort(404);
        }
    }

    public function edit(Category $category)
    {
        if (!empty($category)) {
            $model = $category;
            $model['json_field'] = $model->getTranslations('title');
            $langs = Lang::all();
            $select_items = Category::where('parent_id', null)->get();
            return view('admin.categories.edit', compact('model', 'langs', 'select_items'));
        } else {
            abort(404);
        }
    }

    public function update(Request $request, Category $category)
    {
        if (!empty($category)) {
            $model = $category;

            $data = $request->only('title', 'image', 'parent_id');
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');
            $data['parent_id'] = isset($data['parent_id']) && $data['parent_id'] != 0 ? (int)$data['parent_id'] : null;
            $image = $model->image;
            $update = $category->update($data);
            if ($update) {
                if ($request->hasFile('image')) {
                    if ($image && file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = 'categories_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/categories', $imgName, 'public');
                    $model->image = '/storage/' . $imgPath;
                    $model->save();
                }
                return redirect()->route('admin.categories.index')
                    ->with('type', 'success')
                    ->with('message', 'Kateqoriya uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Kateqoriyanın yenilənməsi mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(Category $category)
    {
        if (!empty($category)) {

            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
            if (!$category->parent_id) {
                foreach ($category->childrenCategories as $child) {
                    if ($child->image && file_exists(public_path($child->image))) {
                        unlink(public_path($child->image));
                    }
                }
            }
            $deleted = $category->delete();

            if ($deleted) {
                return redirect()->route('admin.categories.index')
                    ->with('type', 'success')
                    ->with('message', 'Valve kateqoriya uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Valve kateqoriyanı silmək mümkün olmadı!');
            }
        } else {
            abort(404);
        }
    }
}