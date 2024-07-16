<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Lang;
use App\Models\LanguageLine;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        if (empty(User::exists())) {
            User::factory()->create([
                'name' => 'Admin Super',
                'email' => 'admin@email.com',
                'password' => 'admin',
                'is_admin' => true,
            ]);
        }
        if (empty(Lang::exists())) {
            Lang::factory()->create([
                'language' => 'English',
                'code' => 'en',
            ]);
            Lang::factory()->create([
                'language' => 'Azərbaycan',
                'code' => 'az',
            ]);
        }

        if (empty(Setting::exists())) {
            Setting::factory()->create([
                'fb' => '#',
                'tw' => '#',
                'in' => '#',
                'inst' => '#',
                'yt' => '#',
                'image_logo_light' => '/client/assets/images/logo/full_logo_light.png',
                'image_logo_dark' => '/client/assets/images/logo/full_logo_dark.png',
                'home_about_title' => 'Home About Title',
                'home_about_subtitle' => 'Home About SubTitle',
                'home_about_desc' => 'Home About Description',
                'footer_title' => 'Footer Title',
                'address' => '#',
                'phone' => '#',
                'fax' => '#',
                'email' => '#',
                'about_banner' => '#',
                'about_title' => 'About Title',
                'about_desc' => 'About Description',
                'about_iframe' => '#',
                'contact_title' => 'Contact Title',
                'contact_image' => '/client/assets/images/kariyer-banner.jpg',
                'categories_title' => 'Categories Title',
            ]);
        }

        if (empty(LanguageLine::exists())) {
            LanguageLine::factory()->create([
                'group' => 'menu',
                'key' => 'home',
                'text' => [
                    'en'=> 'Home',
                    'az' => 'Ana səhifə'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'menu',
                'key' => 'about',
                'text' => [
                    'en'=> 'About',
                    'az' => 'Haqqımızda'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'menu',
                'key' => 'products',
                'text' => [
                    'en'=> 'Products',
                    'az' => 'Məhsullar'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'menu',
                'key' => 'contact',
                'text' => [
                    'en'=> 'Contact',
                    'az' => 'Əlaqə'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'search',
                'key' => 'product',
                'text' => [
                    'en'=> 'Search Product',
                    'az' => 'Məhsul Axtar'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'product_detail',
                'text' => [
                    'en'=> 'Product Detail',
                    'az' => 'Məhsulun Detalları'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'send',
                'text' => [
                    'en'=> 'Send',
                    'az' => 'Göndər'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'contact_us',
                'text' => [
                    'en'=> 'Contact us',
                    'az' => 'Bizimlə Əlaqə Saxla'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'name',
                'text' => [
                    'en'=> 'Name',
                    'az' => 'Ad'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'surname',
                'text' => [
                    'en'=> 'Surname',
                    'az' => 'Soyad'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'phone',
                'text' => [
                    'en'=> 'Phone',
                    'az' => 'Telefon'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'email',
                'text' => [
                    'en'=> 'E-mail',
                    'az' => 'E-poçt'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'your_message',
                'text' => [
                    'en'=> 'Your message',
                    'az' => 'Sizin mesajınız'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'address',
                'text' => [
                    'en'=> 'Address',
                    'az' => 'Ünvan'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'num',
                'text' => [
                    'en'=> 'Num',
                    'az' => 'Tel'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'corporate',
                'text' => [
                    'en'=> 'Corporate',
                    'az' => 'Korporativ'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'companies',
                'text' => [
                    'en'=> 'Companies',
                    'az' => 'Şirkətlər'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'social',
                'text' => [
                    'en'=> 'Social Media',
                    'az' => 'Sosial Şəbəkə'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'btn',
                'key' => 'go_to_category',
                'text' => [
                    'en'=> 'Go to category',
                    'az' => 'Kateqoriyaya keçin'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'btn',
                'key' => 'category_detail',
                'text' => [
                    'en'=> 'Click for category details',
                    'az' => 'Kateqoriya detalları üçün klikləyin'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'categories',
                'text' => [
                    'en'=> 'Categories',
                    'az' => 'Kateqoriyalar'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'brand',
                'text' => [
                    'en'=> 'Brand',
                    'az' => 'Brend'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'work',
                'key' => 'datasheet',
                'text' => [
                    'en'=> 'DATASHEET',
                    'az' => 'MƏLUMAT VƏFƏQİ'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'load_more',
                'text' => [
                    'en'=> 'Load more',
                    'az' => 'Daha çox'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'continue',
                'text' => [
                    'en'=> 'Continue Reading',
                    'az' => 'Oxumağa davam et'
                ],
            ]);
            LanguageLine::factory()->create([
                'group' => 'word',
                'key' => 'phone_number',
                'text' => [
                    'en'=> 'Phone Number',
                    'az' => 'Telefon',
                ],
            ]);
        }
    }
}
