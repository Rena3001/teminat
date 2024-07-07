<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('brand')?->id;
        return [
            'title' => ['required', !$modelId ? 'unique:brands' : 'unique:brands' . ',title,' . $modelId],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Başlıq hissəsi boş buraxıla bilməz!',
            'title.unique' => 'Başlıq unikal olmalıdır',
        ];
    }
}
