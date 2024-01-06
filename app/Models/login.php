<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model
{
    use HasFactory;
    public function isExistAdmin($nama_admin, $pass_admin){
        $cmd = "SELECT count(*) is_exist ".
        "FROM admins ".
        "WHERE nama_admin= :nama_admin AND pass_admin= :pass_admin;";
        $data = [
            'nama_admin'=> $nama_admin,
            'pass_admin'=>$pass_admin 
            
        ];
        $res = DB::select ($cmd,$data);
        if ($res[0]->is_exist == 1){
            return true;
            
        }
        return false;
        
    }
        
}
    

