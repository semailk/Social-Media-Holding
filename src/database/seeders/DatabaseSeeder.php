<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = ['smartphones',
            'laptops',
            'fragrances',
            'skincare',
            'groceries',
            'home-decoration',
            'furniture',
            'tops',
            'womens-dresses',
            'womens-shoes',
            'mens-shirts',
            'mens-shoes',
            'mens-watches',
            'womens-watches',
            'womens-bags',
            'womens-jewellery',
            'sunglasses',
            'automotive',
            'motorcycle',
            'lighting'
        ];

        foreach ($categories as $category){
            Category::query()->firstOrCreate(['name' => $category], ['name' => $category]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
