<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AspekController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PohonController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AtributController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DataLatihController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubkriteriaController;
use App\Models\Hasil;

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
    return view('login', [
        'title' => 'ReNature',
    ]);
});


//Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('login');

//beranda
Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekLogin:1']], function () {

        //Data Siswa
        Route::prefix('data-siswa')->group(function () {
            Route::get('/', [SiswaController::class, 'index'])->name('data-siswa');
            Route::post('/store', [SiswaController::class, 'store'])->name('sdata-siswa');
            Route::patch('/update{id}', [SiswaController::class, 'update'])->name('udata-siswa');
            Route::delete('/delete{id}', [SiswaController::class, 'destroy'])->name('ddata-siswa');
        });

        //Data Latih
        Route::prefix('data-latih')->group(function () {
            Route::get('/', [DataLatihController::class, 'index'])->name('data-latih');
            Route::post('/import', [DataLatihController::class, 'import'])->name('idata-latih');
        });

        //Data Atribut
        Route::prefix('data-atribut')->group(function () {
            Route::get('/', [AtributController::class, 'index'])->name('data-atribut');
            Route::post('/store', [AtributController::class, 'store'])->name('sdata-atribut');
            Route::patch('/update{id}', [AtributController::class, 'update'])->name('udata-atribut');
            Route::delete('/delete{id}', [AtributController::class, 'destroy'])->name('ddata-atribut');
        });

        //Data Nilai
        Route::prefix('data-nilai')->group(function () {
            Route::get('/', [NilaiController::class, 'index'])->name('data-nilai');
            Route::post('/store', [NilaiController::class, 'store'])->name('sdata-nilai');
            Route::patch('/update{id}', [NilaiController::class, 'update'])->name('udata-nilai');
            Route::delete('/delete{id}', [NilaiController::class, 'destroy'])->name('ddata-nilai');
        });


        // Data Penilaian
        Route::prefix('data-penilaian')->group(function () {
            Route::get('/', [PenilaianController::class, 'index'])->name('data-penilaian');
            Route::post('/store', [PenilaianController::class, 'store'])->name('sdata-penilaian');
            Route::delete('/delete{id}', [PenilaianController::class, 'destroy'])->name('ddata-penilaian');
        });

        // Data Perhitungan
        Route::prefix('data-perhitungan')->group(function () {
            Route::get('/', [PerhitunganController::class, 'index'])->name('data-perhitungan');
            Route::post('/store', [PerhitunganController::class, 'store'])->name('sdata-perhitungan');
            Route::delete('/delete{id}', [PerhitunganController::class, 'destroy'])->name('ddata-perhitungan');
        });

        // Data Hasil
        Route::prefix('data-hasil')->group(function () {
            Route::get('/', [HasilController::class, 'index'])->name('data-hasil');
            Route::get('/riwayat', [HasilController::class, 'riwayat'])->name('data-riwayat');
        });
    });
});
