<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Food;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll(): Collection
    {
        return Order::with([
            'orderItems.food',
            'user',
        ])
        ->orderBy('created_at', 'desc')
        ->get();
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
        $totalAmount = 0;

        $items = [];

        foreach ($data['items'] as $item) {
            $food = Food::findOrFail($item['food_id']);

            $price = $food->price;
            $quantity = $item['quantity'];

            $totalAmount += $price * $quantity;

            $items[] = [
                'food_id' => $food->id,
                'quantity' => $quantity,
                'price' => $price,
            ];
        }

        $order = Order::create([
            'user_id' => $data['user_id'],
            'total_amount' => $totalAmount,
            'status' => 'pending',
        ]);

        $order->orderItems()->createMany($items);

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