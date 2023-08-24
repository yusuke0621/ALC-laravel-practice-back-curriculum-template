<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartCollectionsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'amount' => $request,
        ];
    }
}
