<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Http\Resources\TaxRateResource;
use App\Interfaces\Services\TaxRateServiceInterface;

/**
 * 消費税のコントローラ
 */
class TaxRatesController extends BaseController
{
    private TaxRateServiceInterface $taxRateService;

    public function __construct(TaxRateServiceInterface $taxRateService)
    {
        $this->taxRateService = $taxRateService;
    }

    /**
     * 消費税一覧
     */
    public function index(): JsonResponse
    {
        return $this->respondWithItem(TaxRateResource::collection($this->taxRateService->getAll()));
    }
}
