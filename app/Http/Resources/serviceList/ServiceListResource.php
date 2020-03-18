<?php

namespace App\Http\Resources\serviceList;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceListResource extends JsonResource
{
    public function toArray($request)
    {
        return[
          'id' =>$this->id,
          'name_ar' =>$this->name_ar,
          'name_en' =>$this->name_en,
          'image_ar' =>$this->image_ar,
          'image_en' =>$this->image_en,
          'description_en' =>$this->description_en,
          'description_ar' =>$this->description_ar,
          'keyword_ar' =>$this->keyword_ar,
          'keyword_en' =>$this->keyword_en,
        ];
    }
}
