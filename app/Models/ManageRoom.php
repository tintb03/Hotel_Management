<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeRoom;


class ManageRoom extends Model
{
    use HasFactory;

    protected $table = 'manage_rooms'; // Thay đổi tên bảng nếu cần

    protected $fillable = [
        'room_code',
        'room_number',
        'floor',
        'description',
        'image',
        'price',
        'hotel_id',
        'type_id', // Đảm bảo đã thêm 'type_id' vào fillable
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

        public function type()
    {
        return $this->belongsTo(TypeRoom::class, 'type_id');
    }

}
