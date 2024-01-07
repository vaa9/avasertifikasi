<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjaman;
use App\Models\peminjam;
use App\Models\buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        //menampilkan seluruh data yang ada di peminjaman tabel
        $peminjaman = peminjaman::all();

        // Render view 
        return view('peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        //menampilkan seluruh data yang ada di peminjaman tabel
        $peminjaman = peminjaman::all();

        // Render view
        return view('createpeminjaman', compact('peminjaman'));
    }

    public function store(Request $request)
{
  //mencari id buku yang sesuai dengan request
    $buku = buku::find($request->id_buku);
//memastikan status buku false karena berarti bisa dipinjam. jika true maka tidak bisa dipinjam
    if($buku->status_buku === false) {
        //mengupdate buku menjadi true agar tidak bisa dipinjam lagi
        $buku->update([
            'status_buku' => true
        ]);
//menginsert data kedalam tabel peminjaman
        Peminjaman::create([
            'id_peminjam' => $request->id_peminjam,
            'id_buku' => $request->id_buku,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian_buku' => $request->tanggal_pengembalian_buku,
            'status_peminjaman' => false,
        ]);
//redirect
        return redirect()->route('peminjaman.index')
            ->with('success', 'peminjaman created successfully');
    }
//tidak teriput apa apa jika buku sudah dipinjam
    return redirect()->route('peminjaman.index')
            ->with('failed', 'buku tidak tersedia');
}
     public function edit($id_peminjaman)
    {

         // mecari id peminjaman yang sesuai dengan req di dalam tabel peminjaman
         $peminjaman = peminjaman::findOrFail($id_peminjaman);
        //redirect
         return view('editpeminjaman', compact('peminjaman'));

     }
     public function update(Request $request, $id_peminjaman)
     {
         // mengambil data peminjaman berdasarkan id
         $peminjaman = peminjaman::findOrFail($id_peminjaman);
         //update
         //memastikan bahwa status peminjaman harus false yang artinya belum dikembalikan
         if($peminjaman->status_peminjaman === false){
            //jika benar maka akan diupdate menjadi true karena sudah dikembalikan
            $peminjaman->update([
                'status_peminjaman' => true,
                'tanggal_pengembalian_buku' => now()
            ]);
            //mencari row yang sesuai dengan id buku yang direquest
            $buku = Buku::find($peminjaman->id_buku);
            //mengupdate buku yang sudah dikembalikan menjadi tersedia
            $buku->update([
             'status_buku' => false
         ]);
         }
         //redirect ke page peminjaman
         return redirect()->route('peminjaman.index')
             ->with('success', 'peminjaman updated successfully');
     }
}


