<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsQueries extends Model
{
    use HasFactory;
    protected $table='contact_us_queries';
    protected $fillable = [
        'name',
        'email',
        'message'
    ];
}
