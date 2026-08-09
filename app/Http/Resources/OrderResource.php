<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->whenLoaded('user', function(){
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ];
            }),

            'items' => $this->whenLoaded('orderItems', function(){
                return $this->orderItems->map(fucntion($item){
                    return [
                        'id' => $item->id,
                        'food_id' => $item->food_id,
                        'food' => $item->food ? [
                            'id' => $item->food->id,
                            'name' => $item->food->name,
                            'image' => $item->food->image,
                        ] : null,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'subtotal' => $item->quantity*$item->price,
                    ];
                });
            }),

            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
