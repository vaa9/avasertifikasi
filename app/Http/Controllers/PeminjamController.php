<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peminjam;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjam = peminjam::all();

        // Render view 
        return view('peminjam', compact('peminjam'));
    }

    public function create()
    {
        $peminjam = peminjam::all();

        // Render view
        return view('createpeminjam', compact('peminjam'));
    }

    public function store(Request $request)
    {
        // Create customer
        $peminjam = peminjam::create([
            'nama_peminjam' => $request->nama_peminjam,
            'telpon_peminjam' => $request->telpon_peminjam
        ]);

        // Return redirect & show message
        return redirect()->route('peminjam.index')
            ->with('success', 'Peminjam created successfully');
    }
    public function destroy($id_peminjam)
    {
        // Get order by id 
        $peminjam = peminjam::findOrFail($id_peminjam);

        // Delete order
        $peminjam->delete();

        // Return redirect & show message
        return redirect()->route('peminjam.index')
            ->with('success', 'Peminjam deleted successfully');
    }

}

