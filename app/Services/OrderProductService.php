<?php

namespace App\Services;

use App\Interfaces\Repositories\OrderProductRepositoryInterface;
use App\Interfaces\Services\OrderProductServiceInterface;

class OrderProductService implements OrderProductServiceInterface
{

    protected OrderProductRepositoryInterface $orderProductRepository;

    public function __construct(OrderProductRepositoryInterface $orderProductRepository)
    {
        $this->orderProductRepository = $orderProductRepository;
    }

    public function getAll()
    {
        return $this->orderProductRepository->all()->paginate($this->orderProductRepository->getPerPage());
    }
}
