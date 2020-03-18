<?php

namespace App\Http\Resources\profile\salon;

use Illuminate\Http\Resources\Json\JsonResource;

class SalonServiceTeamResource extends JsonResource
{
    public function toArray($request)
    {
        return[
          'id' =>$this->id,
          'name_ar' =>$this->name_ar,
          'name_en' =>$this->name_en,
          'job_title_ar' =>$this->job_title_ar,
          'job_title_en' =>$this->job_title_en,
          'image' =>$this->image,
          'excerpt_ar' =>$this->excerpt_ar,
          'excerpt_en' =>$this->excerpt_en,
          'salon_id' =>$this->salon_id,
          'service_id' =>$this->service_id,
          'status' =>$this->status,
          'service_list_id' =>$this->service_list_id,
        ];
    }
}
