<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $primaryKey = 'MotorcycleID';

    protected $fillable = [
        'Image', 'Model', 'Year', 'Price', 'PassengerCount', 
        'Manufacturer', 'FuelCapacity', 'LuggageSize'
    ];
}