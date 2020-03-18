<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class  Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'user_id',
        'salon_id',
        'service_id',
        'team_id',
        'price',
        'status',
    ];

    public function salon()
    {
        return $this->hasOne(User::class, 'id', 'salon_id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }

}
