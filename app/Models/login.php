<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model
{
    use HasFactory;
    protected $guarded = ['id_admin'];
    //membuat fungsi untuk mencari nama dan pass admin
    public function isExistAdmin($nama_admin, $pass_admin){
        //query untuk mencari dari databse tentang admin 
        $cmd = "SELECT count(*) is_exist ".
        "FROM admins ".
        "WHERE nama_admin= :nama_admin AND pass_admin= :pass_admin;";
        //array untuk memasukkan hasil dari cmd
        $data = [
            'nama_admin'=> $nama_admin,
            'pass_admin'=>$pass_admin 
            
        ];
//menjalankan cmd dan data dari database
        $res = DB::select ($cmd,$data);
        //memastikan ada yang didapat dari hasil query
        if ($res[0]->is_exist == 1){
            //jika ada maka hasilnya akan true
            return true;
            
        }
        return false;
        
    }
        
}
    

