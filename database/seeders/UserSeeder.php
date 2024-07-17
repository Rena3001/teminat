<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (empty(User::exists())) {
            User::factory()->create([
                'name' => 'Admin Super',
                'email' => 'admin@email.com',
                'password' => 'admin',
                'is_admin' => true,
            ]);
        }
    }
}
