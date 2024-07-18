<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('brand')?->id;
        $isUpdate = !is_null($modelId);
        return [
            'title' => ['required', !$modelId ? 'unique:brands' : 'unique:brands' . ',title,' . $modelId],
            'image' => $isUpdate ? 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024' : 'required|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Başlıq hissəsi boş buraxıla bilməz!',
            'title.unique' => 'Başlıq unikal olmalıdır',
            'image.required' => 'Şəkil seçilməlidir',
            'image' => 'Ancaq jpg, png, gif, jpeg, svg, webp formatlarda şəkil yükləyə bilərsiz',
            'image.max' => 'Maksimum ölçüsü 2 Mb ola bilər',
        ];
    }
}
