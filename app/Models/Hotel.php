<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    protected $table = 'hotels';

    protected $guarded = [];

    public function Rooms()
    {
        return $this->hasMany(Rooms::class, 'hotel_id');
    }

    public function Review(){
        return $this->hasMany(Reviews::class,'hotel_id');
    }
}
