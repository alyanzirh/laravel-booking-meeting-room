<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Booking;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'pax',
        'status',
    ];

    public function booking(){
        return $this->hasMany('App\Models\Booking');
    }

    public function getTotalBooking(){
        return $this->hasMany('App\Models\Booking')->count();
    }

}
