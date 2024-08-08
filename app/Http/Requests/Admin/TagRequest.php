<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TagRequest extends FormRequest
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
        $modelId = $this->route('service')?->id;
        $isUpdate = !is_null($modelId);
        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) use ($modelId) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Service::where('id', '!=', $modelId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
                if ($existingTitles) {
                    $fail('Başlıq '. strtoupper(Str::replace('title.', ' ', $attribute)) . ' unikal olmalıdır');
                }
                if (!trim($value)) {
                    $fail('Başlıq '. strtoupper(Str::replace('title.', ' ', $attribute)) . ' boş buraxıla bilməz!');
                }
            }]
        ];
    }
}
