<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'hoteler_id',
        'name_type',
        // ... Các trường khác
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function hoteler()
    {
        return $this->belongsTo(Hoteler::class);
    }
}
