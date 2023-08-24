<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'postal_code' => $this->postal_code,
            'prefecture' => $this->prefecture,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
            'building' => $this->building,
            'room_number' => $this->room_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
