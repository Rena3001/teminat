<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) {
                if (!trim($value)) {
                    $fail('Xana boş buraxıla bilməz!');
                }
            }],
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }
}
