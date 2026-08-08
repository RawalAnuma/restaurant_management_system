<?php

namespace App\Repositories;

use App\Models\Food;
use App\Repositories\Contracts\FoodRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class FoodRepository implements FoodRepositoryInterface
{
    public function getAll(): Collection
    {
        return Food::with('category')->latest()->get();
    }

    public function findById(int $id): ?Food
    {
        return Food::with('category')->find($id);
    }

    public function create(array $data): Food
    {
        $food = Food::create($data);

        return $food->load('category');
    }

    public function update(Food $food, array $data): Food
    {
        $food->update($data);

        return $food->fresh('category');
    }

    public function delete(Food $food): bool
    {
        return $food->delete();
    }
}