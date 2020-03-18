<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $appends = ['salon_name', 'user_name', 'pay_method', 'pay_status', 'reservation_status'];
    protected $fillable = [
        'user_id',
        'salon_id',
        'payment_method',
        'payment_status',
        'reservation_info',
        'client_info',
        'paid_part',
        'total_price',
        'card_info',
        'notes',
        'card_id',
        'date',
        'time',
        'payment_id',
        'status',
    ];

    public function salon()
    {
        return $this->hasOne(User::class, 'id', 'salon_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function getSalonNameAttribute()
    {
        $attribute = '';
        if ($this->salon()) {
            $attribute = $this->salon->salon_name;
        }
        return $attribute;
    }
    public function getUserNameAttribute()
    {
        $attribute = '';
        if ($this->user()) {
            $attribute = $this->user->name;
        }
        return $attribute;
    }

    public function getPayMethodAttribute()
    {
        $attribute = '';
        if ($this->payment_method == 1) {
            $attribute = '<span class="btn btn-success">Cash In Salon<span/>';
        } elseif ($this->payment_method == 2) {
            $attribute = '<span class="btn btn-success">credit card || ' . $this->total_price .'</span>';
        } elseif ($this->payment_method == 3) {
            $attribute = '<span class="btn btn-info"> Part of the amount || ' . $this->paid_part . ' SAR </span>';
        }
        return $attribute;
    }

    public function getPayStatusAttribute()
    {
        $attribute = '';
        if ($this->payment_method == 1) {
            $attribute = '<span class="btn btn-info">User Will pay In Salon</span>';
        } elseif ($this->payment_method == 2) {
            if ($this->payment_status == 0) {
                $attribute = '<span class="btn btn-warning">Pending </span>';
            } elseif ($this->payment_status == 1) {
                $attribute = '<span class="btn btn-success">Done Paid || ' . $this->total_price . 'SAR </span>';
            } elseif ($this->payment_status == 2) {
                $attribute = '<span class="btn btn-danger">Rejected</span>';
            }
        } elseif ($this->payment_method == 3) {
            if ($this->payment_status == 0) {
                $attribute = '<span class="btn btn-warning">Pending</span>';
            } elseif ($this->payment_status == 1) {
                $attribute = '<span class="btn btn-success"> Done Paid || ' . $this->paid_part . 'SAR </span>';
            } elseif ($this->payment_status == 2) {
                $attribute = '<span class="btn btn-danger">Rejected</span>';
            }
        }

        return $attribute;
    }

    public function getReservationStatusAttribute()
    {
        $attribute = '';
        if ($this->status == 0) {
            $attribute = '<span class="btn btn-warning">Waiting For Salon Review</span>';
        } elseif ($this->status == 1) {
            $attribute = '<span class="btn btn-success">Approved </span>';
        } elseif ($this->status == 2) {
            $attribute = '<span class="btn btn-danger">Rejected</span>';
        }
        return $attribute;
    }
}
