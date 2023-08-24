<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Models\User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function all(string $column = 'created_at', string $direction = 'asc');
}
