<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // other validation rules...
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
