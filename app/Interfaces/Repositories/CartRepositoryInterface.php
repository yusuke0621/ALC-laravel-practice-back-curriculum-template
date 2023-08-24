<?php

namespace App\Interfaces\Repositories;

use App\Http\Requests\Cart\CreateRequest;
use App\Http\Requests\Cart\UpdateRequest;

use Illuminate\Database\Eloquent\Model;

interface CartRepositoryInterface extends BaseRepositoryInterface
{
    public function all(string $column = 'created_at', string $direction = 'asc');
    public function create(CreateRequest $request): Model;
    public function update(UpdateRequest $request): Model;
    public function delete(int $id);
    public function deleteAll();
    public function getSubtotalPrices();
}
