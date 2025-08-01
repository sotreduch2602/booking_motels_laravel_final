<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = [
        'hotel_id',
        'room_number',
        'room_type_id',
        'price_per_night',
        'max_people',
        'description',
        'available',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }
}
