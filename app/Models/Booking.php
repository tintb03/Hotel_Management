<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManageRoom;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderer', // Add other fields here as well
        'phone_number',
        'email',
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo(ManageRoom::class, 'room_id');
    }

        public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

}
