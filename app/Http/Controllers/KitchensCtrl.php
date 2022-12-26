<?php

namespace App\Http\Controllers;

use App\Models\kitchens;
use Illuminate\Http\Request;

class KitchensCtrl extends Controller
{
    public function index(){
        // response list data
        $data = [
            "title" => "Kitchen",
            "dtKitc" => kitchens::All()
        ];
        return view("kitchen.data",$data);
    }

    public function form (Request $req) {
        // add data dan edit 
        $data = [
            "title" => "Kitchen",
            "rsKitc" => kitchens::where("id",$req->id_kitc)->first()
        ];
        return view("kitchen.form",$data);
    }
    
    public function save (Request $req) {
        // validasi
        // create or update
        $req -> validate(
            [
            "kitc_nm" => "required|unique:kitchens|max:30"
            ],
            [
                "kich_nm.required"=>"Wajib Di isi",
                "kich_nm.unique"=>"Maaf kitchen sudah ada",
                "kich_nm.max"=> "Maximal 30 karakter"
            ]
        );
        try {
            //save
            kitchens::updateorCreate(
                [
                    "id" => $req->input("id_kitc")
                ],
                [
                    "kitc_nm" => $req->input("kitc_nm")
                ]
            );
             // notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan"
            ];

        } catch (Exception $err) {
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$err->getmessage()
        ];
        }
        return redirect (url("kitchen"))->with($notif);

    }

    public function delete ($id){
        // save
        try{
            kithens::where("id",$id)->delete();
             // notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan!"
            ];
        }catch (Exception $err) {
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Di Hapus !".$err->getMessage()
            ];
        }
        return redirect(url("kitchen"))-with($notif);
        
    }
}
