<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    // PrimaryKey
    protected $primaryKey = 'VehicleID';

    // Array Fillable
    protected $fillable = [
        'Type', 'Image', 'Model', 'Year', 'PassengerCount', 
        'Manufacturer', 'Price', 'FuelType', 'TrunkArea', 
        'WheelCount', 'CargoAreaSize', 'LuggageSize', 'FuelCapacity'
    ];
}