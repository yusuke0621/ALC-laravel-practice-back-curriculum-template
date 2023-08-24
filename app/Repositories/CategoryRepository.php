<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->category::orderBy($column, $direction);
    }

    public function find(int $id): Category
    {
        return $this->category::findOrFail($id);
    }

    public function create(array $detail): Category
    {
        return $this->category::create($detail);
    }

    public function update(int $id, array $detail): Category
    {
        return $this->category::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->category::destroy($id);
    }
}
