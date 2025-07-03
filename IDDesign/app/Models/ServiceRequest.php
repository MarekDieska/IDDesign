<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'tepelne_cerpadlo',
        'klimatizacia',
        'fotovoltika',
        'servis',
        'nabijacia_stanica',
        'ine',
        'message',
    ];
}
