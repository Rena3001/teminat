<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LanguageLineRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('language_line')?->id;

        return [
            'key' => 'required',
            'group'  => [
                'required',
                Rule::unique('language_lines')->where(function ($query) {
                    return $query->where('group', request('group'))
                        ->where('key', request('key'));
                })->ignore($modelId, 'id'),
            ],
            'text' => ['required', 'array'],
            'text.*' => ['max:255', function ($attribute, $value, $fail) {
                if (!trim($value)) {
                    $fail('Xana boş buraxıla bilməz!');
                }
            }],
        ];
    }

    public function messages(): array
    {
        return [
            'group.required' => 'Qrup boş buraxıla bilməz!',
            'group.unique' => 'Qrup və açar söz birlikde unikal olmalıdır!',
            'key.required' => 'Açar söz boş buraxıla bilməz!',
        ];
    }
}