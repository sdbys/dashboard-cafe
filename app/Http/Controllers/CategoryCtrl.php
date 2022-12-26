<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoryCtrl extends Controller
{
    function index(){
        // response list data
      
        $data = [
            "title" => "Category",
            "dtCat" => categories::All()
        ];
        return view("category.data",$data);
    }
    function form (request $req){
        // form add or edit
        $data = [
            "title" => "Category",
            "rsCat" => categories::where("id",$req->id_cat)->first()
        ];
        return view("category.form",$data);
    }
    function save (request $req){
        // create or update
        // validasi
         
        $req->validate(
            [
                "cat_nm" => "required|unique:categories|max:30"
            ],
            [
                "cat_nm.required"=>"Wajib Di isi",
                "cat_nm.unique"=>"Maaf category sudah ada",
                "cat_nm.max"=> "Maximal 30 karakter"
            ]
        );
        try {
            // save
            categories::updateorCreate(
                [
                    "id" => $req->input("id_cat")
                ],
                [
                    "cat_nm" => $req->input("cat_nm")
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
        return redirect (url("category"))->with($notif);
    }
    function delete($id){
        // delete data
        try {
            // save
            categories::where("id",$id)->delete();
            // notif
            $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan!"
            ];
        } catch (Exception $err) {
            $notif = [
                "type" => "success",
                "text" => "Data Gagal Di Hapus !".$err->getMessage()
            ];
        }
        return redirect(url("category"))-with($notif);
    }
}
