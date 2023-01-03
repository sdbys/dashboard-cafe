<?php

namespace App\Http\Controllers;

use App\Models\tables;
use Illuminate\Http\Request;

class TablesCtrl extends Controller
{
    function index(){
        // response list data
        $data = [
            "title" => "tables",
            "dtTab" => tables::All()
        ];
        return view("tables.data",$data);
    }
    function form(request $req){
        // form add or edit
        $data = [
            "title" => "tables",
            "rsTab" => tables::where("id",$req->id_tab)->first()
        ];
        return view("tables.form",$data);
    }
    function save(request $req){
        // create or update
        // validasi
        $req ->validate (
            [
                "mj_no" => "required|unique:tables|max:20"
            ],
            [
                "mj_no.required"=>"Wajib Di isi",
                "mj_no.unique"=>"Maaf category sudah ada",
                "mj_no.max"=> "Maximal 30 karakter"
            ]
        );
        // proses
        try{
            // save
            tables::updateorCreate(
                [
                    "id" => $req -> input("id_tab")
                ],
                [
                   "mj_no" => $req -> input ("mj_no"),
                   "mj_capacity" => $req ->input ("mj_capacity")
                ]
            );
              // notif
                $notif = [
                "type" => "success",
                "text" => "Data Berhasil Disimpan"
            ];
        }catch(Exception $err){
                $notif = [
                "type" => "success",
                "text" => "Data Gagal Disimpan !".$err->getmessage()
            ];
              return redirect("tables")->with($notif);
        }
    }
    function delete($id){
        // delete
        try{
            // save
            tables::where("id",$id)->delete();
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
    }
}
