<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Food extends Model
{
    protected $table = 'foods';
    
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany{
        return $this->hasMany(OrderItem::class);
    }


}
