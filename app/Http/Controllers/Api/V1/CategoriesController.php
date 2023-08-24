<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

use App\Interfaces\Services\CategoryServiceInterface;

/**
 * カテゴリー関連のコントローラ
 * ※ 現時点では未使用
 */
class CategoriesController extends BaseController
{
    private CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        return $this->respondWithItems($this->categoryService->getAll());
    }
}
