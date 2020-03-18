<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $appends = ['name','job_title','excerpt','salon_title','review', 'main_image'];
    protected $fillable = [
        'name_ar',
        'name_en',
        'job_title_ar',
        'job_title_en',
        'image',
        'excerpt_ar',
        'excerpt_en',
        'salon_id',
        'service_id',
        'service_list_id',
        'status',
        'status_team'
    ];


    public function getStatusTeamsAttribute()
    {
        $attribute = '';
        if ($this->status_team == 0) {
            $attribute = '<span class="btn btn-danger">Unavailable</span>';
        } elseif ($this->status_team == 1) {
            $attribute = '<span class="btn btn-success">Available</span>';
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
    public function getJobTitleAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->job_title_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->job_title_ar;
        }
        return $attribute;
    }
    public function getExcerptAttribute(){
        $attribute='';
        if (session('lang' ) == 'en'){
            $attribute=$this->excerpt_en;
        }elseif (session('lang' ) == 'ar'){
            $attribute=$this->excerpt_ar;
        }
        return $attribute;
    }

    public function salon_data(){
        return $this->hasOne(User::class,'id','salon_id');
    }

    public function getSalonTitleAttribute(){
        $attribute='';
        if ($this->salon_data()){
            $attribute = $this->salon_data->salon_name;
        }
        return $attribute;
    }

    public function team_reviews(){
        return $this->hasMany(TeamReview::class, 'team_id', 'id');
    }

    public function getReviewAttribute(){
        $attribute = '<i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>';
        $rate = $this->team_reviews()->avg('reviews_rate');
        if ($rate){
            if ($rate <= 1){
                $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
            } elseif ($rate <= 2) {
                $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>';
            } elseif ($rate <= 3) {
                $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
            } elseif ($rate <= 4) {
                $attribute = '<i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star color-star color-star"></i>
                        <i class="fa fa-star-o"></i>';
            } else ($rate <= 5) {
            $attribute = '<i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>
                        <i class="fa fa-star color-star"></i>'
        };
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
