<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hoteler extends Model
{
    protected $fillable = [
        'name_hoteler', 'address', 'email', 'phone_number'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

