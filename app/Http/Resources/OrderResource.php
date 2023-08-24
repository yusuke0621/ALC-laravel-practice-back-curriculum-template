<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'total_price' => $this->total_price,
            'payment_type' => $this->payment_type,
            'order_products' => OrderProductResource::collection($this->orderProducts),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
