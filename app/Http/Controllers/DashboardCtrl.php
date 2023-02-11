<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardCtrl extends Controller
{
    function index(){

        $dayInc = DB::select("SELECT SUM(trans_gtotal) AS gtotal FROM transactions WHERE DATE(trans_tgl) = DATE(NOW())");
        $monthInc = DB::select("SELECT SUM(trans_gtotal) AS gtotal FROM transactions WHERE YEAR(trans_tgl) = YEAR(NOW()) AND MONTH(trans_tgl) = MONTH(NOW())");
        $yearInc = DB::select("SELECT SUM(trans_gtotal) AS gtotal FROM transactions WHERE YEAR(trans_tgl) = YEAR(NOW())");
  
        $data = [
            "dailyInc" => $dayInc[0],
            "monthInc" => $monthInc[0],
            "yearInc" => $yearInc[0],
        ];

        return view("dashboard",$data);
    }
}


