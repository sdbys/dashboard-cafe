<?php
// call class controller


use App\Http\Controllers\AuthCtrl;
use App\Http\Middleware\roleAdmin;
use App\Http\Controllers\MenusCtrl;
use App\Http\Controllers\transCtrl;
use App\Http\Controllers\reportCtrl;
use App\Http\Controllers\TablesCtrl;
use App\Http\Middleware\roleOperator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCtrl;
use App\Http\Controllers\CustomerCtrl;
use App\Http\Controllers\KitchensCtrl;
use App\Http\Controllers\DashboardCtrl;











/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(["middleware"=>"auth"],function(){

    Route::get('/',[DashboardCtrl::class,"index"]);

    // Route Category
    Route::get("category",[CategoryCtrl::class,"index"])->middleware("roleOperator");
    Route::group(["middleware"=>"roleAdmin"],function(){
        Route::get("category/form/{id_cat?}",[CategoryCtrl::class,"form"]);
        Route::get("category/delete/{id_cat}",[CategoryCtrl::class,"delete"]);
        Route::post("category/save",[CategoryCtrl::class,"save"]);
    });
    // Route Kitchen 
    Route::get("kitchen",[KitchensCtrl::class,"index"])->middleware("roleOperator");
    Route::group(["middleware"=>"roleAdmin"],function(){
        route::get("kitchen/form/{id_kitc?}",[KitchensCtrl::class,"form"]);
        route::get("kitchen/delete/{id_cat}",[KitchensCtrl::class,"delete"]);
        route::post("kitchen/save",[KitchensCtrl::class,"save"]);
    });

    // route Table
    Route::get("tables",[TablesCtrl::class,"index"])->middleware("roleOperator");
    Route::group(["middleware"=>"roleAdmin"],function(){
        Route::get("tables/form/{id_tab?}",[TablesCtrl::class,"form"]);
        Route::get("tables/delete/{id_tab}",[TablesCtrl::class,"delete"]);
        Route::post("tables/save",[TablesCtrl::class,"save"]);
    });

    // route customer
    Route::get("customer",[CustomerCtrl::class,"index"])->middleware("roleOperator");
    Route::group(["middleware"=>"roleAdmin"],function(){
        route::get("customer/form/{id_cus?}",[CustomerCtrl::class,"form"]);
        route::get("customer/delete/{id_cus}",[CustomerCtrl::class,"delete"]);
        route::post("customer/save",[CustomerCtrl::class,"save"]);
    });
    
    
    // Route Menu
    Route::controller(MenusCtrl::class)->group(function(){
        Route::get("menu","index")->middleware("roleOperator");
        Route::get("menu/form/{id_menu?}","form")->middleware("roleAdmin");
        Route::get("menu/delete/{id_menu}","delete")->middleware("roleAdmin");
        Route::post("menu/save","save")->middleware("roleAdmin");
    });

    Route::group(["middleware"=>"roleOperator"],function(){
        // Transaksi
        Route::get("transaction",[TransCtrl::class,"index"]);
        Route::get("transaction/form",[TransCtrl::class,"form"]);
        Route::post("transaction/save",[TransCtrl::class,"save"]);
        Route::get("transaction/nota/{id}",[TransCtrl::class,"nota"]);
        Route::get("transaction/{id}/{status}",[TransCtrl::class,"update_status"]);
    });


    // Report
    Route::get("report/transaction",[ReportCtrl::class,"rpt_transaction"])->middleware("roleAdmin");

    // Auth Logout hanya bisa di akses jika sudah login
    Route::get("auth/logout",[AuthCtrl::class,"logout"])->name("signout"); // Dengan nama route   
});

// Auth
Route::get("auth/login",[AuthCtrl::class,"login"])->name("login"); // Dengan nama route
Route::post("auth/login",[AuthCtrl::class,"cek_login"]);
Route::get("auth/registrasi",[AuthCtrl::class,"registrasi"])->name("signup"); // Dengan nama route
Route::post("auth/registrasi",[AuthCtrl::class,"save_registrasi"]);
