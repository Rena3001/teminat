<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ValveCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) {
                if (!trim($value)) {
                    $fail('Xana boş buraxıla bilməz!');
                }
            }],
        ];
    }
}