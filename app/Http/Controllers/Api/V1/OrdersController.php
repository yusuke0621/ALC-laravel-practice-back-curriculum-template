<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Interfaces\Services\CartServiceInterface;
use App\Interfaces\Services\OrderServiceInterface;
use App\Http\Resources\OrderResource;

/**
 * 注文に関するコントローラ
 */
class OrdersController extends BaseController
{
    private OrderServiceInterface $orderService;

    public function __construct(OrderServiceInterface $orderService, CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
        $this->orderService = $orderService;
    }

    /**
     * 注文一覧取得
     */
    public function index(): JsonResponse
    {
        return $this->respondWithItems($this->orderService->getAll());
    }

    /**
     * 新しい注文を作成
     */
    public function create(): JsonResponse
    {
        return $this->respondWithItem(new OrderResource($this->orderService->create($this->cartService)));
    }
}
