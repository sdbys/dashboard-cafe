<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiMenuCtrl extends Controller
{
    function getAll(){
        $menu = DB::select("SELECT menus.*,categories.cat_nm FROM menus INNER JOIN categories ON menus.mn_cat_id = categories.id");
        return json_encode($menu);
    }

    function getfav(){
        $menu = DB::select("SELECT menus.*,sum(details.detail_qty) as jml from menus inner join details on details.detail_mn_id = menus.id group by menus.id,menus.mn_kd,menus.mn_nama,menus.mn_cat_id,menus.mn_harga,menus.mn_satuan,menus.mn_stok,menus.mn_kitch_id,menus.mn_desc,menus.foto,menus.created_at,menus.updated_at order by jml desc limit 0,10");
        return json_encode($menu);
    }
    
    // categori 
    function getCategory(){
        $cat = categories::All();

        return response()->json($cat);
    }
}
