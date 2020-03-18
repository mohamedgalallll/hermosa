<?php

namespace App\Http\Resources\profile\salon;

use Illuminate\Http\Resources\Json\JsonResource;

class SalonGeneralSettingsResource extends JsonResource
{
    public function toArray($request)
    {
        return[
          'id' =>$this->id,
          'salon_name' =>$this->salon_name,
          'name' =>$this->name,
          'email' =>$this->email,
          'first_phone' =>$this->first_phone,
          'second_phone' =>$this->second_phone,
          'third_phone' =>$this->third_phone,
          'salon_image' =>$this->salon_image,
          'salon_license' =>$this->salon_license,
          'salon_payment_method_online_payment' =>$this->salon_payment_method_online_payment,
          'salon_payment_method_promotions' =>$this->salon_payment_method_promotions,
          'salon_payment_method_cash' =>$this->salon_payment_method_cash,
        ];
    }
}
