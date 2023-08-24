<?php

namespace App\Services;

use App\Interfaces\Repositories\AddressRepositoryInterface;
use App\Interfaces\Services\AddressServiceInterface;

class AddressService implements AddressServiceInterface
{
    protected AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function getAll()
    {
        return $this->addressRepository->all()->paginate($this->addressRepository->getPerPage());
    }
}
