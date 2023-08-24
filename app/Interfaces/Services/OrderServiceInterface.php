<?php

namespace App\Interfaces\Services;

interface OrderServiceInterface extends BaseServiceInterface
{
    public function getAll();
    public function create(CartServiceInterface $cartService);
}
