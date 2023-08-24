<?php

namespace App\Interfaces\Repositories;

use App\Interfaces\Services\CartServiceInterface;
use App\Models\Order;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function all(string $column = 'created_at', string $direction = 'asc');
    public function create(CartServiceInterface $cartService): Order;
}
