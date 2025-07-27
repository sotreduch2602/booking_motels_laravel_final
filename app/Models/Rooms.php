<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    /** @use HasFactory<\Database\Factories\RoomsFactory> */
    use HasFactory;

    protected $table = 'rooms';

    public function RoomType(){
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }

    public function Hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
