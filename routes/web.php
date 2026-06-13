<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/surat', [SuratController::class, 'daftarSurat']);
Route::resource('surat', SuratController::class );