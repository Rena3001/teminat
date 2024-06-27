<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\Lang;
use Illuminate\Http\Request;
use App\Services\DataService;
use Carbon\Language;

class BlogController extends Controller
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
        // Fetch blogs from the database
        $blogs = Blog::all(); // Adjust this as per your requirement (e.g., with pagination)
        // Pass the blogs to the view
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Controller method
public function create()
{
    // Assuming you have an array of languages like this
    $langs = Lang::all();
    $blogs= Blog::all();
    return view('admin.blogs.create', compact('langs','blogs'));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->only('title', 'desc', 'desc_short');
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');

        if ($request->hasFile('image')) {
            $fileExtension = $request->image->extension();
            $imgName = 'blogs_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
            $imgPath = $request->file('image')->storeAs('uploads/admin/blogs', $imgName, 'public');
            $data['image'] = '/storage/' . $imgPath;
        }

        $created = Blog::create($data);

        if ($created) {
            return redirect()->route('admin.blogs.index')
                ->with('type', 'success')
                ->with('message', 'Blog uğurla əlavə edildi');
        } else {
            return back()->with('type', 'danger')
                ->with('message', 'Blogu əlavə etmək mümkün olmadı');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        if (!empty($blog)) {
            $model = $blog;
            $model['slugs'] = $model->getTranslations('slug');
            $model['titles'] = $model->getTranslations('title');
            $model['desc'] = $model->getTranslations('desc');
            $model['desc_short'] = $model->getTranslations('desc_short');
            return view('admin.blogs.show', compact('model'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (!empty($blog)) {
            $model = $blog;
            $model['json_field'] = $model->getTranslations('title');
            $model['json_field'] = $model->getTranslations('desc');
            $model['json_field'] = $model->getTranslations('slug');
            $model['json_field'] = $model->getTranslations('desc_short');


            return view('admin.blogs.edit', compact('model'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        if (!empty($blog)) {
            $model = $blog;
            $image = $model->image;
            if ($request->file()) {

                if ($image && file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
                $fileExtension = $request->image->extension();
                $imgName = 'blogs_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/blogs', $imgName, 'public');
                $model->image = '/storage/' . $imgPath;
            }

            $model->save();
            return redirect()->route('admin.blogs.index')
                ->with('type', 'success')
                ->with('message', 'Slayd uğurla yeniləndi');
        } else {
            return back()->with('type', 'danger')
                ->with('message', 'Slaydı yeniləmək mümkün olmadı');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (!empty($blog)) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            $deleted = $blog->delete();

            if ($deleted) {
                return redirect()->route('admin.blogs.index')
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
