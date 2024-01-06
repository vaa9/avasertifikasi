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
        $peminjaman = peminjaman::all();

        // Render view 
        return view('peminjaman', compact('peminjaman'));
    }

    public function create()
    {
        $peminjaman = peminjaman::all();

        // Render view
        return view('createpeminjaman', compact('peminjaman'));
    }

    public function store(Request $request)
{
    $buku = buku::find($request->id_buku);

    if($buku->status_buku === false) {
        $buku->update([
            'status_buku' => true
        ]);

        Peminjaman::create([
            'id_peminjam' => $request->id_peminjam,
            'id_buku' => $request->id_buku,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_pengembalian_buku' => $request->tanggal_pengembalian_buku,
            'status_peminjaman' => false,
        ]);

        return redirect()->route('peminjaman.index')
            ->with('success', 'peminjaman created successfully');
    }

    return redirect()->route('peminjaman.index')
            ->with('failed', 'buku tidak tersedia');
}
     public function edit($id_peminjaman)
    {
         // Get order by id
         $peminjaman = peminjaman::findOrFail($id_peminjaman);
        
         // Return redirect & show message
         // return view('editpeminjaman')->with([
         //     'hasilModel' => [],
         //     'peminjaman' => $peminjaman,
         //     'buku' =>[],
         //     'buku' => $buku,
         // ]);
         return view('editpeminjaman', compact('peminjaman'));

     }
     public function update(Request $request, $id_peminjaman)
     {
         // Get order by id
         $peminjaman = peminjaman::findOrFail($id_peminjaman);
         //update
         if($peminjaman->status_peminjaman === false){
            $peminjaman->update([
                'status_peminjaman' => true
            ]);
            $buku = Buku::find($peminjaman->id_buku);
            $buku->update([
             'status_buku' => false
         ]);
         }
         return redirect()->route('peminjaman.index')
             ->with('success', 'peminjaman updated successfully');
     }

    public function destroy($id_peminjaman)
    {
        // Get order by id 
        $peminjaman = peminjaman::findOrFail($id_peminjaman);

        // $peminjaman = peminjaman::findOrFail($id_peminjaman);
        //update
        
        

        // Return redirect & show message
        return redirect()->route('peminjaman.index')
            ->with('success', 'peminjaman updated successfully');
    }
}


