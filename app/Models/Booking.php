<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'car_id',
        'fare_id',
        'hourly_package_id',
        'route_type',
        'start_address',
        'end_address',
        'start_address_zipcode',
        'end_address_zipcode',
        'start_address_lat',
        'start_address_lng',
        'end_address_lat',
        'end_address_lng',
        'total_price',
        'session_id',
        'luggage_count',
        'person_count',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cars()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
    public function hourly_package()
    {
        return $this->belongsTo(HourlyPackage::class, 'hourly_package_id', 'id');
    }
}
