<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageLineRequest;
use App\Models\Lang;
use App\Models\LanguageLine;

class LanguageLineController extends Controller
{
    public function index()
    {
        $langs = Lang::all();
        $models = LanguageLine::get();
        if (!empty($langs)) {
            return view('admin.language_line.index', compact('models', 'langs'));
        } else {
            abort(404);
        }
    }

    public function create()
    {
        $langs = Lang::all();
        return view('admin.language_line.create', compact('langs'));
    }

    public function store(LanguageLineRequest $request)
    {
        $data = $request->only('group', 'key', 'text');
        $cerated = LanguageLine::create($data);

        if ($cerated) {
            return redirect()->route('admin.language_line.index')
                ->with('success', 'Statik tərcümə uğurla əlavə olundu.');
        } else {
            return back()
                ->with('type', 'danger')
                ->with('message', 'Statik tərcüməni əlavə etmək mümkün olmadı!')
                ->withInput($data);
        }
    }

    public function show(LanguageLine $languageLine)
    {
        if (!empty($languageLine)) {
            $model = $languageLine;
            return view('admin.language_line.show', compact('model'));
        } else {
            abort(404);
        }
    }

    public function edit(LanguageLine $languageLine)
    {
        if (!empty($languageLine)) {
            $model = $languageLine;
            $langs = Lang::all();
            return view('admin.language_line.edit', compact('model', 'langs'));
        } else {
            abort(404);
        }
    }

    public function update(LanguageLineRequest $request, LanguageLine $languageLine)
    {
        if (!empty($languageLine)) {

            $data = $request->only('text', 'group', 'key');
            $update = $languageLine->update($data);

            if ($update) {
                return redirect()->route('admin.language_line.index')
                    ->with('type', 'success')
                    ->with('message', 'Statik tərcümə uğurla yeniləndi.');
            } else {
                return back()
                    ->with('type', 'danger')
                    ->with('message', 'Statik tərcüməni yeniləmək mümkün olmadı!')
                    ->withInput($data);
            }
        } else {
            abort(404);
        }
    }

    public function destroy(LanguageLine $languageLine)
    {
        if (!empty($languageLine)) {
            $deleted = $languageLine->delete();

            if ($deleted) {
                return redirect()->route('admin.language_line.index')
                    ->with('type', 'success')
                    ->with('message', 'Statik tərcümə uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Statik tərcüməni silmək mümkün olmadı!');
            }
        } else {
            abort(404);
        }
    }
}
