<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class BookController extends Controller
{
    public function index()
    {
        $buku = buku::all();

        // Render view 
        return view('buku', compact('buku'));
    }
    public function search(Request $request)
    {
        $judul = $request->input('judul');

        // Lakukan query pencarian berdasarkan judul
        $buku = buku::where('nama_buku', 'LIKE', "%$judul%")->get();

        return view('buku.index', compact('buku'));
    }
    public function create()
    {
        $buku = buku::all();

        // Render view
        return view('createbook', compact('buku'));
    }

    public function store(Request $request)
    {
        // $imageName = time().'.'.$request->cover->extension();
        // $request->cover->storeAs('public/images', $imageName);
        // Create customer
        // $image = $request->file('image');
        // $image->storeAs('public/vehicles', $image->hashName());
        $buku = buku::create([
            'nama_buku' => $request->nama_buku,
            'penulis_buku' => $request->penulis_buku,
            'sinopsis_buku' => $request->sinopsis_buku,
            'foto_buku' => $request->cover,
            'status_buku' => false,
        ]);
        

        // Return redirect & show message
        return redirect()->route('buku.index')
            ->with('success', 'Book created successfully');
    }
}

