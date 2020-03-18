<?php

namespace App\Http\Resources\auth;

use Illuminate\Http\Resources\Json\JsonResource;

class UserRegisterResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' =>$this->id,
            'name' =>$this->name,
            'city' =>$this->city,
            'notes' =>$this->notes,
            'email' =>$this->email,
            'first_phone' =>$this->first_phone,
        ];
    }
}
