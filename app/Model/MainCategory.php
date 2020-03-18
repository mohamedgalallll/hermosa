<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $appends = ['name','image','sub_cat_count'];
    protected $fillable = [
        'name_ar',
        'name_en',
        'image_ar',
        'image_en',
        'icon',
        'description_ar',
        'description_en',
        'keyword_ar',
        'keyword_en',
        'order',
        'status',

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
    public function getImageAttribute(){
        $attribute='';
        if($this->image_en != null || !empty($this->image_en) || $this->image_ar != null || !empty($this->image_ar)){
            if (session('lang' ) == 'en'){
                $attribute=url('storage') . $this->image_en;
            }elseif (session('lang' ) == 'ar'){
                $attribute=url('storage') . $this->image_ar;
            }
        }else{
            $attribute=Settings::first()->main_logo;
        }
        return $attribute;
    }

    public function getSubCatCountAttribute(){
        $attribute= SubCategory::where('main_category_id',$this->id)->count();

        return $attribute;
    }

}
