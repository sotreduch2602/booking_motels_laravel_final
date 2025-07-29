<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    protected $table = 'room_types';
    protected $guarded = [];

    public function Rooms()
    {
        return $this->hasMany(Rooms::class, 'room_type_id');
    }
}
