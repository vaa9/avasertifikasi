<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    
    //memastikan yang keluar di query selalu id_admin
    protected $guarded = ['id_admin'];
    //memastikan primarykey selalu id_admin
    protected $primaryKey = 'id_admin';
    // Define Fillable
    protected $fillable = ['nama_admin', 'pass_admin', 'lupapass_admin'];

    // Define Relation
    public function peminjaman()
    {
        return $this->hasMany((peminjaman::class));
    }
}
