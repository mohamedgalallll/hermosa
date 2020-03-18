<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class HomeBackground extends Model
{
    protected $table = 'home_background';
    protected $fillable = [
        'img_ar',
        'img_en',
        'text_ar',
        'text_en',
    ];

    public function getImageAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            if (!empty($this->img_en)){
                $attribute =url('storage' .$this->img_en) ;
            }else{
                $attribute = url("design/admin/img/bg.jpg");
            }

        }elseif (session('lang' ) == 'ar'){
            if (!empty($this->img_ar)){
                $attribute =url('storage' .$this->img_ar) ;
            }else{
                $attribute = url("design/admin/img/bg.jpg");
            }
        }
        return $attribute;
    }

    public function getTextAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->text_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->text_ar;
        }
        return $attribute;
    }
}
