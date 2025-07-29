<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    /** @use HasFactory<\Database\Factories\RoomsFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    public function RoomType(){
        return $this->belongsTo(RoomTypes::class, 'room_type_id');
    }

    public function Hotel(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}
