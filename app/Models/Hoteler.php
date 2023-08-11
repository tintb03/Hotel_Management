<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hoteler extends Model
{
    protected $fillable = [
        'name_hoteler', 'name_hotel', 'address', 'email', 'phone_number'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

