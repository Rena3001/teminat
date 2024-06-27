<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValveCategoryRequest;
use App\Models\Lang;
use App\Models\ValveCategory;
use App\Services\DataService;

class ValveCategoryController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    { 
        $this->dataService = $dataService;
    }

    public function index()
    {
        $models = ValveCategory::all();
        return view('admin.valve_categories.index', compact('models'));
    }

    public function create()
    {
        $langs = Lang::all();
        return view('admin.valve_categories.create', compact('langs'));
    }

    public function store(ValveCategoryRequest $request)
    {
        $data = $request->only('title');
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $created = ValveCategory::create($data);

        if ($created) {
            return redirect()->route('admin.valve_categories.index')
                ->with('type', 'success')
                ->with('message', 'Valve kateqoriya uğurla əlavə edildi.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Valve kateqoriyanı əlavə etmək mümkün olmadı!')
                ->withInput($data);
        }
    }

    public function show(ValveCategory $valveCategory)
    {

        if (!empty($valveCategory)) {
            $model = $valveCategory;
            $model['slugs'] = $model->getTranslations('slug');
            $model['titles'] = $model->getTranslations('title');
            return view('admin.valve_categories.show', compact('model'));
        } else {
            abort(404);
        }
    }

    public function edit(ValveCategory $valve_category)
    {
        if (!empty($valve_category)) {
            $model = $valve_category;
            $model['json_field'] = $model->getTranslations('title');
            $langs = Lang::all();
            return view('admin.valve_categories.edit', compact('model', 'langs'));
        } else {
            abort(404);
        }
    }

    public function update(ValveCategoryRequest $request, ValveCategory $valveCategory)
    {
        if (!empty($valveCategory)) {

            $data = $request->only('title');
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');

            $update = $valveCategory->update($data);

            if ($update) {
                return redirect()->route('admin.valve_categories.index')
                    ->with('type', 'success')
                    ->with('message', 'Valve kateqoriya uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Valve kateqoriyanı yeniləmək mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(ValveCategory $valveCategory)
    {
        if (!empty($valveCategory)) {
            $deleted = $valveCategory->delete();

            if ($deleted) {
                return redirect()->route('admin.valve_categories.index')
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
