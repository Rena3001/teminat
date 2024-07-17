<?php

namespace Database\Seeders;

use App\Models\Brand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(Brand::exists())) {
            Brand::create([
                'title' => 'GEKA',
                'image'=> '/client/assets/images/brand_1.png',
            ]);
            Brand::create([
                'title' => 'GEKATEC',
                'image'=> '/client/assets/images/brand_2.png',
            ]);
        }
    }
}
