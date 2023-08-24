<?php

namespace App\Services;

use App\Interfaces\Repositories\OrderRepositoryInterface;
use App\Interfaces\Services\CartServiceInterface;
use App\Interfaces\Services\OrderServiceInterface;
use App\Services\CartService;

class OrderService implements OrderServiceInterface
{

    protected OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAll()
    {
        return $this->orderRepository->all()->paginate($this->orderRepository->getPerPage());
    }

    public function create(CartServiceInterface $cartService)
    {
        return $this->orderRepository->create($cartService);
    }
}
