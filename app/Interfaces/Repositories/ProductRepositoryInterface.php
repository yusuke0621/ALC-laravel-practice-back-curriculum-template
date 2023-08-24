<?php

namespace App\Interfaces\Repositories;

use App\Models\Product;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function all(string $column = 'created_at', string $direction = 'asc');
    public function find(int $id): Product;
}
