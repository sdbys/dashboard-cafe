<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminante\Support\Facades\Hash;
class AuthCtrl extends Controller
{
     function login(){
        return view('auth.login');
    }
    function cek_login(Request $req){
        // validasi
        $req -> validate(
            [
                "email" => "required",
                "password" => "required"
            ],
            [
                "email.required" => "maaf email harus di isi",
                "password.required" => "password harus di isi"
            ]

        );
         // cek login
        if(Auth::attempt(['email' => $req->email,'password' => $req->password])){
           $req-> session()->regenerate();
           return redirect('/'); //dasboard
        }
        // jika user password salah kembali ke form login
        $mess = [
          "type" => "danger",
            "text" => "Maaf Username Atau Password salah !"
        ];
        return back()->with($mess);
    }
    function registrasi () {
        return view ('auth.register');
    }
    function save_registrasi(Request $req){
        $req ->validate(
            [
                "name" => "required|max:50",
                "email" => "required",
                "password" => "required|min:8"
            ],
            [
                "name.required" => "Maaf Nama Harus Di isi",
                "name.max" => "maaf nama maximal 50 karakter",
                "email.required" => "maaf email harus di isi",
                "password.required" => "maaf password harus di isi",
                "password.min" => "password minimal 8 karakter"
            ]
        );
        try {
            // save
            User::create([
                "name" => $req->name,
                "email" => $req ->email,
                "password" => Hash::make($req->password),
                "level" => "User",
                "status" => 1
            ]);
            $mess = [
                "type" => "succes",
                "text"=> "Registrasi Berhasil Dilakukan"
            ];
        }catch (Exception $err) {
          $mess = [
            "type" => "danger",
            "text" => "Registrasi Gagal"
          ];
        }
        return redirect("auth/login")->with($mess);
    }
    function logout (Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('auth/login');
        //if(auth())
    }
}
