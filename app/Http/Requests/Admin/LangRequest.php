<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LangRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('lang')?->id;
        return [
            'code' => ['required', 'max:3', !$modelId ? 'unique:langs' : 'unique:langs' . ',code,' . $modelId],
            'language' => ['required', !$modelId ? 'unique:langs' : 'unique:langs' . ',language,' . $modelId],
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Kod hissəsi boş buraxıla bilməz',
            'code.unique' => 'Kod unikal olmalıdır',
            'code.max' => 'Maksimum 3 xarakter ola bilər',
            'language.required' => 'Dil hissəsi boş buraxıla bilməz',
            'language.unique' => 'Dil unikal olmalıdır',
            'image.max' => 'Maksimum ölçüsü 2 Mb ola bilər',
            'image' => 'Ancaq jpg, png, gif, jpeg, svg, webp formatlarda şəkil yükləyə bilərsiz',
        ];
    }
}
