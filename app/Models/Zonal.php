<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Zonal extends Model
{
    use HasFactory;

    protected $fillable = ['route_type', 'zone', 'state_code', 'city_id', 'country_id', 'postal'];

    public function fare()
    {
        return $this->hasOne(Fare::class);
    }
}
