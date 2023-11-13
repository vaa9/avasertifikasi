<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    // Define Fillable
    protected $fillable = ['Name', 'Address', 'PhoneNumber', 'IDCard'];

    // Define Relation
    public function Order()
    {
        return $this->hasMany((Order::class));
    }
}
