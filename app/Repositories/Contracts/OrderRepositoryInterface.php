<?php

namespace App\Repositories\Contracts;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?Order;

    public function create(array $data): Order;

    public function updateStatus(Order $order, string $status): Order;

    public function delete(Order $order): bool;
}