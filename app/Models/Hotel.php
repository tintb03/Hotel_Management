<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hoteler_id',
        'Name_Hotel',
        'detailed_address',
        'Number_of_rooms',
        'Number_of_floors',
        // ... Các cột khác
    ];

    public function hoteler()
    {
        return $this->belongsTo(Hoteler::class, 'hoteler_id');
    }
}
