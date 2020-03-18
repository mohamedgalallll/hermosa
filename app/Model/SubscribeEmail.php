<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SubscribeEmail extends Model
{
    protected $appends=['user_name'];
    protected $fillable = [
        'user_id',
        'email',
        'status',
    ];
    public function User(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function getUserNameAttribute(){
        $attribute='----';
            if ($this->User() && !empty($this->user_id)){
                $attribute = $this->User->name;
            }
        return $attribute;
    }
}
