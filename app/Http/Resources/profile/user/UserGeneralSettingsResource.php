<?php

namespace App\Http\Resources\profile\user;

use Illuminate\Http\Resources\Json\JsonResource;

class UserGeneralSettingsResource extends JsonResource
{
    public function toArray($request)
    {
        return[
          'id' =>$this->id,
          'name' =>$this->name,
          'date_of_birth' =>$this->date_of_birth,
          'city' =>$this->city,
          'first_phone' =>$this->first_phone,
          'email' =>$this->email,
          'user_image' =>$this->user_image,
          'main_image' =>$this->main_image,
          'main_name' =>$this->main_name,
        ];
    }
}
