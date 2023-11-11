<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // PrimaryKey
    protected $primaryKey = 'OrderID';

    // Array Fillable
    protected $fillable = ['CustomerID', 'OrderDate', 'VehicleID', 'Quantity', 'TotalAmount'];
}
