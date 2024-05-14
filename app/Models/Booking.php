<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "bookings";
    protected $fillable = [
        'customer_id', 'room_id', 'checkin_date', 'checkout_date', 'total_adult', 'total_clildren'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id','id' );
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id','id');
    }
}
