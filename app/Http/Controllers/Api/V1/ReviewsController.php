<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Interfaces\Services\ReviewServiceInterface;

/**
 * レビュー関連コントローラ
 */
class ReviewsController extends BaseController
{
    private ReviewServiceInterface $reviewService;

    public function __construct(ReviewServiceInterface $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * レビュー一覧
     */
    public function index(): JsonResponse
    {
        return $this->respondWithItem([]);
    }

    /**
     * レビュー投稿
     */
    public function store(): JsonResponse
    {
        return $this->respondWithItem([]);
    }
}
