<?php

use App\Livewire\Admin;
use App\Livewire\Pengguna;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', Admin::class);
Route::get('/pengguna', Pengguna::class);

Route::get('/', function () {
    return view('admin');
});

Route::get('/user', function () {
    return view('pengguna');
});
