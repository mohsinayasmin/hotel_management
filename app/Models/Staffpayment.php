<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffpayment extends Model
{
    use HasFactory;
    protected $table="staffpayments";
    protected $fillable =[
        'staff_id','amount','date',
    ];
    public function staff(){
        return $this->belongsTo(Staff::class,'staff_id','id');
    }
}
