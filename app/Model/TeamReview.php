<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeamReview extends Model
{



    protected $appends = ['name','image','salon_name','team_name','user_name','team_rate'];
    protected $fillable = [
        'reviews_rate',
        'reviews_text',
        'status',
        'user_id',
        'salon_id',
        'team_id',
    ];

    public function salon_data(){
        return $this->belongsTo(User::class, 'salon_id', 'id');
    }
    public function team_data(){
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
    public function user_data(){
        return $this->hasOne(User::class,'id','salon_id');
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




    public function getTeamNameAttribute(){
        $attribute='---';
        if ($this->team_data()){
                $attribute = $this->team_data->name;
        }
        return $attribute;
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
        if ($this->user_data()){
            $attribute = $this->user_data->name;
        }
        return $attribute;
    }

    public function getTeamRateAttribute(){
        $attribute = '<i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>';
        if ($this->reviews_rate == 1){
            $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>';
        } elseif ($this->reviews_rate == 2) {
            $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>';
        } elseif ($this->reviews_rate == 3) {
            $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>';
        } elseif ($this->reviews_rate == 4) {
            $attribute = '<i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star-o"></i>';
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
