<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'name' => 'Infrastruktur',
                'description' => 'Jalan, jembatan, fasilitas umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lingkungan',
                'description' => 'Sampah dan kebersihan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pelayanan Publik',
                'description' => 'Pelayanan instansi pemerintah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
