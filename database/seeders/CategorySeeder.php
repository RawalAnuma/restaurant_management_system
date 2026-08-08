<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Pizza',
            'description' => 'Freshly prepared pizzas',
        ]);

        Category::create([
            'name' => 'Burger',
            'description' => 'Delicious burgers and sandwiches',
        ]);

        Category::create([
            'name' => 'Drinks',
            'description' => 'Cold and refreshing beverages',
        ]);

        Category::create([
            'name' => 'Desserts',
            'description' => 'Sweet treats and desserts',
        ]);
    }
}