<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(Slider::exists())) {
            Slider::create([
                'image'=>'/client/assets/images/slider_1.jpg',
            ]);
            Slider::create([
                'image'=>'/client/assets/images/slider_2.jpg',
            ]);
            Slider::create([
                'image'=>'/client/assets/images/slider_3.jpg',
            ]);
            Slider::create([
                'image'=>'/client/assets/images/slider_4.jpg',
            ]);
        }
    }
}
