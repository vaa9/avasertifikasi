<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    
    protected $guarded = ['id_peminjaman'];

    // Define Fillable
    
    protected $primaryKey = 'id_peminjaman';

    protected $casts = [
         'status_peminjaman' => 'bool'
     ];
    // Define Relation
    public function buku()
    {
        return $this->belongsTo(buku::class, "id_buku", "id_buku");
    }

    // Define Relation
    public function peminjam()
    {
        return $this->belongsTo(peminjam::class, "id_peminjam", "id_peminjam");
    }
}
 