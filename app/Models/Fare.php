<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fare extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'zone_from', 'zone_to', 'fare'];


    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }

    public function  from()
    {
        return $this->belongsTo(Zonal::class, 'zone_from', 'id');
    }
    public function  to()
    {
        return $this->belongsTo(Zonal::class, 'zone_to', 'id');
    }
}
