<?php

namespace App\Http\Controllers;

use App\Models\menus;
use App\Models\kitchens;
use App\Models\categories;
use Illuminate\Http\Request;

class MenusCtrl extends Controller
{
    function index(){
        // response list data 
        $data = [
            "title" => "Menu",
            "dtMenu" => menus::all()
        ];
        return view("menu.data",$data);
    }
    function form (Request $req){
        // add new or edit
        $data = [
            "title" => "Menu",
            "dtCat" => categories::all(),
            "dtKitchen" => kitchens::all(),
            "rsMenu" => menus::where("id",$req->id_menu)->first()
        ];
        return view("menu.form",$data);
    }
    function save(Request $req){
        // validasi 
        $req->validate (
            [
                "mn_kd" => "required|max:5",
                "mn_nm" => "required|max:50",
                "mn_cat_id" => "required",
                "mn_harga" => "required|numeric",
                "mn_satuan" => "required|max:20",
                "mn_stok" => "required",
                "mn_kitc_id" => "required",
                "foto"   => "mimes:jpg,jpeg,png|max:3000"
            ],
            [
              "mn_kd.required" => "Kode Menu Wajib diisi !",
                "mn_kd.unique" => "Kode Sudah digunakan",
                "mn_kd.max" => "Kode maximal 5 Karakter",
                "mn_nama.required" => "Nama Wajib diisi !",
                "mn_nama.max" => "Nama maximal 50 Karaker !",
                "mn_harga.max" => "Harga wajib diisi !",
                "mn_harga.numeri" => "Harga harus berupa angka",
                "mn_satuan.required" => "Satuan wajib diisi !",
                "mn_satuan.max" => "Satuan maximal 20 karakter !",
                "mn_stok.required" => "Stok wajib diisi !",
                "mn_kitch_id.required" => "Dapur wajib diisi !",
                "foto.mimes" => "Foto harus .jpg, .jpeg atau png !",
                "foto.max" => "Foto maximal ukuran 1 MB !",
   
            ]
        );
            // Proses Upload
       
        
        if($req->file("foto")){
            $fileName = time().'.'.$req->file("foto")->extension();               
            $result = $req->file("foto")->move(public_path('uploads/menu'), $fileName);    
            $foto = asset("uploads/menu/".$fileName);
        } else {
            $foto = $req->input("old_foto");
        }             

        

        // Proses Simpan
        try {
            // Save
            Menus::updateOrCreate(
                [
                    "id" => $req->input("id_menu")
                ],
                [
                    "mn_kd" => $req->input("mn_kd"),
                    "mn_nm" => $req->input("mn_nm"),
                    "mn_cat_id" => $req->input("mn_cat_id"),
                    "mn_harga" => $req->input("mn_harga"),
                    "mn_satuan" => $req->input("mn_satuan"),
                    "mn_stok" => $req->input("mn_stok"),
                    "mn_kitc_id" => $req->input("mn_kitc_id"),
                    "mn_desc" => $req->input("mn_desc"),
                    "foto" => $foto,
                ]
            );

            // Notif 
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan !"
            ];

        } catch(Exception $err){
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$err->getMessage()
            ];
        }

        return redirect('menu')->with($notif);

    }
    function delete($id){
         // Delete Data
        try {
            // Save
            Menu::where("id",$id)->delete();

            // Notif 
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Dihapus !"
            ];

        } catch(Exception $err){
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Dihapus !".$err->getMessage()
            ];
        }

        return redirect("menu")->with($notif);  
    }
}

