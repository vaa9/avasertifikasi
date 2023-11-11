<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    // PrimaryKey
    protected $primaryKey = 'MotorcycleID';

    // Array Fillable
    protected $fillable = [
        'Image', 'Model', 'Year', 'Price', 'PassengerCount',
        'Manufacturer', 'FuelCapacity', 'LuggageSize'
    ];
}
