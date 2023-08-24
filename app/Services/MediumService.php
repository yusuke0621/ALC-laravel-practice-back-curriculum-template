<?php

namespace App\Services;

use App\Interfaces\Repositories\MediumRepositoryInterface;
use App\Interfaces\Services\MediumServiceInterface;

class MediumService implements MediumServiceInterface
{

    protected MediumRepositoryInterface $mediumRepository;

    public function __construct(MediumRepositoryInterface $mediumRepository)
    {
        $this->mediumRepository = $mediumRepository;
    }

    public function getAll()
    {
        return $this->mediumRepository->all()->paginate($this->mediumRepository->getPerPage());
    }
}
