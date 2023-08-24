<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    protected Address $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->address::orderBy($column, $direction);
    }

    public function find(int $id): Address
    {
        return $this->address::findOrFail($id);
    }

    public function create(array $detail): Address
    {
        return $this->address::create($detail);
    }

    public function update(int $id, array $detail): Address
    {
        return $this->address::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->address::destroy($id);
    }
}
