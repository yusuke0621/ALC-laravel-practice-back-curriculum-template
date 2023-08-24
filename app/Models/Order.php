<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends BaseModel
{
    use HasFactory;

    protected $fillable = ['user_id', 'address_id', 'total_price', 'payment_type'];

    protected $hidden = [
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
