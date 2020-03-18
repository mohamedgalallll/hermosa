<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = [
        'nickname',
        'name',
        'email',
        'avatar',
        'avatar_original',
        'profileUrl',
        'social_media_id',
        'social_media_type',
        'user_id',
    ];
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
