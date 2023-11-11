<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    // PrimaryKey
    protected $primaryKey = 'TruckID';

    // Array Fillable
    protected $fillable = [
        'Image', 'Model', 'Year', 'Price', 'PassengerCount',
        'Manufacturer', 'WheelCount', 'CargoAreaSize'
    ];
}
