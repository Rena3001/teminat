<?php

namespace Database\Seeders;

use App\Models\LanguageLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(LanguageLine::exists())) {
            LanguageLine::create([
                'group' => 'menu',
                'key' => 'home',
                'text' => [
                    'en' => 'Home',
                    'az' => 'Ana səhifə'
                ],
            ]);
            LanguageLine::create([
                'group' => 'menu',
                'key' => 'about',
                'text' => [
                    'en' => 'About',
                    'az' => 'Haqqımızda'
                ],
            ]);
            LanguageLine::create([
                'group' => 'menu',
                'key' => 'products',
                'text' => [
                    'en' => 'Products',
                    'az' => 'Məhsullar'
                ],
            ]);
            LanguageLine::create([
                'group' => 'menu',
                'key' => 'contact',
                'text' => [
                    'en' => 'Contact',
                    'az' => 'Əlaqə'
                ],
            ]);
            LanguageLine::create([
                'group' => 'search',
                'key' => 'product',
                'text' => [
                    'en' => 'Search Product',
                    'az' => 'Məhsul Axtar'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'product_detail',
                'text' => [
                    'en' => 'Product Detail',
                    'az' => 'Məhsulun Detalları'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'send',
                'text' => [
                    'en' => 'Send',
                    'az' => 'Göndər'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'contact_us',
                'text' => [
                    'en' => 'Contact us',
                    'az' => 'Bizimlə Əlaqə'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'name',
                'text' => [
                    'en' => 'Name',
                    'az' => 'Ad'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'surname',
                'text' => [
                    'en' => 'Surname',
                    'az' => 'Soyad'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'phone',
                'text' => [
                    'en' => 'Phone',
                    'az' => 'Telefon'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'email',
                'text' => [
                    'en' => 'E-mail',
                    'az' => 'E-poçt'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'your_message',
                'text' => [
                    'en' => 'Your message',
                    'az' => 'Sizin mesajınız'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'address',
                'text' => [
                    'en' => 'Address',
                    'az' => 'Ünvan'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'num',
                'text' => [
                    'en' => 'Num',
                    'az' => 'Tel'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'corporate',
                'text' => [
                    'en' => 'Corporate',
                    'az' => 'Korporativ'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'companies',
                'text' => [
                    'en' => 'Companies',
                    'az' => 'Şirkətlər'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'social',
                'text' => [
                    'en' => 'Social Media',
                    'az' => 'Sosial Şəbəkə'
                ],
            ]);
            LanguageLine::create([
                'group' => 'btn',
                'key' => 'go_to_category',
                'text' => [
                    'en' => 'Go to category',
                    'az' => 'Kateqoriyaya keçin'
                ],
            ]);
            LanguageLine::create([
                'group' => 'btn',
                'key' => 'category_detail',
                'text' => [
                    'en' => 'Click for category details',
                    'az' => 'Kateqoriya detalları üçün klikləyin'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'categories',
                'text' => [
                    'en' => 'Categories',
                    'az' => 'Kateqoriyalar'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'brand',
                'text' => [
                    'en' => 'Brand',
                    'az' => 'Brend'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'datasheet',
                'text' => [
                    'en' => 'DATASHEET',
                    'az' => 'MƏLUMAT VƏFƏQİ'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'all_products',
                'text' => [
                    'en' => 'All Products',
                    'az' => 'Bütün Məhsullar'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'continue',
                'text' => [
                    'en' => 'Continue Reading',
                    'az' => 'Oxumağa davam et'
                ],
            ]);
            LanguageLine::create([
                'group' => 'word',
                'key' => 'phone_number',
                'text' => [
                    'en' => 'Phone Number',
                    'az' => 'Telefon',
                ],
            ]);
            LanguageLine::create([
                'group' => 'sentence',
                'key' => '404_category',
                'text' => [
                    'en' => 'Not found any category',
                    'az' => 'Heç bir kateqoriya tapılmadı',
                ],
            ]);
            LanguageLine::create([
                'group' => 'sentence',
                'key' => '404_product',
                'text' => [
                    'en' => 'Not found any product',
                    'az' => 'Heç bir məhsul tapılmadı',
                ],
            ]);
        }
    }
}
