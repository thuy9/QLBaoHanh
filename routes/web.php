<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tbl_baohanh_sanphamController;
use App\Http\Controllers\tbl_baohanh_kichhoatController;

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


//Route::resource('user','tbl_baohanh_kichhoatController');
Route::get( 'SanPham',[tbl_baohanh_kichhoatController::class,'index']);
Route::post( 'KichHoatBaoHanh',[tbl_baohanh_kichhoatController::class,'store']);
Route::get( 'TraCuuBaoHanh/{id}',['uses' => 'tbl_baohanh_kichhoatController@show','as' => 'TraCuuBaoHanh.route']);
