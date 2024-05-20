<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPicture extends Model
{
  use HasFactory;
  protected $table = 'cars_pictures';
  protected $fillable = [
    'car_id',
    'car_picture_path'
  ];
}
