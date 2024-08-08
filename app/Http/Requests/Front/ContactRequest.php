<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'number' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
            'proffession'=>['required', 'string', 'max:255'],
            'note'=>['required', 'string', 'max:1000'],
            'file' => ['required', 'string', 'max:5000']

        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Xana boş buraxıla bilməz!',
            'max' => 'Maksimum uzunluğu :max simvol ola bilər',
        ];
    }
}
