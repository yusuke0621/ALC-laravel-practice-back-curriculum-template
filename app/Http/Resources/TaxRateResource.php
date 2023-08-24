<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxRateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rate' => $this->rate,
            'remarks' => $this->remarks,
        ];
    }
}
