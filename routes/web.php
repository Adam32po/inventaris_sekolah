<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin',[DashboardController::class,'index'])
 ->name('Admin.dashboard');

route::resource('barang',BarangController::class);
    