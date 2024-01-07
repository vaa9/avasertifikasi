<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class BookController extends Controller
{
    public function index()
    {
        //memanggil semua isi dari tabel buku
        $buku = buku::all();

        // Render view 
        return view('buku', compact('buku'));
    }
    public function create()
    {
        //memanggil semua isi dari tabel buku
        $buku = buku::all();

        // Render view dan mengarahkan ke createbook
        return view('createbook', compact('buku'));
    }

    public function store(Request $request)
    {
        
        //memasukkan data kedalam tabel buku
        $buku = buku::create([
            'nama_buku' => $request->nama_buku,
            'penulis_buku' => $request->penulis_buku,
            'sinopsis_buku' => $request->sinopsis_buku,
            'foto_buku' => $request->cover,
            'status_buku' => false,
        ]);
        

        // Return redirect & beri pesan tanda
        return redirect()->route('buku.index')
            ->with('success', 'Book created successfully');
    }
    public function destroy($id_buku)
    {
        // mengambil data buku berdasarkan id
        $buku = buku::findOrFail($id_buku);

        // Delete 
        $buku->delete();

        // Return redirect & show message
        return redirect()->route('buku.index')
            ->with('success', 'buku deleted successfully');
    }
}


