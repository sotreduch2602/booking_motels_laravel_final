<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // If your table is not 'bookings', specify it:
    // protected $table = 'booking';

    protected $fillable = [
        'room_id',
        'user_id',
        'check_in_date',
        'check_out_date',
        'total_price',
        'status',
        'payment_status',
        'checked_out',
        // add other fields as needed
    ];

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'room_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
