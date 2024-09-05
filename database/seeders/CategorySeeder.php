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
            'name' => 'Satin',
        ]);
        Category::create([
            'name' => 'Satin Renda',
        ]);
        Category::create([
            'name' => 'Bludru',
        ]);
        Category::create([
            'name' => 'Bludru Renda',
        ]);
        Category::create([
            'name' => 'Buket',
        ]);
        Category::create([
            'name' => 'Buket Snack',
        ]);
        Category::create([
            'name' => 'Buket Uang',
        ]);
    }
}
