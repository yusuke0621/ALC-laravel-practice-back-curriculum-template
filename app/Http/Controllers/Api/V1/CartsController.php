<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests\Cart\CreateRequest;
use App\Http\Requests\Cart\UpdateRequest;
use App\Http\Resources\CartResource;
use App\Interfaces\Services\CartServiceInterface;

/**
 * カート管理のコントローラ
 */
class CartsController extends BaseController
{
    private CartServiceInterface $cartService;

    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * 一覧表示
     */
    public function index(): JsonResponse
    {
        $carts = $this->cartService->getAll();
        return $this->respondWithItem([
            'carts' => CartResource::collection($carts),
            'prices' => $this->cartService->getPrices(),
        ]);
    }

    /**
     * 追加
     */
    public function store(CreateRequest $request): JsonResponse
    {
        $cart = $this->cartService->create($request);
        return $this->respondWithItem(new CartResource($cart));
    }

    /**
     * 更新
     */
    public function update(UpdateRequest $request): JsonResponse
    {
        $cart = $this->cartService->update($request);
        return $this->respondWithItem(new CartResource($cart));
    }

    /**
     * 削除
     */
    public function delete(Request $request): JsonResponse
    {
        $this->cartService->delete($request);
        return $this->noContent();
    }
}
