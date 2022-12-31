<?php

namespace App\Http\Controllers;

use App\Models\customers;
use Illuminate\Http\Request;

class CustomerCtrl extends Controller
{
    function index (){
        // response list data
        $data = [
            "title" => "Customers",
            "dtCus" => customers::all()
        ];
        return view("customer.data",$data);
    }
    function form(Request $req){
        // add and create
        $data = [
            "title" => "Customers",
            "rsCus" => customers::where("id",$req->id_cus)->first()
        ];
        return view("customer.form",$req);
    }
    function save(Request $req){
        // validasi 
        $req -> validate(
            [
                "cus_kd"=> "required|unique|max:5",
                "cus_nm"=> "required|max:50",
                "cus_alamat"=>"required|max:100",
                "cus_kota" => "required|max:50",
                "cus_jk" => "required|numeric",
                "cus_telp" => "required|numeric",
                "cus_status" => "required|numeric",
                "cus_poin" => "numeric",
                "cus_user_id"=>"required|unique|numeric",
        
            ],
            [
                "cus_kd.required" => "Kode Menu Wajib diisi !",
                "cus_kd.unique" => "Kode Sudah digunakan",
                "cus_kd.max" => "Kode maximal 5 Karakter",
                "cus_nm.required" => "Nama Wajib diisi !",
                "cus_nm.max" => "Nama maximal 50 Karaker !",
                "cus_alamat.required" => "Alamat wajib di isi",
                "cus_kota.required" => "kota wajib di isi",
                "cus_jk.required" => "jenis kelain harus di isi",
                "cus_jk.numeric" => "jenis kelamin berupa angka",
                "cus_telp.required" => "nomer tlp harus di isi",
                "cus_telp.numeric" => "telp harus angka",
                "cus_status.required" => "status harus di isi",
                "cus_status.numeric"=>"status harus disi",
                
                "cus_poin.numeric" => "poin harus angka",
                "cus_user_id.required" => "user id harus di isi",
                "cus_user_id.unique" => "customer id sudah digunakan",
                "cus_user_id.numeric" => "customer id harus berupa angka",
                
            ]
        );
        try{
            // proses save
            customers::updateOrCreate(
            [
                "id" => $req->input("cus_kd")
            ],
            [
                "cus_nm"      => $req ->     input('cus_nm'),
                "cus_alamat"  => $req -> input('cus_alamat'),
                "cus_kota"    => $req ->  input('cus_kota'),
                "cus_jk"      => $req ->    input('cus_jk'),
                "cus_telp"    => $req ->   input ('cus_telp'),
                "cus_status"  => $req -> input('cus_status'),
                "cus_poin"    => $req -> input ('cus_poin'),
                "cus_user_id" => $req -> input('cus_user_id'),
            ]
                
            );
            
            // Notif 
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan !"
            ];

        }catch(Exception $err){
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$err->getMessage()
            ];
            return redirect('customer')->with($notif);
        }
    }
    function delete($id){
        // delete
        try {
            customers::where("id",$id)->delete();
            //notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Dihapus !"
            ];
        }catch(Exception $err){
             $notif = [
                "type" => "success",
                "text" => "Data Gagal Dihapus !".$err->getMessage()
            ];
        }
    }
}
