<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(Product::exists())) {
            // parent categories
            $categories = Category::all();
            $brend = Brand::first();
            $brend2 = Brand::where('id','!=',$brend->id)->first();

            foreach ($categories as $category) {
                $children = $category->childrenCategories;

                foreach ($children as $child) {
                    Product::create([
                        'title' => [
                            'en' => 'Electrode - ELIT '.$child->id,
                            'az' => 'Elektrod - ELIT '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('Electrode - ELIT '.$child->id),
                            'az' => Str::slug('Elektrod - ELIT '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_1.png',
                        'pdf_file' => '/client/assets/pdfs/product_1.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend->id,
                    ]);
                    Product::create([
                        'title' => [
                            'en' => 'Electrode - PANTERA '.$child->id,
                            'az' => 'Elektrod - PANTERA '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('Electrode - PANTERA '.$child->id),
                            'az' => Str::slug('Elektrod - PANTERA '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_2.png',
                        'pdf_file' => '/client/assets/pdfs/product_2.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend2->id,
                    ]);
                    Product::create([
                        'title' => [
                            'en' => 'Low Alloyed Electrode - LINK 6010 '.$child->id,
                            'az' => 'Az Ərintili Elektrod - LINK 6010 '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('Low Alloyed Electrode - LINK 6010 '.$child->id),
                            'az' => Str::slug('Az Ərintili Elektrod - LINK 6010 '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_3.jpg',
                        'pdf_file' => '/client/assets/pdfs/product_3.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend->id,
                    ]);
                    Product::create([
                        'title' => [
                            'en' => 'Cast Iron Electrode - ELNIKEL '.$child->id,
                            'az' => 'Çuqun Elektrod - ELNIKEL '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('Cast Iron Electrode - ELNIKEL '.$child->id),
                            'az' => Str::slug('Çuqun Elektrod - ELNIKEL '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_4.png',
                        'pdf_file' => '/client/assets/pdfs/product_4.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend2->id,
                    ]);
                    Product::create([
                        'title' => [
                            'en' => 'Cast Iron Electrode - ELNIFER '.$child->id,
                            'az' => 'Çuqun Elektrod - ELNIFER '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('Cast Iron Electrode - ELNIFER '.$child->id),
                            'az' => Str::slug('Çuqun Elektrod - ELNIFER '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_5.jpeg',
                        'pdf_file' => '/client/assets/pdfs/product_5.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend->id,
                    ]);
                    Product::create([
                        'title' => [
                            'en' => 'Cast Iron Electrode - St - CAST '.$child->id,
                            'az' => 'Çuqun Elektrod - St - CAST '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('Cast Iron Electrode - St - CAST '.$child->id),
                            'az' => Str::slug('Çuqun Elektrod - St - CAST '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_6.jpeg',
                        'pdf_file' => '/client/assets/pdfs/product_6.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend2->id,
                    ]);
                    Product::create([
                        'title' => [
                            'en' => 'Nickel Based Electrode - NIBAZ B 65 '.$child->id,
                            'az' => 'Nikel Əsaslı Elektrod - NIBAZ B 65 '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('Nickel Based Electrode - NIBAZ B 65 '.$child->id),
                            'az' => Str::slug('Nikel Əsaslı Elektrod - NIBAZ B 65 '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_7.jpg',
                        'pdf_file' => '/client/assets/pdfs/product_7.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend->id,
                    ]);
                    Product::create([
                        'title' => [
                            'en' => 'ELIT CUT '.$child->id,
                            'az' => 'ELIT CUT '.$child->id
                        ],
                        'slug' => [
                            'en' => Str::slug('ELIT CUT '.$child->id),
                            'az' => Str::slug('ELIT CUT '.$child->id)
                        ],
                        'image' => '/client/assets/images/product_8.jpg',
                        'pdf_file' => '/client/assets/pdfs/product_8.pdf',

                        'category_id' => $child->id,
                        'brand_id' => $brend2->id,
                    ]);
                }
            }
        }
    }
}
