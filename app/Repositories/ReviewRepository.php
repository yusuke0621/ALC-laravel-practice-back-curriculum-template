<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\ReviewRepositoryInterface;
use App\Models\Review;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    protected Review $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->review::orderBy($column, $direction);
    }

    public function find(int $id): Review
    {
        return $this->review::findOrFail($id);
    }

    public function create(array $detail): Review
    {
        return $this->review::create($detail);
    }

    public function update(int $id, array $detail): Review
    {
        return $this->review::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->review::destroy($id);
    }
}
