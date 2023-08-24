<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Interfaces\Services\StoreServiceInterface;

/**
 * 販売店のコントローラ
 * ※ 現時点では未使用
 */
class StoresController extends BaseController
{
    private StoreServiceInterface $storeService;

    public function __construct(StoreServiceInterface $storeService)
    {
        $this->storeService = $storeService;
    }

    public function index(): JsonResponse
    {
        return $this->respondWithItems($this->storeService->getAll());
    }
}
