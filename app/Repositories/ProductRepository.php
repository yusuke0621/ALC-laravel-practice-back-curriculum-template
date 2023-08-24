<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->product::orderBy($column, $direction);
    }

    public function find(int $id): Product
    {
        return $this->product::findOrFail($id);
    }

    public function create(array $detail): Product
    {
        return $this->product::create($detail);
    }

    public function update(int $id, array $detail): Product
    {
        return $this->product::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->product::destroy($id);
    }
}
