<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use App\Services\DataService;

class SliderController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        if ($request->file()) {
            $fileExtension = $request->image->extension();
            $imgName = 'sliders_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;

            $imgPath = $request->file('image')->storeAs('uploads/admin/sliders', $imgName, 'public');
            $created = Slider::create([
                'image' => '/storage/' . $imgPath,
            ]);
            if ($created) {
                return redirect()->route('admin.sliders.index')
                    ->with('type', 'success')
                    ->with('message', 'Slayd uğurla əlavə edildi');
            } else {
                return back()->with('type', 'danger')
                    ->with('message', 'Slaydı əlavə etmək mümkün olmadı');
            }
        } else {
            return back()->with('type', 'info')
                ->with('message', 'Şəkil seçilməyib');
        }
    }

    public function show(Slider $slider)
    {
        if (!empty($slider)) {
            $model = $slider;
            return view('admin.sliders.show', compact('model'));
        } else {
            abort(404);
        }
    }

    public function edit(Slider $slider)
    {
        if (!empty($slider)) {
            $model = $slider;
            return view('admin.sliders.edit', compact('model'));
        } else {
            abort(404);
        }
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        if (!empty($slider)) {
            $model = $slider;
            $image = $model->image;
            if ($request->file()) {

                if ($image && file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
                $fileExtension = $request->image->extension();
                $imgName = 'sliders_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/sliders', $imgName, 'public');
                $model->image = '/storage/' . $imgPath;
            }

            $model->save();
            return redirect()->route('admin.sliders.index')
                ->with('type', 'success')
                ->with('message', 'Slayd uğurla yeniləndi');
        } else {
            return back()->with('type', 'danger')
                ->with('message', 'Slaydı yeniləmək mümkün olmadı');
        }
    }

    public function destroy(Slider $slider)
    {
        if (!empty($slider)) {
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }
            $deleted = $slider->delete();

            if ($deleted) {
                return redirect()->route('admin.sliders.index')
                    ->with('type', 'success')
                    ->with('message', 'Slayd uğurla silindi!');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Slaydı silmək mümükün olmadı!');
            }
        } else {
            abort(404);
        }
    }
}