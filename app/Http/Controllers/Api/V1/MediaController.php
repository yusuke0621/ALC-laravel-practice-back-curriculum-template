<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Interfaces\Services\MediumServiceInterface;

/**
 * 画像等、メディア関連のコントローラ
 * ※ 現時点では未使用
 */
class MediaController extends BaseController
{
    private MediumServiceInterface $mediumService;

    public function __construct(MediumServiceInterface $mediumService)
    {
        $this->mediumService = $mediumService;
    }

    public function index(): JsonResponse
    {
        return $this->respondWithItems($this->mediumService->getAll());
    }
}
