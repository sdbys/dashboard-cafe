<?php

namespace App\Http\Controllers;

use App\Models\menus;
use App\Models\tables;
use App\Models\details;
use App\Models\customers;
use App\Models\categories;
use App\Models\transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transCtrl extends Controller
{
    function index(){
        // query data transaksi
        $dtTrans = DB::table("transactions")
            -> join("users","transactions.trans_user_id","=","users.id")
            -> leftjoin("customers","transactions.trans_user_id","=","customers.id")
            -> select("transactions.*","users.name","customers.cus_nm")
            ->paginate(5);
            $data = [
            "title" => "transaction",
            "dtTrans" => $dtTrans
        ];
        return view ('transaction.data',$data);
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
        //dd($req ->all());

        $nota = date("ymdhis");
        // get next id
        $cmd = DB::select ("SHOW TABLE STATUS LIKE 'transactions'");
        $id_trans = $cmd[0]->Auto_increment;

        // simpan transaksi
        transactions::create([
            "trans_nota"    => $nota,
            "trans_tgl"     => date("Y-m-d h:i:s"),
            "trans_user_id" => 1,
            "trans_cus_id"  => $req->input("trans_cus_id") == null ? 0 : $req -> input ("trans_cus_id"),
            "trans_mj_no"   => $req -> input("meja"),
            "trans_diskon"  => $req -> input("diskon"),
            "trans_ppn"     => $req -> input("ppn"),
            "trans_gtotal"  => $req -> input("gtotal"),
            "status"        => 0,
        ]);

        // ke detail
        $mn_id     = $req -> input("id_menu");
        $mn_harga  = $req -> input("harga");
        $mn_jumlah = $req -> input("jumlah");
        for($i=0; $i<count($mn_id);$i++){
            // save
            details::create([
                "detail_trans_id" => $id_trans,
                "detail_mn_id" => $mn_id[$i],
                "detail_mn_harga" => $mn_harga[$i],
                "detail_qty" => $mn_jumlah[$i],
                "detail_status" => 0// default
            ]);
        }
        $data = [
          "error" => 0,
          "message" => "data berhasil disimpan",
            "id_transaksi" => $id_trans
        ];
        return json_encode($data);
    }
    function nota($id){
    // query data transaksi
        $dt_trans = DB::table("transactions")
            -> join("users","transactions.trans_user_id","=","users_id")
            -> leftjoin("customers","transactions.trans_user_id","=","customers.id")
            -> select("transactions.*","users,.name","customers.cus_nm")
            -> where("transactions.id","=",$id)
            -> first();

        // data detail
        $dt_detail = DB::table("details")
            ->join("menus","details.detail_mn_id","=","menus.id")
            ->select("details.*","menus.mn_nama",DB::raw("details.detail_mn_harga * details.detail_qty)as subtotal"))
            ->where("details.detail_trans_id","=",$id)
            -> get();
        $data = [
            "rsTransaksi" => $dt_trans,
            "rsDetail" => $dt_detail,
            "total" => 0
        ];
        return view ("transaction.nota",$data);
    }
    function delete($id){

    }
}
