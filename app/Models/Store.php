<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends BaseModel
{
    use HasFactory;

    protected $hidden = [
        'deleted_at',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
