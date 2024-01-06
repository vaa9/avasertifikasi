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
        //mengambil nama admin dan pass admin dari view
        $nama_admin = $request->nama_admin;
        $pass_admin = $request->pass_admin;
        //memanggil model untuk di panggil functionnya
        $model =  new login;
        //menggunakan function untuk mengecek ada atau tidaknya admin dan passnya
        $cekloginAdmin = $model->isExistAdmin ($nama_admin, $pass_admin);
        //mengecek hasil dari function
        if ($cekloginAdmin == true){
            //jika hasilnya ketemu/true maka akan dimasukkan ke session dan di direct ke katalog
            //flush untuk reset session
            Session::flush();
            
            Session::put ('nama_admin', $nama_admin); 
            Session::put ('pass_admin', $pass_admin);
            Session::flash('success', 'Login Success!');
            return redirect ('/buku');
        }else{
            //jika tidak maka akan kembali ke login
            return redirect('/');
            }
        
        }

}

