<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Define Fillable
    protected $fillable = [
        'Type', 'Image', 'Model', 'Year', 'PassengerCount',
        'Manufacturer', 'Price', 'FuelType', 'TrunkArea',
        'WheelCount', 'CargoAreaSize', 'LuggageSize', 'FuelCapacity'
    ];

    // Define Relation
    public function Order()
    {
        return $this->hasMany((Order::class));
    }
}
