<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name',
        'path',
        'salon_id',
    ];

}
