<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Lang;
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
                'image_logo_light' => '#',
                'image_logo_dark' => '#',
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
                'contact_image' => '#',
                'categories_title' => 'Categories Title',
            ]);
        }
    }
}