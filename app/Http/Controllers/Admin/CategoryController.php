<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Lang;
use App\Models\Tag;
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
        $models = Category::with('tags')->get();
        $tags = Tag::all(); // Fetch all tags instead of categories
        return view('admin.categories.index', compact('models', 'tags'));
    }

    public function create()
    {
        $langs = Lang::all();
        $tags = Tag::all(); // Fetch all tags instead of categories

        return view('admin.categories.create', compact('langs', 'tags'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->only('title', 'image', 'description');
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $created = Category::create($data);

        if ($created) {
            // Handle image upload
            if ($request->hasFile('image')) {
                $fileExtension = $request->image->extension();
                $imgName = 'categories_' . $this->dataService->getNowDateStr() . '.' . $fileExtension;
                $imgPath = $request->file('image')->storeAs('uploads/admin/categories', $imgName, 'public');
                $created->image = '/storage/' . $imgPath;
                $created->save();
            }

            // Attach tags
            if ($request->has('tag_ids')) {
                $created->tags()->attach($request->tag_ids);
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

    public function update(CategoryRequest $request, Category $category)
    {

        if (!empty($category)) {
            $model = $category;

            $data = $request->only('title', 'image', 'description', 'tag_ids');
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');
            $image = $model->image;
            // dd($data);
            foreach ($data['tag_ids'] as  $tag_id) {
                $model->tags()->attach($tag_id);
            }
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

                // Sync tags
                if ($request->has('tag_ids')) {
                    $category->tags()->sync($request->tag_ids);
                } else {
                    $category->tags()->detach();
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


    public function show(Category $category)
    {
        if (!empty($category)) {
            $model = $category;
            $model['slugs'] = $model->getTranslations('slug');
            $model['titles'] = $model->getTranslations('title');
            $model['descriptions'] = $model->getTranslations('description');
            $model->load('tags');

    // Count tags associated with this model
            $tagCount = $model->tags->count();
            return view('admin.categories.show', compact('model','tagCount'));
        } else {
            abort(404);
        }
    }

    public function edit(Category $category)
    {
        if (!empty($category)) {
            $model = $category;
            $model['title_translations'] = $model->getTranslations('title');
            $model['description_translations'] = $model->getTranslations('description');
            $langs = Lang::all();
            $tags = Tag::all(); // Fetch all tags for selection
            $selected_tags=$category->tags->all();
            $tag_ids=array_column($selected_tags, 'id');
            return view('admin.categories.edit', compact('model', 'langs', 'tags','tag_ids'));
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

            $deleted = $category->delete();

            if ($deleted) {
                return redirect()->route('admin.categories.index')
                    ->with('type', 'success')
                    ->with('message', 'Kateqoriya uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Kateqoriyanı silmək mümkün olmadı!');
            }
        } else {
            abort(404);
        }
    }

    public function delete_selected_category(Request $request)
    {
        $ids = $request->input('selected_ids');
        if ($ids && is_array($ids)) {
            Category::whereIn('id', $ids)->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Selected categories deleted successfully.');
        }

        return redirect()->route('admin.categories.index')->with('error', 'No categories selected for deletion.');
    }

    public function changeOrder(Request $request)
    {
        foreach ($request->all() as $category) {
            Category::where('id', $category['id'])->update(['order' => $category['order']]);
        }

        return response()->json(['success' => true, 'message' => 'Order updated successfully.']);
    }

    // Add Tags to Category
    public function attachTag(Request $request, Category $category)
    {
        $request->validate([
            'tag_ids' => 'required|array',
            'tag_ids.*' => 'exists:tags,id',
        ]);

        $category->tags()->attach($request->tag_ids);

        return response()->json(['message' => 'Tags attached successfully'], 200);
    }

    // Remove Tags from Category
    public function detachTag(Request $request, Category $category)
    {
        $request->validate([
            'tag_ids' => 'required|array',
            'tag_ids.*' => 'exists:tags,id',
        ]);

        $category->tags()->detach($request->tag_ids);

        return response()->json(['message' => 'Tags detached successfully'], 200);
    }

    // Get Tags of a Category
    public function getTags(Category $category)
    {
        $tags = $category->tags;
        return response()->json($tags, 200);
    }
}
