<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    protected $appends = ['name','image','sub_cat_name','main_cat_name'];
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
        'main_category_id',
        'sub_category_id'
    ];

    public function parent(){
         return $this->hasOne(SubCategory::class,'id','sub_category_id');
    }
    public function parentOfParent(){
        return $this->hasOne(MainCategory::class,'id','main_category_id');
    }


    public function getMainCatNameAttribute(){

        $attribute='';
        if ($this->parentOfParent()){
            $attribute = $this->parentOfParent->name;
        }
        return $attribute;
    }


    public function getSubCatNameAttribute(){

        $attribute='';
        if ($this->parent()){
            $attribute = $this->parent->name;
        }
        return $attribute;
    }

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
    public function getCategoryProductCountAttribute(){
//        $attribute= Products::where('sup_sup_category_id',$this->id)->count();
//        return $attribute;
    }
}
