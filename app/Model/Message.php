<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message',
        'sender_id',
        'receiver_id',

    ];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recive(){
        $this->belongsTo(User::class,'receiver_id');
    }
}
