<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => $this->product,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'tax_rate' => $this->taxRate,
        ];
    }
}
