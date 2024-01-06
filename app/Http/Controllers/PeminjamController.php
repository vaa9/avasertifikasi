<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjam;

class PeminjamController extends Controller
{
    public function index()
    {
        //memanggil seluruh tabel peminjam
        $peminjam = peminjam::all();

        // Render view 
        return view('peminjam', compact('peminjam'));
    }

    public function create()
    {
        //memanggil seluruh tabel peminjam
        $peminjam = peminjam::all();

        // Render view
        return view('createpeminjam', compact('peminjam'));
    }

    public function store(Request $request)
    {
        // Create peminjam
        $peminjam = peminjam::create([
            'nama_peminjam' => $request->nama_peminjam,
            'telpon_peminjam' => $request->telpon_peminjam
        ]);

        // Return redirect 
        return redirect()->route('peminjam.index')
            ->with('success', 'Peminjam created successfully');
    }
    public function destroy($id_peminjam)
    {
        // mengambil data peminjam berdasarkan id
        $peminjam = peminjam::findOrFail($id_peminjam);

        // Delete order
        $peminjam->delete();

        // Return redirect & show message
        return redirect()->route('peminjam.index')
            ->with('success', 'Peminjam deleted successfully');
    }

}

