<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Vocal',
            'slug' => 'vocal'
        ]);

        Category::create([
            'name' => 'Dasar',
            'slug' => 'dasar'
        ]);

        Category::create([
            'name' => 'Gestur',
            'slug' => 'gestur'
        ]);
    }
}
