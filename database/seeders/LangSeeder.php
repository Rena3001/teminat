<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(Lang::exists())) {
            Lang::create([
                'language' => 'English',
                'code' => 'en',
                'image'=> '/client/assets/images/gb.svg',
            ]);
            Lang::create([
                'language' => 'Azərbaycan',
                'code' => 'az',
                'image'=> '/client/assets/images/az.svg',
            ]);
        }
    }
}
