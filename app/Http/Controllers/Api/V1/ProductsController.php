<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Http\Resources\ProductResource;
use App\Interfaces\Services\ProductServiceInterface;

/**
 * 商品情報コントローラ
 */
class ProductsController extends BaseController
{
    private ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * 商品一覧
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->getAll();
        return $this->respondWithItems(ProductResource::collection($products));
    }

    /**
     * 商品詳細
     */
    public function show($id): JsonResponse
    {
        $product = $this->productService->find($id);
        return $this->respondWithItem(new ProductResource($product));
    }
}
