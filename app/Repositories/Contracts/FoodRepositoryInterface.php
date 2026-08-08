<?php

namespace App\Repositories\Contracts;

use App\Models\Food;
use Illuminate\Database\Eloquent\Collection;

interface FoodRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Food;

    public function create(array $data): Food;

    public function update(Food $food, array $data): Food;

    public function delete(Food $food): bool;
}