<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Satin',
            'category_id' => Category::inRandomOrder()->first()->id,  // Mengacu pada kategori yang telah dibuat
            'harga' => 10000,
            'image' => fake()->url(),
            'description' => fake()->paragraph()

        ]);

        Product::create([
            'name' => 'Satin Renda',
            'category_id' => Category::inRandomOrder()->first()->id,  // Mengacu pada kategori yang telah dibuat
            'harga' => 10000,
            'image' => fake()->url(),
            'description' => fake()->paragraph()

        ]);

        Product::create([
            'name' => 'Bludru',
            'category_id' => Category::inRandomOrder()->first()->id,  // Mengacu pada kategori yang telah dibuat
            'harga' => 10000,
            'image' => fake()->url(),
            'description' => fake()->paragraph()

        ]);

        Product::create([
            'name' => 'Bludru Renda',
            'category_id' => Category::inRandomOrder()->first()->id,  // Mengacu pada kategori yang telah dibuat
            'harga' => 10000,
            'image' => fake()->url(),
            'description' => fake()->paragraph()

        ]);

        Product::create([
            'name' => 'Buket',
            'category_id' => Category::inRandomOrder()->first()->id,  // Mengacu pada kategori yang telah dibuat
            'harga' => 10000,
            'image' => fake()->url(),
            'description' => fake()->paragraph()

        ]);
        Product::create([
            'name' => 'Buket Snack',
            'category_id' => Category::inRandomOrder()->first()->id,  // Mengacu pada kategori yang telah dibuat
            'harga' => 10000,
            'image' => fake()->url(),
            'description' => fake()->paragraph()

        ]);
        Product::create([
            'name' => 'Buket Uang',
            'category_id' => Category::inRandomOrder()->first()->id,  // Mengacu pada kategori yang telah dibuat
            'harga' => 10000,
            'image' => fake()->url(),
            'description' => fake()->paragraph()
        ]);
    }
}
