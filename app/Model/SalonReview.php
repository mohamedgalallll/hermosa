<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SalonReview extends Model
{
    protected $appends = ['salon_name','user_name','salon_rate','user_rate_image','email_user'];
    protected $fillable = [
        'name',
        'email',
        'reviews_rate',
        'reviews_text',
        'status',
        'user_id',
        'salon_id',
    ];

    public function salon_data(){
        return $this->hasOne(User::class,'id','salon_id');
    }
    public function user_data(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getSalonNameAttribute(){
        $attribute='';
        if ($this->salon_data()){
            $attribute = $this->salon_data->salon_name;
        }
        return $attribute;
    }
    public function getUserNameAttribute(){
        $attribute='';
        if (empty($this->user_id)){
            $attribute = $this->name;
        }else{
            if ($this->user_data()){
                $attribute = $this->user_data->name;
            }
        }
        return $attribute;
    }
    public function getEmailUserAttribute(){
        $attribute='';
        if (empty($this->user_id)){
            $attribute = $this->email;
        }else{
            if ($this->user_data()){
                $attribute = $this->user_data->email;
            }
        }
        return $attribute;
    }
    public function getUserRateImageAttribute()
    {
        $attribute = '';
        if ($this->user_image != null || !empty($this->user_image)) {
            $attribute = url('storage') . $this->user_image;
        } else {
            $attribute = Settings::first()->main_logo;
        }
        return $attribute;
    }
    public function getSalonRateAttribute(){

        $attribute = '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>';

        if ($this->reviews_rate == 1){
            $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
        } elseif ($this->reviews_rate == 2) {
            $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
        } elseif ($this->reviews_rate == 3) {
            $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
        } elseif ($this->reviews_rate == 4) {
            $attribute = '<i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star"></i>';
        } else ($this->reviews_rate == 5) {
        $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>'
        };
        return $attribute;
    }



}
