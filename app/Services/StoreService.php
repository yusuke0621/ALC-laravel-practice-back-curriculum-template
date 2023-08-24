<?php

namespace App\Services;

use App\Interfaces\Repositories\StoreRepositoryInterface;
use App\Interfaces\Services\StoreServiceInterface;

class StoreService implements StoreServiceInterface
{

    protected StoreRepositoryInterface $storeRepository;

    public function __construct(StoreRepositoryInterface $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function getAll()
    {
        return $this->storeRepository->all()->paginate($this->storeRepository->getPerPage());
    }
}
