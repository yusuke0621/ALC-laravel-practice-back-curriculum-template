<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\OrderProductRepositoryInterface;
use App\Models\OrderProduct;

class OrderProductRepository extends BaseRepository implements OrderProductRepositoryInterface
{
    protected OrderProduct $orderProduct;

    public function __construct(OrderProduct $orderProduct)
    {
        $this->orderProduct = $orderProduct;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->orderProduct::orderBy($column, $direction);
    }

    public function find(int $id): OrderProduct
    {
        return $this->orderProduct::findOrFail($id);
    }

    public function create(array $detail): OrderProduct
    {
        return $this->orderProduct::create($detail);
    }

    public function update(int $id, array $detail): OrderProduct
    {
        return $this->orderProduct::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->orderProduct::destroy($id);
    }
}
