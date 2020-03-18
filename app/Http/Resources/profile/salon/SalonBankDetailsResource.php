<?php

namespace App\Http\Resources\profile\salon;

use Illuminate\Http\Resources\Json\JsonResource;

class SalonBankDetailsResource extends JsonResource
{
    public function toArray($request)
    {
        return[
          'first_bank_account_name' =>$this->first_bank_account_name,
          'first_bank_account_number' =>$this->first_bank_account_number,
          'second_bank_account_name' =>$this->second_bank_account_name,
          'second_bank_account_number' =>$this->second_bank_account_number,
        ];
    }
}
