<?php

use App\Http\Controllers\AuthController;
use App\Models\Barang;
use App\Models\Pelanggan;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

route::get('/',[AuthController::class,'login'])->name('login');
route::get('/login',[AuthController::class,'login'])->name('login');
route::post('/login',[AuthController::class,'authenticate']) -> name('login.authenticate');
route::post('/logout',[AuthController::class,'logout']) -> name('logout');


// 
route::middleware('auth')->group(function(){
    route::get('/dashboard', function(){
        return view('dashboard');
    });

    route::get('/penjualan',[PenjualanController::class,'index'])->name('penjualan.index');
    route::get('/penjualan/create',[PenjualanController::class,'create'])->name('penjualan.create');
    route::post('/penjualan/store',[PenjualanController::class,'store'])->name('penjualan.store');

    route::get('/barang',[BarangController::class,'index'])->name('barang.index');
    route::get('/barang/create',[BarangController::class,'create'])->name('barang.create');
    route::post('/barang/store',[BarangController::class,'store'])->name('barang.store');
    route::get('/barang/{id}/edit',[BarangController::class,'edit'])->name('barang.edit');
    route::put('/barang/{id}/update',[BarangController::class,'update'])->name('barang.update');
    route::delete('/barang/{id}/destroy',[BarangController::class,'destroy'])->name('barang.destroy');

    route::get('/pelanggan',[PelangganController::class,'index'])->name('pelanggan.index');
    route::get('/pelanggan/create',[PelangganController::class,'create'])->name('pelanggan.create');
    route::post('/pelanggan/store',[PelangganController::class,'store'])->name('pelanggan.store');
    route::get('/pelanggan/{id}/edit',[PelangganController::class,'edit'])->name('pelanggan.edit');
    route::put('/pelanggan/{id}/update',[PelangganController::class,'update'])->name('pelanggan.update');
    route::delete('/pelanggan/{id}/destroy',[PelangganController::class,'destroy'])->name('pelanggan.destroy');

});