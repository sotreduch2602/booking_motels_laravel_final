<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    public function Rooms()
    {
        return $this->hasMany(Rooms::class, 'hotel_id');
    }

    public function Review(){
        return $this->hasMany(Reviews::class,'hotel_id');
    }
}
