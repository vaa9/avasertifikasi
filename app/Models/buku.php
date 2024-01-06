<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    
    protected $guarded = ['id_buku'];

    protected $casts = [
        'status_buku' => 'bool'
    ];

    protected $primaryKey = 'id_buku';

    // Define Relation
    public function peminjaman()
    {
        return $this->hasMany(peminjaman::class, "id_buku", "id_buku");
    }
}
