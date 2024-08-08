<?php

namespace App\Http\Requests\Admin;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

// class ProductRequest extends FormRequest
// {
//     public function rules(): array
//     {
//         $modelId = $this->route('product')?->id;
//         $isUpdate = !is_null($modelId);
//         return [
//             'title' => ['required', 'array'],
//             'title.*' => ['max:255', function ($attribute, $value, $fail) use ($modelId) {
//                 $slug = Str::slug($value);
//                 $keyValue = Str::of($attribute)->afterLast('.');
//                 $existingTitles = Product::where('id', '!=', $modelId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
//                 if ($existingTitles) {
//                     $fail('Başlıq '. strtoupper(Str::replace('title.', ' ', $attribute)) . ' unikal olmalıdır');
//                 }
//                 if (!trim($value)) {
//                     $fail('Başlıq '. strtoupper(Str::replace('title.', ' ', $attribute)) . ' boş buraxıla bilməz!');
//                 }
//             }],
//             'image' => $isUpdate ? 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024' : 'required|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
//             'pdf_file' => $isUpdate ? 'nullable|mimes:pdf' : 'required|mimes:pdf',
//             'brand_id' => 'required',
//             'category_id' => 'required',
//         ];
//     }

//     public function messages(): array
//     {
//         return [
//             'image.required' => 'Şəkil seçilməlidir',
//             'image' => 'Ancaq jpg, png, gif, jpeg, svg, webp formatlarda şəkil yükləyə bilərsiz',
//             'image.max' => 'Maksimum ölçüsü 2 Mb ola bilər',
//             'pdf_file.required' => 'PDF fayl seçilməlidir',
//             'pdf_file.mimes' => 'Ancaq pdf yükləyə bilərsiz',
//             'brand_id.required' => 'Brend seçilməlidir',
//             'category_id.required' => 'Kateqoriya seçilməlidir',
//         ];
//     }
// }
