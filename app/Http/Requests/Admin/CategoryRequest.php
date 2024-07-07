<?php

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('category')?->id;
        $isUpdate = !is_null($modelId);
        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) use ($modelId) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Category::where('id', '!=', $modelId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
                if ($existingTitles) {
                    $fail('Başlıq '. strtoupper(Str::replace('title.', ' ', $attribute)) . ' unikal olmalıdır');
                }
                if (!trim($value)) {
                    $fail('Başlıq '. strtoupper(Str::replace('title.', ' ', $attribute)) . ' boş buraxıla bilməz!');
                }
            }],
            'image' => $isUpdate ? 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024' : 'required|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Şəkil seçilməlidir',
            'image' => 'Ancaq jpg, png, gif, jpeg, svg, webp formatlarda şəkil yükləyə bilərsiz',
            'image.max' => 'Maksimum ölçüsü 2 Mb ola bilər',
        ];
    }
}
