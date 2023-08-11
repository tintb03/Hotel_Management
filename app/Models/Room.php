<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'hoteler_id', 'room_code', 'room_number', 'kind_of_room', 'floor', 'detailed_address', 'description', 'image', 'price'
    ];

    public function hoteler()
    {
        return $this->belongsTo(Hoteler::class, 'hoteler_id');
    }
}

