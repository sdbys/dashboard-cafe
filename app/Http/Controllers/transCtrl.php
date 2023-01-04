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
        dd($req ->all());

        $nota = date("ymdhis");
        // get next id
        $cmd = DB::select ("SHOW TABLE STATUS LIKE 'transactions'");
        $id_trans = $cmd[0]->Auto_increment;

        // simpan transaksi
        transaction::create([
            "trans_nota"    => $nota,
            "trans_tgl"     => date("Y-m-d h:i:s"),
            "trans_user_id" => 1,
            "trans_cus_id"  => $req->input("trans_cus_id") == null ? 0 : $req -> input ("trans_cus_id"),
            "trans_mj_no"   => $req -> input("meja"),
            "trans_diskon"  => $req -> input("diskon"),
            "trans_ppn"     => $req -> input("ppn"),
            "trans_gtotal"  => $req -> input("gtotal"),
            "status"        => A,
        ]);

        // ke detail
        $mn_id     = $req -> input("id_menu");
        $mn_harga  = $req -> input("harga");
        $mn_jumlah = $req -> input("jumlah");
        for($i=0; $i<count($mn_id);$i++){
            // save
            detail::create([
                "detail_trans_id" => $id_trans,
                "detail_mn_id" => $mn_id[$i],
                "detail_mn_harga" => $mn_harga[$i],
                "detail_qty" => $mn_jumlah[$i],
                "detail_status" => A // default
            ]);
        }
        return redirect("transaction/form");
    }
    function delete($id){

    }
}
