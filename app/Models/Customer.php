<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // PrimaryKey
    protected $primaryKey = 'CustomerID';

    // Array Fillable
    protected $fillable = ['Name', 'Address', 'PhoneNumber', 'IDCard'];
}
