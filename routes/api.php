<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::prefix('v1')->group(function() {
    Route::post('/register', [\App\Http\Controllers\Api\V1\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login']);
    Route::delete('/logout', [\App\Http\Controllers\Api\V1\AuthController::class, 'logout']);

    Route::prefix('products')->group(function() {
        Route::get('/', [\App\Http\Controllers\Api\V1\ProductsController::class, 'index']);
        Route::get('/{id}', [\App\Http\Controllers\Api\V1\ProductsController::class, 'show']);
    });

    Route::get('/tax_rates', [\App\Http\Controllers\Api\V1\TaxRatesController::class, 'index']);

    Route::post('/check', [\App\Http\Controllers\Api\V1\AuthController::class, 'check']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::prefix('carts')->group(function() {
            Route::get('/', [\App\Http\Controllers\Api\V1\CartsController::class, 'index']);
            Route::post('/', [\App\Http\Controllers\Api\V1\CartsController::class, 'store']);
            Route::patch('/{id}', [\App\Http\Controllers\Api\V1\CartsController::class, 'update']);
            Route::delete('/{id}', [\App\Http\Controllers\Api\V1\CartsController::class, 'delete']);
        });

        Route::prefix('orders')->group(function() {
            Route::get('/', [\App\Http\Controllers\Api\V1\OrdersController::class, 'index']);
            Route::post('/', [\App\Http\Controllers\Api\V1\OrdersController::class, 'create']);
        });
    });
});
