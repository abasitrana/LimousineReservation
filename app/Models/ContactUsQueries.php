<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsQueries extends Model
{
    use HasFactory;
    private $table='contact_us_queries';
    private $fillable = [
        'name',
        'email',
        'message'
    ];
}
