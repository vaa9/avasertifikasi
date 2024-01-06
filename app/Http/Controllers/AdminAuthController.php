<?php

// AdminAuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use Session;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function adminAuthenticate(Request $request)
    {
        
        $nama_admin = $request->nama_admin;
        $pass_admin = $request->pass_admin;

        $model =  new login;
        $cekloginAdmin = $model->isExistAdmin ($nama_admin, $pass_admin);
        if ($cekloginAdmin == true){
            //1/2.a. Jika KETEMU, maka session LOGIN dibuat(session untuk menyimpan data pada device)
            //flush untuk reset session(dihapus semua)
            Session::flush();
            //menyimpan session baru
            Session::put ('nama_admin', $nama_admin); 
            Session::put ('pass_admin', $pass_admin);
            //untuk menampilkan pesan smentara
            Session::flash('success', 'Login Success!');
            return redirect ('/buku');
        }else{
            
            return redirect('/');
            }
        
        }

}

