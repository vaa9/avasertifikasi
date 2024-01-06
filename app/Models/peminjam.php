<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    use HasFactory;
    
    protected $guarded = ['id_peminjam'];

    // Define Fillable
    protected $fillable = ['nama_peminjam', 'telpon_peminjam'];
    protected $primaryKey = 'id_peminjam';
    // Define Relation
    public function peminjaman()
    {
        return $this->hasMany(peminjaman::class, "id_peminjam", "id_peminjam");
    }
}
