<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\MediumRepositoryInterface;
use App\Models\Medium;

class MediumRepository extends BaseRepository implements MediumRepositoryInterface
{
    protected Medium $medium;

    public function __construct(Medium $medium)
    {
        $this->medium = $medium;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->medium::orderBy($column, $direction);
    }

    public function find(int $id): Medium
    {
        return $this->medium::findOrFail($id);
    }

    public function create(array $detail): Medium
    {
        return $this->medium::create($detail);
    }

    public function update(int $id, array $detail): Medium
    {
        return $this->medium::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->medium::destroy($id);
    }
}
