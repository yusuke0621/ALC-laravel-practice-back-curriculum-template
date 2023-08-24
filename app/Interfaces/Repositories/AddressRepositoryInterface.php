<?php

namespace App\Interfaces\Repositories;

interface AddressRepositoryInterface extends BaseRepositoryInterface
{
    public function all(string $column = 'created_at', string $direction = 'asc');
}
