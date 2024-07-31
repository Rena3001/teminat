<?php

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Support\Str;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            }],
            'description' => ['required', 'array'],
            'description.*' => ['max:65535', function ($attribute, $value, $fail) {
                if (!trim($value)) {
                    $fail('Description '. strtoupper(Str::replace('description.', ' ', $attribute)) . ' boş buraxıla bilməz!');
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
            'description.required' => 'Təsvir boş buraxıla bilməz',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

}
