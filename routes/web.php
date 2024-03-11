<?php

use App\Http\Controllers\agenda\AgendaForm;
use App\Http\Controllers\agenda\AgendaHome;
use App\Http\Controllers\agenda\AgendaView;
use App\Http\Controllers\SuratPengantar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\form\pendudukform;
use App\Http\Controllers\form\PendudukFormController;
use App\Http\Controllers\form\suratkelahiranform;
use App\Http\Controllers\form\SuratKelahiranFormController;
use App\Http\Controllers\form\suratKematianForm;
use App\Http\Controllers\form\suratpengantarform;
use App\Http\Controllers\form\SuratPengantarFormController;
use App\Http\Controllers\form\suratPindahForm;
use App\Http\Controllers\form\SuratPindahFormController;
use App\Http\Controllers\penduduk;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\Printpdf;
use App\Http\Controllers\suratKelahiran;
use App\Http\Controllers\SuratKelahiranController;
use App\Http\Controllers\suratKematian;
use App\Http\Controllers\SuratKematianController;
use App\Http\Controllers\suratpengantar as ControllersSuratpengantar;
use App\Http\Controllers\SuratPengantarController;
use App\Http\Controllers\suratPindah;
use App\Http\Controllers\SuratPindahController;

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
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //dashboard section
    Route::get('/dashboard',[DashboardController::class, 'render'])->name('dashboard');

    //datatables
    Route::resource('suratpengantar', SuratPengantarController::class);
    Route::resource('lihatpenduduk', PendudukController::class);
    Route::resource('suratkematian', SuratKematianController::class);
    Route::resource('suratpindah', SuratPindahController::class);
    Route::resource('suratkelahiran', SuratKelahiranController::class);


    //form
    Route::resource('suratpengantarform', SuratPengantarFormController::class);
    Route::resource('pendudukform', PendudukFormController::class);
    Route::resource('suratkematianform', SuratKelahiranFormController::class);
    Route::resource('suratpindahform', SuratPindahFormController::class);
    Route::resource('suratkelahiranform', SuratKelahiranFormController::class);

    //print
    Route::post('/pengantarPDF/{id}', [Printpdf::class, 'printPengantar'])->name('printPengantar');
    Route::post('/pindahanPDF/{id}', [Printpdf::class, 'printPindahan'])->name('printPindahan');
    Route::post('/kematianPDF/{id}', [Printpdf::class, 'printKematian'])->name('printKematian');
    Route::post('/kelahiranPDF/{id}', [Printpdf::class, 'printKelahiran'])->name('printKelahiran');

    //autofill
    Route::get('/autofill/{nik}', [SuratPengantarFormController::class, 'autofill'])->name('autofill');

    //agenda
    Route::resource('agenda', AgendaView::class);
    Route::resource('agendaform', AgendaForm::class);
    Route::get('/agenda-desa',[AgendaHome::class, 'render'])->name('agenda-desa');

});
