<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

use App\Repositories\BaseRepository;

interface BaseRepositoryInterface
{
    public function getPerPage(): int;
    public function setPerPage(int $perPage);
    // public function all(string $column = 'created_at', string $direction = 'asc');
    // public function find(int $id): Model | null;
    // public function create(FormRequest $request): Model;
    // public function update(int $id, array $detail): Model;
    // public function delete(int $id): void;
}
