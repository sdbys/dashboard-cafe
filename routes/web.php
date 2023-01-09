<?php
// call class controller
use App\Http\Controllers\MenusCtrl;
use App\Http\Controllers\transCtrl;
use App\Http\Controllers\reportCtrl;
use App\Http\Controllers\TablesCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCtrl;
use App\Http\Controllers\CustomerCtrl;
use App\Http\Controllers\KitchensCtrl;





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

Route::get('/', function () {
    return view('dashboard');
});
// category
Route::get('category',[CategoryCtrl::class,"index"]);
Route::get('category/form/{id_cat?}',[CategoryCtrl::class,"form"]);
Route::get('category/delete/{id_cat}',[CategoryCtrl::class,"delete"]);
Route::post('category/save',[CategoryCtrl::class,"save"]);

// tables
Route::get('tables',[TablesCtrl::class,"index"]);
Route::get('tables/form/{id_tab?}',[TablesCtrl::class,"form"]);
Route::get('tables/delete/{id_tab}',[TablesCtrl::class,"delete"]);
Route::post('tables/save',[TablesCtrl::class,"save"]);
// kitchen
Route::get('kitchen',[KitchensCtrl::class,"index"]);
Route::get('kitchen/form/{id_kitch?}',[KitchensCtrl::class,"form"]);
Route::get('kitchen/delete/{id_kitch}',[KitchensCtrl::class,"delete"]);
Route::post('kitchen/save',[KitchensCtrl::class,"save"]);
// menu
Route::get('menu',[MenusCtrl::class,"index"]);
Route::get('menu/form/{id_mn?}',[MenusCtrl::class,"form"]);
Route::get('menu/delete/{id_mn}',[MenusCtrl::class,"delete"]);
Route::post('menu/save',[MenusCtrl::class,"save"]);
// transaksi
Route::get('transaction',[transCtrl::class,"index"]);
Route::get('transaction/form',[transCtrl::class,"form"]);
Route::get('transaction/nota/{id}',[transCtrl::class,"nota"]);
Route::post('transaction/save',[transCtrl::class,"save"]);
// customer
Route::get('customer',[CustomerCtrl::class,"index"]);
Route::get('customer/form/{id_cus?}',[CustomerCtrl::class,"form"]);
Route::get('customer/delete/{id_cus}',[CustomerCtrl::class,"delete"]);
Route::post('customer/save',[CustomerCtrl::class,"save"]);
// report
Route::get('report/transaction',[reportCtrl::class,"rpt_transaction"]);
