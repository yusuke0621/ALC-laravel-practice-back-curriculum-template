<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medium extends BaseModel
{
    use HasFactory;

    protected $hidden = [
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mediumable()
    {
        return $this->morphTo();
    }
}
