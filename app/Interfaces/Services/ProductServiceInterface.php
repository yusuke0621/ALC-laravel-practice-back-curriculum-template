<?php

namespace App\Interfaces\Services;

use App\Models\Product;

interface ProductServiceInterface extends BaseServiceInterface
{
    public function getAll();
    public function find(int $id): Product;
}
