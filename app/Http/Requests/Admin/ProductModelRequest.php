<?php

namespace App\Http\Requests\Admin;

use App\Models\ModelProduct;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
class ProductModelRequest extends FormRequest
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
        $modelId = $this->route('model_product')?->id;
        return [
            'title' => ['required', !$modelId ? 'unique:model_products' : 'unique:model_products' . ',title,' . $modelId],
        ];

    }
}
