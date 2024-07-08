<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'fb' => ['nullable', 'max:255'],
            'tw' => ['nullable', 'max:255'],
            'in' => ['nullable', 'max:255'],
            'inst' => ['nullable', 'max:255'],
            'yt' => ['nullable', 'max:255'],
            'address' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'fax' => ['nullable', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'home_about_title' => ['array'],
            'home_about_title.*' => ['max:255', 'required'],
            'home_about_subtitle' => ['array'],
            'home_about_subtitle.*' => ['max:255', 'required'],
            'footer_title' => ['array'],
            'footer_title.*' => ['max:255', 'required'],
            'about_title' => ['array'],
            'about_title.*' => ['max:255', 'required'],
            'about_iframe' => ['nullable', 'max:255'],
            'contact_title' => ['array'],
            'contact_title.*' => ['max:255', 'required'],
            'categories_title' => ['array'],
            'categories_title.*' => ['max:255', 'required'],
            'home_about_desc' => ['array'],
            'home_about_desc.*' => ['required'],
            'about_desc' => ['array'],
            'about_desc.*' => ['required'],
            'image_logo_light' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
            'image_logo_dark' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
            'about_banner' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
            'contact_image' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }

    public function messages(): array
    {
        return [
            'email' => 'Düzgün e-mail yazın',
            'required' => 'Xana boş buraxıla bilməz',
            'image_logo_light.required' => 'Şəkil seçilməlidir',
            'image_logo_dark.required' => 'Şəkil seçilməlidir',
            'about_banner.required' => 'Şəkil seçilməlidir',
            'contact_image.required' => 'Şəkil seçilməlidir',
            'image' => 'Ancaq jpg, png, gif, jpeg, svg, webp formatlarda şəkil yükləyə bilərsiz',
            'image_logo_light.max' => 'Maksimum ölçüsü :max kb ola bilər',
            'image_logo_dark.max' => 'Maksimum ölçüsü :max kb ola bilər',
            'about_banner.max' => 'Maksimum ölçüsü :max kb ola bilər',
            'contact_image.max' => 'Maksimum ölçüsü :max kb ola bilər',
            'max' => 'Maksimum uzunluğu :max simvol ola bilər',
        ];
    }
}
