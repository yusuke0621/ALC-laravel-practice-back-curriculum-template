<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * APIのベースとなるコントローラー
 * すべてのAPI(V1)が継承する
 */
class BaseController extends Controller
{
    // ステータスコード
    protected $statusCode = 200;

    /**
     * ステータスコードを取得
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * ステータスコードを設定
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * コンテンツ無しのレスポンス
     */
    public function noContent()
    {
        return response()->json(null, 204);
    }

    /**
     * 単一の結果を返すレスポンス
     */
    public function respondWithItem($item, $message = 'success'): JsonResponse
    {
        return $this->respond($item, $message, []);
    }

    /**
     * 複数の結果を返すレスポンス
     * ページネーション前提
     * メタ情報 -> https://readouble.com/laravel/9.x/ja/pagination.html#paginator-instance-methods
     */
    public function respondWithItems($paginatedItems, $message = 'success'): JsonResponse
    {
        return $this->respond($paginatedItems->items(), $message, [
            'count' => $paginatedItems->count(),
            'currentPage' => $paginatedItems->currentPage(),
            'hasPages' => $paginatedItems->hasPages(),
            'lastPage' => $paginatedItems->lastPage(),
            'nextPageUrl' => $paginatedItems->nextPageUrl(),
            'perPage' => $paginatedItems->perPage(),
            'previousPageUrl' => $paginatedItems->previousPageUrl(),
            'total' => $paginatedItems->total(),
        ]);
    }

    /**
     * レスポンスの枠組みを統一
     */
    public function respond($data, $message = null, $meta = [], $statusCode = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'meta' => $meta,
        ], $statusCode);
    }
}
