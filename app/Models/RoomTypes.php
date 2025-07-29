<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomTypes extends Model
{
    use SoftDeletes;
    protected $table = 'room_types';
    protected $guarded = [];

    public function Rooms()
    {
        return $this->hasMany(Rooms::class, 'room_type_id');
    }
}
