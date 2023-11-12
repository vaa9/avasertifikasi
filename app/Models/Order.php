<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'OrderID';

    protected $fillable = ['CustomerID', 'OrderDate', 'VehicleID', 'Quantity', 'TotalAmount'];
}
