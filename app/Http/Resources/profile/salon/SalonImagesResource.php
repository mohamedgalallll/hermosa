<?php

namespace App\Http\Resources\profile\salon;

use Illuminate\Http\Resources\Json\JsonResource;

class SalonImagesResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'name' =>$this->name,
            'path' =>$this->path,
        ];
    }
}
