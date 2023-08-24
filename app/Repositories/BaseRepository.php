<?php

namespace App\Repositories;

class BaseRepository
{
    protected int $perPage = 10;

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function setPerPage(int $perPage)
    {
        $this->perPage = $perPage;
        return $this;
    }
}
