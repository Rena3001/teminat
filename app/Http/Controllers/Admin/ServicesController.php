<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Lang;
use App\Models\Service;
use App\Services\DataService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    protected $dataService;
    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    public function index(){
        $models = Service::get();
        return view('admin.services.index',compact('models'));
    }
    public function create()
    {
        $langs = Lang::all();
        $select_items = Service::get();
        return view('admin.services.create', compact('langs', 'select_items'));
    }

    public function store(ServiceRequest $request)
    {
        $titles = $request->input('title');
        $descriptions = $request->input('description');

        // Generate slugs for each title
        $data = [
            'title' => $titles,
            'description' => $descriptions,
            'slug' => $this->dataService->sluggableArray(['title' => $titles], 'title')
        ];
        // dd($data);
        // Create the blog entry
        $created = Service::create($data);

        if ($created) {
            // Handle the image upload if an image file was provided
            if ($request->hasFile('image')) {
                $fileExtension = $request->image->extension();
                $imgName = 'services_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/services', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route('admin.services.index')
                ->with('type', 'success')
                ->with('message', 'Servis uğurla əlavə edildi.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Servisi əlavə etmək mümkün olmadı!')
                ->withInput($request->except('image'));
        }
    }

    public function show(Service $service)
    {
        if (!empty($service)) {
            $model = $service;
            $model['slugs'] = $model->getTranslations('slug');
            $model['titles'] = $model->getTranslations('title');
            $model['descriptions'] = $model->getTranslations('description');
            return view('admin.services.show', compact('model'));
        } else {
            abort(404);
        }
    }

    public function edit(Service $service)
    {
        if (!empty($service)) {
            $model = $service;
            $model['json_title'] = $model->getTranslations('title');
            $model['json_description'] = $model->getTranslations('description');
            $langs = Lang::all();
            $select_items = Service::where('id', '!=', $service->id)->get();

            return view('admin.services.edit', compact('model', 'langs', 'select_items'));
        } else {
            abort(404);
        }
    }
    public function update(ServiceRequest $request, Service $service)
    {
        if (!empty($service)) {
            $model = $service;

            $data = $request->only('title', 'description', 'image', 'parent_id');
            $data['slug'] = $this->dataService->sluggableArray(['title' => $data['title']], 'title');
            $image = $model->image;
            $update = $service->update($data);

            if ($update) {
                if ($request->hasFile('image')) {
                    if ($image && file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = 'services_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/services', $imgName, 'public');
                    $model->image = '/storage/' . $imgPath;
                    $model->save();
                }
                return redirect()->route('admin.services.index')
                    ->with('type', 'success')
                    ->with('message', 'Servis uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Servisi yeniləmək mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(Service $service)
    {
        if (!empty($service)) {
            // Delete service image if it exists
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            // Check if the service has children and delete their images as well


            // Delete the service
            $deleted = $service->delete();

            // Check if deletion was successful
            if ($deleted) {
                return redirect()->route('admin.services.index')
                    ->with('type', 'success')
                    ->with('message', 'Servis uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Servisi silmək mümkün olmadı!');
            }
        } else {
            abort(404);
        }
    }


    public function delete_selected_service(Request $request)
    {
        $ids = $request->input('selected_ids');
        if ($ids && is_array($ids)) {
            $services = Service::whereIn('id', $ids)->get();
            foreach ($services as $service) {
                if ($service->image && file_exists(public_path($service->image))) {
                    unlink(public_path($service->image));
                }
            }
            Service::whereIn('id', $ids)->delete();
            return redirect()->route('admin.services.index')->with('success', 'Selected services deleted successfully.');
        }

        return redirect()->route('admin.services.index')->with('error', 'No services selected for deletion.');
    }

}
