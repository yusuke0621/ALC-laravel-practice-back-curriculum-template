<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all(string $column = 'created_at', string $direction = 'asc'): Builder
    {
        return $this->user::orderBy($column, $direction);
    }

    public function find(int $id): User
    {
        return $this->user::find($id);
    }

    public function create(array $detail): User
    {
        return $this->user::create($detail);
    }

    public function update(int $id, array $detail): User
    {
        return $this->user::where('id', $id)->update($detail);
    }

    public function delete(int $id): void
    {
        $this->user::destroy($id);
    }
}
