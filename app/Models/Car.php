<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // PrimaryKey
    protected $primaryKey = 'CarID';

    // Array Fillable
    protected $fillable = [
        'Image', 'Model', 'Year', 'Price', 'PassengerCount', 
        'Manufacturer', 'FuelType', 'LuggageSize'
    ];
}
