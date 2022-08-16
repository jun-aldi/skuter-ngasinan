<?php

use App\Http\Controllers\SuratPengantar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\form\pendudukform;
use App\Http\Controllers\form\suratkelahiranform;
use App\Http\Controllers\form\suratKematianForm;
use App\Http\Controllers\form\suratpengantarform;
use App\Http\Controllers\form\suratPindahForm;
use App\Http\Controllers\penduduk;
use App\Http\Controllers\Printpdf;
use App\Http\Controllers\suratkelahiran;
use App\Http\Controllers\suratKematian;
use App\Http\Controllers\suratpengantar as ControllersSuratpengantar;
use App\Http\Controllers\suratPindah;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //dashboard section
    Route::get('/dashboard',[Dashboard::class, 'render'])->name('dashboard');

    //datatables
    Route::resource('suratpengantar', suratpengantar::class);
    Route::resource('lihatpenduduk', penduduk::class);
    Route::resource('suratkematian', suratKematian::class);
    Route::resource('suratpindah', suratPindah::class);
    Route::resource('suratkelahiran', suratkelahiran::class);


    //form
    Route::resource('suratpengantarform', suratpengantarform::class);
    Route::resource('pendudukform', pendudukform::class);
    Route::resource('suratkematianform', suratKematianForm::class);
    Route::resource('suratpindahform', suratPindahForm::class);
    Route::resource('suratkelahiranform', suratkelahiranform::class);

    //print
    Route::post('/pengantarPDF/{id}', [Printpdf::class, 'printPengantar'])->name('printPengantar');
    Route::post('/pindahanPDF/{id}', [Printpdf::class, 'printPindahan'])->name('printPindahan');
    Route::post('/kematianPDF/{id}', [Printpdf::class, 'printKematian'])->name('printKematian');
    Route::post('/kelahiranPDF/{id}', [Printpdf::class, 'printKelahiran'])->name('printKelahiran');

    //autofill
    Route::get('/autofill/{nik}', [suratpengantarform::class, 'autofill'])->name('autofill');
});
