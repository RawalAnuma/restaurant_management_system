<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll(): Collection
    {
        return Order::with([
            'user',
            'orderItems.food',
        ])->latest()->get();
    }

    public function findById(int $id): ?Order
    {
        return Order::with([
            'user',
            'orderItems.food',
        ])->find($id);
    }

    public function create(array $data): Order
    {
        $order = Order::create([
            'user_id' => $data['user_id'],
            'total_amount' => $data['total_amount'],
            'status' => $data['status'] ?? 'pending',
        ]);

        $order->orderItems()->createMany($data['items']);

        return $order->load([
            'user',
            'orderItems.food',
        ]);
    }

    public function updateStatus(Order $order, string $status): Order
    {
        $order->update([
            'status' => $status,
        ]);

        return $order->fresh([
            'user',
            'orderItems.food',
        ]);
    }

    public function delete(Order $order): bool
    {
        return $order->delete();
    }
}