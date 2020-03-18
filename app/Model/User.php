<?php

namespace App\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $appends = ['admin_group_name', 'salon_main_image', 'short_salon_description','user_main_image','main_image','main_name','salon_review'];
    protected $fillable = [
        'name',
        'date_of_birth',
        'notes',
        'city',
        'email',
        'password',
        'user_image',
        'email_verified_at',
        'salon_payment_method_online_payment',
        'salon_payment_method_cash',
        'salon_payment_method_promotions',
        'salon_payment_method_promotion_value',

        'salon_appointments',

        'salon_name',
        'salon_description',
        'location_address',
        'location_long',
        'location_lat',
        'first_phone',
        'second_phone',
        'third_phone',
        'first_bank_account_name',
        'first_bank_account_number',
        'second_bank_account_name',
        'second_bank_account_number',
        'salon_image',
        'salon_license',

        'status',
        'is_activated',
        'active_hash',
        'admin_group',
        'user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public function messages()
//    {
//        return $this->hasMany(Message::class);
//    }
    public function group_id()
    {
        return $this->hasOne(AdminGroup::class, 'id', 'admin_group');
    }
    public function group()
    {
        return $this->hasOne(AdminGroup::class, 'id', 'admin_group');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'salon_id', 'id');
    }
    public function getSalonStatusAttribute()
    {
        $attribute = '';
        if ($this->status == 0) {
            $attribute = '<span class="btn btn-dark">معلق</span>';
        }elseif($this->status == 1){
            $attribute = '<span class="btn btn-success">تم قبول الحساب  </span>';
        } elseif ($this->status == 2) {
            $attribute = ' <span class="btn btn-danger">مرفوض</span> ';
        } elseif ($this->status == 3) {
            $attribute = '<span class="btn btn-warning">Panned</span>';
        }
        return $attribute;
    }

    public function getAdminGroupNameAttribute()
    {
        $attribute = '';
        if ($this->admin_group) {
            if ($this->group()) {
                if (session('lang') == 'en') {
                    $attribute = $this->group->name_en;
                } elseif (session('lang') == 'ar') {
                    $attribute = $this->group->name_ar;
                }
            }
        }
        return $attribute;
    }
    public function getMainImageAttribute()
    {
        $attribute = '';
        if ($this->user_type_id == 1){
            if ($this->salon_image != null || !empty($this->salon_image)) {
                $attribute = url('storage') . $this->salon_image;
            } else {
                $attribute = Settings::first()->main_logo;
            }
        }else{
            if ($this->user_image != null || !empty($this->user_image)) {
                $attribute = url('storage') . $this->user_image;
            } else {
                $attribute = Settings::first()->main_logo;
            }
        }

        return $attribute;
    }

    public function getMainNameAttribute()
    {
        $attribute = '';
        if ($this->user_type_id == 1){
            if ($this->salon_name) {
                $attribute = $this->salon_name;
            }
        }else{
            if ($this->name) {
                $attribute = $this->name;
            }
        }

        return $attribute;
    }
    public function getUserMainImageAttribute()
    {
        $attribute = '';
        if ($this->user_image != null || !empty($this->user_image)) {
            $attribute = url('storage') . $this->user_image;
        } else {
            $attribute = Settings::first()->main_logo;
        }
        return $attribute;
    }

    public function getSalonMainImageAttribute()
    {
        $attribute = '';
        if ($this->salon_image != null || !empty($this->salon_image)) {
            $attribute = url('storage') . $this->salon_image;
        } else {
            $attribute = Settings::first()->main_logo;
        }
        return $attribute;
    }

    public function getShortSalonDescriptionAttribute()
    {
        $attribute = Str::words($this->salon_description, 4, '...');
        return $attribute;
    }

    public function salon_reviews(){
        return $this->hasMany(SalonReview::class, 'salon_id', 'id');
    }
    public function getSalonReviewAttribute(){
        $attribute = '<i class="fa fa-star"></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>';
        $rate = $this->salon_reviews()->avg('reviews_rate');
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
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
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
                        <i class="fa fa-star"></i>';
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

}
