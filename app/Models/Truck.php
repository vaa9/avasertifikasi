<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $primaryKey = 'TruckID';

    protected $fillable = [
        'Image', 'Model', 'Year', 'Price', 'PassengerCount', 
        'Manufacturer', 'WheelCount', 'CargoAreaSize'
    ];
}

