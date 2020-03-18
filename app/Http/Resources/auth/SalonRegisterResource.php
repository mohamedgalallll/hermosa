<?php

namespace App\Http\Resources\auth;

use Illuminate\Http\Resources\Json\JsonResource;

class SalonRegisterResource extends JsonResource
{
    public function toArray($request)
    {
        return[
          'id' =>$this->id,
          'name' =>$this->name,
          'location_address' =>$this->location_address,
          'email' =>$this->email,
          'first_phone' =>$this->first_phone,
        ];
    }
}
