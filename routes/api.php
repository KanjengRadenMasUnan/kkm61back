<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('/login', [ApiController::class, 'login']);

// Fitur Anggota
Route::get('/anggota', [ApiController::class, 'getAnggota']);
Route::post('/anggota', [ApiController::class, 'storeAnggota']);
Route::put('/anggota/{id}', [ApiController::class, 'updateAnggota']);
Route::delete('/anggota/{id}', [ApiController::class, 'deleteAnggota']);

// Fitur Berita
Route::get('/berita', [ApiController::class, 'getBerita']);
Route::get('/berita/{id}', [ApiController::class, 'getBeritaDetail']); // Route penangan detail berita
Route::post('/berita', [ApiController::class, 'storeBerita']);
Route::put('/berita/{id}', [ApiController::class, 'updateBerita']);
Route::delete('/berita/{id}', [ApiController::class, 'deleteBerita']);

// Fitur Program Kerja
Route::get('/program-kerja', [ApiController::class, 'getProgramKerja']);
Route::post('/program-kerja', [ApiController::class, 'storeProgramKerja']);
Route::put('/program-kerja/{id}', [ApiController::class, 'updateProgramKerja']);
Route::delete('/program-kerja/{id}', [ApiController::class, 'deleteProgramKerja']);

// Fitur Kegiatan
Route::get('/kegiatan', [ApiController::class, 'getKegiatan']);
