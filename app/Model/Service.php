<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class Service extends Model
{
    protected $appends = ['name','description','salon_title','name_service_list', 'main_image'];
    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'image',
        'time',
        'price',
        'status',
        'salon_id',
        'service_list_id',
    ];

    public function getNameAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->name_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->name_ar;
        }
        return $attribute;
    }
    public function getDescriptionAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->description_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->description_ar;
        }
        return $attribute;
    }


    public function data_salon(){
        return $this->hasOne(User::class,'id','salon_id');
    }

    public function getSalonTitleAttribute(){
        $attribute='';
        if ($this->data_salon()){
            $attribute = $this->data_salon->salon_name;
        }
        return $attribute;
    }
    public function serviceList(){
        return $this->hasOne(ServiceList::class,'id','service_list_id');
    }

    public function getNameServiceListAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->serviceList->name_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->serviceList->name_ar;
        }
        return $attribute;
    }
    public function getMainImageAttribute()
    {
        $attribute = '';
        if ($this->image != null || !empty($this->image)) {
            $attribute = url('storage') . $this->image;
        } else {
            $attribute = Settings::first()->main_logo;
        }
        return $attribute;
    }

}
