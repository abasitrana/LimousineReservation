<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HourlySlap extends Model
{
    use HasFactory;

    protected $table = "hourly_slaps";

    protected $fillable =  ["hourly_package_id","car_id","hourly_slap","extra_hourly_price"];

}
