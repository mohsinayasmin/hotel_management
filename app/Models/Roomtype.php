<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;
    protected $table="roomtypes";
    protected $fillable =[
        'title','detail'
    ];
    
    public function roomtypeimg(){
        return $this->hasMany(Roomtypeimage::class,'room_type_id','id');
    }
}
