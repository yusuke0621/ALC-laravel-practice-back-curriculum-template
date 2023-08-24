<?php

namespace App\Interfaces\Repositories;

interface OrderProductRepositoryInterface extends BaseRepositoryInterface
{
    public function all(string $column = 'created_at', string $direction = 'asc');
}
