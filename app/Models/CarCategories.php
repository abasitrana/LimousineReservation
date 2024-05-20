<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarCategories extends Model
{
    use HasFactory;
    protected $table = 'cars_categories';
    protected $fillable = [
      'category_name',
      'category_image'
    ];
}
