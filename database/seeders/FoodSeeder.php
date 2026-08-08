<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $pizza = Category::where('name', 'Pizza')->first();
        $burger = Category::where('name', 'Burger')->first();
        $drinks = Category::where('name', 'Drinks')->first();
        $desserts = Category::where('name', 'Desserts')->first();

        Food::create([
            'category_id' => $pizza->id,
            'name' => 'Margherita Pizza',
            'description' => 'Classic pizza with tomato, mozzarella and basil.',
            'price' => 10.00,
            'image' => null,
            'status' => true,
        ]);

        Food::create([
            'category_id' => $pizza->id,
            'name' => 'Chicken Pizza',
            'description' => 'Pizza topped with delicious chicken pieces.',
            'price' => 12.00,
            'image' => null,
            'status' => true,
        ]);

        Food::create([
            'category_id' => $burger->id,
            'name' => 'Chicken Burger',
            'description' => 'Crispy chicken burger with fresh vegetables.',
            'price' => 8.00,
            'image' => null,
            'status' => true,
        ]);

        Food::create([
            'category_id' => $burger->id,
            'name' => 'Cheese Burger',
            'description' => 'Juicy burger topped with melted cheese.',
            'price' => 9.00,
            'image' => null,
            'status' => true,
        ]);

        Food::create([
            'category_id' => $drinks->id,
            'name' => 'Coke',
            'description' => 'Chilled Coca-Cola.',
            'price' => 2.00,
            'image' => null,
            'status' => true,
        ]);

        Food::create([
            'category_id' => $drinks->id,
            'name' => 'Fresh Lemonade',
            'description' => 'Refreshing homemade lemonade.',
            'price' => 3.00,
            'image' => null,
            'status' => true,
        ]);

        Food::create([
            'category_id' => $desserts->id,
            'name' => 'Chocolate Cake',
            'description' => 'Rich and moist chocolate cake.',
            'price' => 5.00,
            'image' => null,
            'status' => true,
        ]);
    }
}