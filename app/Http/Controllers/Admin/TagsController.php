<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Lang;
use App\Models\Tag;
use App\Services\DataService;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }
    public function index(){
        $tags=Tag::all();
        return view('admin.tags.index',compact('tags'));
    }
    public function create()
    {
        $langs = Lang::all();
        $select_items = Tag::get();
        return view('admin.tags.create', compact('langs', 'select_items'));
    }
    public function store(TagRequest $request)
    {
        $data = $request->only('title');
        $data['slug'] = $this->dataService->sluggableArray($data, 'title');
        $created = Tag::create($data);

        if ($created) {
            return redirect()->route('admin.tags.index')
                ->with('type', 'success')
                ->with('message', 'Taq uğurla əlavə edildi.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Taqı əlavə etmək mümkün olmadı!')
                ->withInput($data);
        }
    }
    public function show(Tag $tag)
    {
        if (!empty($tag)) {
            $model = $tag;
            $model['slugs'] = $model->getTranslations('slug');
            $model['titles'] = $model->getTranslations('title');
            return view('admin.tags.show', compact('model'));
        } else {
            abort(404);
        }
    }
    public function edit(Tag $tag)
    {
        if (!empty($tag)) {
            $model = $tag;
            $model['title_translations'] = $model->getTranslations('title');
            $langs = Lang::all();
            $select_items = Tag::where('id', '<>', $tag->id)->get(); // Exclude self from select items

            return view('admin.tags.edit', compact('model', 'langs', 'select_items'));
        } else {
            abort(404);
        }
    }
    public function update(TagRequest $request, Tag $tag)
    {
        if (!empty($tag)) {
            $model = $tag;

            $data = $request->only('title');
            $data['slug'] = $this->dataService->sluggableArray($data, 'title');
            $update = $tag->update($data);
            if ($update) {
                $model->save();
                return redirect()->route('admin.tags.index')
                    ->with('type', 'success')
                    ->with('message', 'Taq uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Taqın yenilənməsi mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(Tag $tag)
    {
        if (!empty($tag)) {

            $deleted = $tag->delete();

            if ($deleted) {
                return redirect()->route('admin.tags.index')
                    ->with('type', 'success')
                    ->with('message', 'Taq uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Taqı silmək mümkün olmadı!');
            }
        } else {
            abort(404);
        }
    }
    public function delete_selected_tag(Request $request)
    {
        $ids = $request->input('selected_ids');
        if ($ids && is_array($ids)) {
            Tag::whereIn('id', $ids)->delete();
            return redirect()->route('admin.tags.index')->with('success', 'Selected tags deleted successfully.');
        }

        return redirect()->route('admin.tags.index')->with('error', 'No tags selected for deletion.');
    }

}
