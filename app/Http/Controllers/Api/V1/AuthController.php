<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \Symfony\Component\HttpFoundation\Response;

/**
 * 認証関連のコントローラ
 */
class AuthController extends BaseController
{

    /**
     * 新規登録
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->respond(null, $validator->messages(), null, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 登録と同時にログインも行う
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
        }

        return $this->respondWithItem(new AuthResource($user));
    }

    /**
     * ログイン
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // login
        if (Auth::attempt($credentials, true)) {
            $user = User::whereEmail($request->email)->first();
            $user->tokens()->delete();
            return $this->respondWithItem(new AuthResource($user));
        }

        return $this->respond(null, 'login failed', Response::HTTP_FORBIDDEN);
    }

    /**
     * ログアウト
     */
    public function logout(Request $request): JsonResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $this->noContent();
    }

    /**
     * ログイン状態の確認
     */
    public function check(Request $request): JsonResponse
    {
        $user = $request->user('sanctum');
        if ($user) {
            return $this->respondWithItem(new AuthResource($user));
        }

        return $this->respondWithItem(null, 'no login', Response::HTTP_FORBIDDEN);
    }
}
