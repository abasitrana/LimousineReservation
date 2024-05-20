<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cars';
    protected $fillable = [
        'car_name',
        'car_registration_number',
        'car_description',
        'car_category_id',
        'car_base_fare',
        'max_capacity',
        'max_luggage'
    ];
    public function car_category()
    {
        return $this->belongsTo(CarCategories::class, 'car_category_id', 'id');
    }
    public function car_pictures()
    {
        return $this->hasMany(CarPicture::class);
    }
}
