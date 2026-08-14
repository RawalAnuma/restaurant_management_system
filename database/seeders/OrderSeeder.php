<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $foods = Food::all();

        if ($users->isEmpty() || $foods->isEmpty()) {
            return;
        }

        $statuses = [
            'pending',
            'confirmed',
            'preparing',
            'ready',
            'completed',
            'cancelled',
        ];

        //Orders from different days
        
        $orders = [
            // Today
            [
                'user' => 0,
                'days_ago' => 0,
                'status' => 'pending',
                'items' => [
                    [0, 2],
                    [1, 1],
                ],
            ],
            [
                'user' => 1,
                'days_ago' => 0,
                'status' => 'preparing',
                'items' => [
                    [2, 1],
                    [3, 2],
                ],
            ],
            [
                'user' => 2,
                'days_ago' => 0,
                'status' => 'ready',
                'items' => [
                    [0, 1],
                    [4, 2],
                ],
            ],

            // Yesterday
            [
                'user' => 3,
                'days_ago' => 1,
                'status' => 'completed',
                'items' => [
                    [1, 2],
                    [2, 1],
                ],
            ],
            [
                'user' => 4,
                'days_ago' => 1,
                'status' => 'completed',
                'items' => [
                    [3, 1],
                    [5, 2],
                ],
            ],
            [
                'user' => 5,
                'days_ago' => 1,
                'status' => 'cancelled',
                'items' => [
                    [0, 2],
                ],
            ],

            // 2 days ago
            [
                'user' => 6,
                'days_ago' => 2,
                'status' => 'completed',
                'items' => [
                    [2, 2],
                    [4, 1],
                ],
            ],
            [
                'user' => 7,
                'days_ago' => 2,
                'status' => 'ready',
                'items' => [
                    [1, 1],
                    [3, 1],
                    [5, 1],
                ],
            ],
            [
                'user' => 8,
                'days_ago' => 2,
                'status' => 'completed',
                'items' => [
                    [0, 1],
                    [2, 1],
                ],
            ],

            // 3 days ago
            [
                'user' => 9,
                'days_ago' => 3,
                'status' => 'completed',
                'items' => [
                    [4, 2],
                    [5, 1],
                ],
            ],
            [
                'user' => 0,
                'days_ago' => 3,
                'status' => 'preparing',
                'items' => [
                    [1, 2],
                    [3, 1],
                ],
            ],
            [
                'user' => 2,
                'days_ago' => 3,
                'status' => 'cancelled',
                'items' => [
                    [0, 1],
                    [4, 1],
                ],
            ],

            // 4 days ago
            [
                'user' => 4,
                'days_ago' => 4,
                'status' => 'completed',
                'items' => [
                    [2, 1],
                    [3, 2],
                ],
            ],
            [
                'user' => 6,
                'days_ago' => 4,
                'status' => 'completed',
                'items' => [
                    [0, 2],
                ],
            ],

            // 5 days ago
            [
                'user' => 1,
                'days_ago' => 5,
                'status' => 'completed',
                'items' => [
                    [1, 1],
                    [5, 2],
                ],
            ],
            [
                'user' => 3,
                'days_ago' => 5,
                'status' => 'confirmed',
                'items' => [
                    [2, 1],
                    [4, 1],
                ],
            ],

            // 6 days ago
            [
                'user' => 5,
                'days_ago' => 6,
                'status' => 'completed',
                'items' => [
                    [0, 1],
                    [3, 1],
                ],
            ],
            [
                'user' => 7,
                'days_ago' => 6,
                'status' => 'completed',
                'items' => [
                    [4, 2],
                ],
            ],

            // 7 days ago
            [
                'user' => 8,
                'days_ago' => 7,
                'status' => 'completed',
                'items' => [
                    [1, 2],
                    [2, 1],
                ],
            ],
            [
                'user' => 9,
                'days_ago' => 7,
                'status' => 'cancelled',
                'items' => [
                    [5, 1],
                ],
            ],

            // Older orders
            [
                'user' => 0,
                'days_ago' => 10,
                'status' => 'completed',
                'items' => [
                    [0, 2],
                    [2, 1],
                ],
            ],
            [
                'user' => 3,
                'days_ago' => 12,
                'status' => 'completed',
                'items' => [
                    [3, 1],
                    [4, 2],
                ],
            ],
            [
                'user' => 5,
                'days_ago' => 14,
                'status' => 'completed',
                'items' => [
                    [1, 1],
                    [5, 1],
                ],
            ],
            [
                'user' => 7,
                'days_ago' => 16,
                'status' => 'completed',
                'items' => [
                    [0, 1],
                    [4, 1],
                ],
            ],
            [
                'user' => 2,
                'days_ago' => 18,
                'status' => 'completed',
                'items' => [
                    [2, 2],
                ],
            ],
            [
                'user' => 6,
                'days_ago' => 20,
                'status' => 'completed',
                'items' => [
                    [3, 2],
                    [5, 1],
                ],
            ],
            [
                'user' => 9,
                'days_ago' => 22,
                'status' => 'completed',
                'items' => [
                    [1, 1],
                    [2, 1],
                ],
            ],
            [
                'user' => 4,
                'days_ago' => 25,
                'status' => 'completed',
                'items' => [
                    [0, 2],
                ],
            ],
            [
                'user' => 8,
                'days_ago' => 27,
                'status' => 'completed',
                'items' => [
                    [4, 1],
                    [5, 1],
                ],
            ],
            [
                'user' => 1,
                'days_ago' => 30,
                'status' => 'completed',
                'items' => [
                    [2, 1],
                    [3, 1],
                ],
            ],
        ];

        foreach ($orders as $orderData) {
            $user = $users[$orderData['user']];

            $orderDate = now()
                ->subDays($orderData['days_ago'])
                ->setTime(
                    rand(10, 20),
                    rand(0, 59),
                    rand(0, 59)
                );

            $total = 0;

            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => 0,
                'status' => $orderData['status'],
                'created_at' => $orderDate,
                'updated_at' => $orderDate,
            ]);

            foreach ($orderData['items'] as [$foodIndex, $quantity]) {
                $food = $foods[$foodIndex];

                $price = (float) $food->price;
                $subtotal = $price * $quantity;

                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'food_id' => $food->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'created_at' => $orderDate,
                    'updated_at' => $orderDate,
                ]);
            }

            $order->update([
                'total_amount' => $total,
            ]);
        }
    }
}