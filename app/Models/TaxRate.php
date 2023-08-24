<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxRate extends BaseModel
{
    use HasFactory;

    protected $hidden = [
        'deleted_at',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
