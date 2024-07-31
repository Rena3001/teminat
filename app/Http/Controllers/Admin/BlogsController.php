<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
use App\Models\Blog;
use App\Models\Lang;
use App\Services\DataService;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    protected $dataService;
    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    public function index()
    {
        $models = Blog::get();
        return view('admin.blogs.index', compact('models'));
    }
    public function create()
    {
        $langs = Lang::all();
        $select_items = Blog::get();
        return view('admin.blogs.create', compact('langs', 'select_items'));
    }
    public function store(BlogRequest $request)
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
        $created = Blog::create($data);

        if ($created) {
            // Handle the image upload if an image file was provided
            if ($request->hasFile('image')) {
                $fileExtension = $request->image->extension();
                $imgName = 'blogs_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/blogs', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }
            return redirect()->route('admin.blogs.index')
                ->with('type', 'success')
                ->with('message', 'Bloq uğurla əlavə edildi.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Bloqu əlavə etmək mümkün olmadı!')
                ->withInput($request->except('image'));
        }
    }

    public function show(Blog $blog)
    {
        if (!empty($blog)) {
            $model = $blog;
            $model['slugs'] = $model->getTranslations('slug');
            $model['titles'] = $model->getTranslations('title');
            $model['descriptions'] = $model->getTranslations('description');
            return view('admin.blogs.show', compact('model'));
        } else {
            abort(404);
        }
    }
    public function edit(Blog $blog)
    {
        if (!empty($blog)) {
            $model = $blog;
            $model['json_title'] = $model->getTranslations('title');
            $model['json_description'] = $model->getTranslations('description');
            $langs = Lang::all();
            $select_items = Blog::where('id', '!=', $blog->id)->get();

            return view('admin.blogs.edit', compact('model', 'langs', 'select_items'));
        } else {
            abort(404);
        }
    }
    public function update(BlogRequest $request, Blog $blog)
    {
        if (!empty($blog)) {
            $model = $blog;

            $data = $request->only('title', 'description', 'image', 'parent_id');
            $data['slug'] = $this->dataService->sluggableArray(['title' => $data['title']], 'title');
            $image = $model->image;
            $update = $blog->update($data);

            if ($update) {
                if ($request->hasFile('image')) {
                    if ($image && file_exists(public_path($image))) {
                        unlink(public_path($image));
                    }
                    $fileExtension = $request->image->extension();
                    $imgName = 'blogs_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                    $imgPath = $request->file('image')->storeAs('uploads/admin/blogs', $imgName, 'public');
                    $model->image = '/storage/' . $imgPath;
                    $model->save();
                }
                return redirect()->route('admin.blogs.index')
                    ->with('type', 'success')
                    ->with('message', 'Bloq uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Bloqu yeniləmək mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }
    public function destroy(Blog $blog)
{
    if (!empty($blog)) {
        // Delete blog image if it exists
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        // Check if the blog has children and delete their images as well


        // Delete the blog
        $deleted = $blog->delete();

        // Check if deletion was successful
        if ($deleted) {
            return redirect()->route('admin.blogs.index')
                ->with('type', 'success')
                ->with('message', 'Bloq uğurla silindi.');
        } else {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', 'Bloqu silmək mümkün olmadı!');
        }
    } else {
        abort(404);
    }
}


public function delete_selected_blog(Request $request)
{
    $ids = $request->input('selected_ids');
    if ($ids && is_array($ids)) {
        $blogs = Blog::whereIn('id', $ids)->get();
        foreach ($blogs as $blog) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
        }
        Blog::whereIn('id', $ids)->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Selected blogs deleted successfully.');
    }

    return redirect()->route('admin.blogs.index')->with('error', 'No blogs selected for deletion.');
}

}
