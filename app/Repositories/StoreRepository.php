<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Models\Store;

class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{
    protected Store $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->store::orderBy($column, $direction);
    }

    public function find(int $id): Store
    {
        return $this->store::findOrFail($id);
    }

    public function create(array $detail): Store
    {
        return $this->store::create($detail);
    }

    public function update(int $id, array $detail): Store
    {
        return $this->store::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->store::destroy($id);
    }
}
