<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    //memastikan yang dapat diakses adalah buku
    protected $guarded = ['id_buku'];

    //memastikan status_buku adalah boolean
    protected $casts = [
        'status_buku' => 'bool'
    ];
    //memastikan primarykey selalu id_buku
    protected $primaryKey = 'id_buku';

    // Define Relation
    public function peminjaman()
    {
        return $this->hasMany(peminjaman::class, "id_buku", "id_buku");
    }
}
