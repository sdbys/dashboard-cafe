<?php

namespace App\Http\Controllers;

use App\Models\menus;
use App\Models\tables;
use App\Models\customers;
use App\Models\categories;
use App\Models\transactions;
use Illuminate\Http\Request;

class transCtrl extends Controller
{
    function index(){
        $data = [
            "title" => "Transaction",
            "dtTrans" => transactions::All()
        ];
        return view("transactions.data",$data);
    }
    function form(request $req){
        $data = [
            "title" => "Transaction",
            "dtCat" => categories::All(),
            "dtTable" => tables::All(),
            "dtCus" => customers::All(),
            "dtMenu" => menus::All(),
        ];
        return view("transaction.form",$data);
    }
    function save(request $req){
        dd($req);
    }
    function delete($id){

    }
}
