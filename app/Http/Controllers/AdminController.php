<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = admin::all();

        // Render view 
        return view('admin', compact('admins'));
    }

    public function create()
    {
        $admins = admin::all();

        // Render view
        return view('createadmin', compact('admins'));
    }

    public function store(Request $request)
    {
        // Create customer
        $admins = admin::create([
            'nama_admin' => $request->name,
            'pass_admin' => $request->password,
            'lupapass_admin' => $request->lupapassword
        ]);

        // Return redirect & show message
        return redirect()->route('admin.index')
            ->with('success', 'Customer created successfully');
    }
}

