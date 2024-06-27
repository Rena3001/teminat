<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }

    public function messages(): array
    {
        return [
            'image' => 'Ancaq jpg, png, gif, jpeg, svg, webp formatlarda şəkil yükləyə bilərsiz',
            'image.uploaded' => 'Maksimum ölçüsü 2 Mb ola bilər',
        ];
    }
}