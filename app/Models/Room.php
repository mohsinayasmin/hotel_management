<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table="rooms";
    protected $fillable =[
        'title','room_type_id','price'
    ];

    public function room_type(){
        return $this->belongsTo(Roomtype::class,'room_type_id','id');
    }
}
