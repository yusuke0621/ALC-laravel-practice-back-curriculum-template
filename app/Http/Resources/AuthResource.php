<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'nickname' => $this->nickname,
            'email' => $this->email,
            // 'token' => $this->createToken("login:user{$this->id}")->plainTextToken, // tokenは非推奨らしい
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
