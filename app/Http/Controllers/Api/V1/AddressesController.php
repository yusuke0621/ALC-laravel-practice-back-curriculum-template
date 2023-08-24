<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Interfaces\Services\AddressServiceInterface;

/**
 * 住所管理コントローラ
 * ※ 現時点では未使用
 */
class AddressesController extends BaseController
{
    private AddressServiceInterface $addressService;

    public function __construct(AddressServiceInterface $addressService)
    {
        $this->addressService = $addressService;
    }

    public function index(): JsonResponse
    {
        return $this->respondWithItems($this->addressService->getAll());
    }
}
