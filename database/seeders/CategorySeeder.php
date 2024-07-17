<?php

namespace Database\Seeders;

use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(Category::exists())) {
            // parent categories
            Category::create([
                'title' => [
                    'en' => 'Welding Electrodes',
                    'az' => 'Qaynaq elektrodları'
                ],
                'slug' => [
                    'en' => Str::slug('Welding Electrodes'),
                    'az' => Str::slug('Qaynaq elektrodları')
                ],
                'image' => '/client/assets/images/parent_1.jpg',
                'parent_id' => null,
            ]);

            Category::create([
                'title' => [
                    'en' => 'Gas Shielded Arc Welding Wires And Rods',
                    'az' => 'Qazaltı qövs qaynaq məftilləri və çubuqları'
                ],
                'slug' => [
                    'en' => Str::slug('Gas Shielded Arc Welding Wires And Rods'),
                    'az' => Str::slug('Qazaltı qövs qaynaq məftilləri və çubuqları')
                ],
                'image' => '/client/assets/images/parent_2.jpg',
                'parent_id' => null,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Cored Wires',
                    'az' => 'Özəkli məftillər'
                ],
                'slug' => [
                    'en' => Str::slug('Cored Wires'),
                    'az' => Str::slug('Özəkli məftillər')
                ],
                'image' => '/client/assets/images/parent_3.jpg',
                'parent_id' => null,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Submerged Arc Welding Wires And Fluxes',
                    'az' => 'Sualtı qövs qaynaq məftilləri və tozları'
                ],
                'slug' => [
                    'en' => Str::slug('Submerged Arc Welding Wires And Fluxes'),
                    'az' => Str::slug('Sualtı qövs qaynaq məftilləri və tozları')
                ],
                'image' => '/client/assets/images/parent_4.jpg',
                'parent_id' => null,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Aluminium',
                    'az' => 'Aluminium'
                ],
                'slug' => [
                    'en' => Str::slug('Aluminium'),
                    'az' => Str::slug('Aluminium')
                ],
                'image' => '/client/assets/images/parent_5.jpg',
                'parent_id' => null,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Stainless',
                    'az' => 'Paslanmayan'
                ],
                'slug' => [
                    'en' => Str::slug('Stainless'),
                    'az' => Str::slug('Paslanmayan')
                ],
                'image' => '/client/assets/images/parent_6.jpg',
                'parent_id' => null,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Hardfacing',
                    'az' => 'Sərt dolğu'
                ],
                'slug' => [
                    'en' => Str::slug('Hardfacing'),
                    'az' => Str::slug('Sərt dolğu')
                ],
                'image' => '/client/assets/images/parent_7.jpeg',
                'parent_id' => null,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Brazing Rods And Fluxes',
                    'az' => 'Sərt Lehimləmə çubuqları və tozları'
                ],
                'slug' => [
                    'en' => Str::slug('Brazing Rods And Fluxes'),
                    'az' => Str::slug('Sərt Lehimləmə çubuqları və tozları')
                ],
                'image' => '/client/assets/images/parent_8.jpg',
                'parent_id' => null,
            ]);

            // children categories

            $category = Category::first();

            Category::create([
                'title' => [
                    'en' => 'Unalloyed Electrodes',
                    'az' => 'Ərintisiz elektrodlar'
                ],
                'slug' => [
                    'en' => Str::slug('Unalloyed Electrodes'),
                    'az' => Str::slug('Ərintisiz elektrodlar')
                ],
                'image' => '/client/assets/images/child_1.png',
                'parent_id' => $category->id,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Low Hydrogen Electrodes',
                    'az' => 'Az ərintili hidrogen elektrodları'
                ],
                'slug' => [
                    'en' => Str::slug('Low Hydrogen Electrodes'),
                    'az' => Str::slug('Az ərintili hidrogen elektrodları')
                ],
                'image' => '/client/assets/images/child_2.jpg',
                'parent_id' => $category->id,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Low Alloyed Electrodes',
                    'az' => 'Az ərintili elektrodlar'
                ],
                'slug' => [
                    'en' => Str::slug('Low Alloyed Electrodes'),
                    'az' => Str::slug('Az ərintili elektrodlar')
                ],
                'image' => '/client/assets/images/child_3.jpg',
                'parent_id' => $category->id,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Cast Iron Electrodes',
                    'az' => 'Tökmə dəmir elektrodları'
                ],
                'slug' => [
                    'en' => Str::slug('Cast Iron Electrodes'),
                    'az' => Str::slug('Tökmə dəmir elektrodları')
                ],
                'image' => '/client/assets/images/child_4.jpg',
                'parent_id' => $category->id,
            ]);

            $category2 = Category::where('id','!=',$category->id)->first();
            Category::create([
                'title' => [
                    'en' => 'Unalloyed Gas Shielded Arc Welding Wires And Rods',
                    'az' => 'Ərintisiz qazaltı qaynaq məftilləri və çubuqları'
                ],
                'slug' => [
                    'en' => Str::slug('Unalloyed Gas Shielded Arc Welding Wires And Rods'),
                    'az' => Str::slug('Ərintisiz qazaltı qaynaq məftilləri və çubuqları')
                ],
                'image' => '/client/assets/images/child_2_1.jpg',
                'parent_id' => $category2->id,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Low Alloyed Gas Shielded Arc Welding Wires And Rods',
                    'az' => 'Az ərintili qazaltı qaynaq məftilləri və çubuqları'
                ],
                'slug' => [
                    'en' => Str::slug('Low Alloyed Gas Shielded Arc Welding Wires And Rods'),
                    'az' => Str::slug('Az ərintili qazaltı qaynaq məftilləri və çubuqları')
                ],
                'image' => '/client/assets/images/child_2_2.jpg',
                'parent_id' => $category2->id,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Copper Alloyed Gas Shielded Arc Welding Wires And Rods',
                    'az' => 'Mis ərintili  qazaltı qaynaq məftilləri və çubuqları'
                ],
                'slug' => [
                    'en' => Str::slug('Copper Alloyed Gas Shielded Arc Welding Wires And Rods'),
                    'az' => Str::slug('Mis ərintili  qazaltı qaynaq məftilləri və çubuqları')
                ],
                'image' => '/client/assets/images/child_2_3.jpg',
                'parent_id' => $category2->id,
            ]);
            Category::create([
                'title' => [
                    'en' => 'Nickel Alloyed Gas Shielded Arc Welding Wires And Rods',
                    'az' => 'Nikel ərintili qazaltı qaynaq məftilləri və çubuqları'
                ],
                'slug' => [
                    'en' => Str::slug('Nickel Alloyed Gas Shielded Arc Welding Wires And Rods'),
                    'az' => Str::slug('Nikel ərintili qazaltı qaynaq məftilləri və çubuqları')
                ],
                'image' => '/client/assets/images/child_2_4.jpg',
                'parent_id' => $category2->id,
            ]);
        }
    }
}
