<?php

namespace App\Interfaces\Repositories;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function all(string $column = 'created_at', string $direction = 'asc');
}
