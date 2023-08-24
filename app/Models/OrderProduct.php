<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends BaseModel
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'price', 'quantity', 'tax_rate'];

    protected $hidden = [
        'deleted_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
