<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ShowSalon extends Model
{
    protected $table = 'show_salon';
    protected $fillable = [
        'title_ar',
        'title_en',
        'body_ar',
        'body_en',
        'status',
    ];

    public function getTitleAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->title_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->title_ar;
        }
        return $attribute;
    }

    public function getBodyAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->body_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->body_ar;
        }
        return $attribute;
    }
}
