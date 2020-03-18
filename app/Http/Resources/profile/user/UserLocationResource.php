<?php

namespace App\Http\Resources\profile\user;

use Illuminate\Http\Resources\Json\JsonResource;

class UserLocationResource extends JsonResource
{
    public function toArray($request)
    {
        return[
          'location_address' =>$this->location_address,
          'location_lat' =>$this->location_lat,
          'location_long' =>$this->location_long,
        ];
    }
}
