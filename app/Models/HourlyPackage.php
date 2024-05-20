<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HourlyPackage extends Model
{
    use HasFactory;
    protected $table = 'hourly_packages';
    protected $fillable = [
        'package_name',
        'package_description',
        'car_id',
        'hourly_rate',
        'default_hours',
    ];


    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
