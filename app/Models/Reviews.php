<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    use HasFactory;
    protected $table = 'reviews';

    public function Users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
