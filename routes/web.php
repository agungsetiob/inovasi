<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SkpdController, 
    ContactController,
    FileController,
    BackupController,
    VisitorController,
    CategoryController,
    IndikatorController,
    BuktiController,
    KlasifikasiController,
    TematikController,
    TahapanController
};
use App\Http\Controllers\BentukController;
use App\Http\Controllers\InisiatorController;
use App\Http\Controllers\UrusanController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', [VisitorController::class, 'index']);
Route::get('/inovasi', [VisitorController::class, 'inovasi']);
Route::get('/litbang', [VisitorController::class, 'litbang']);
Route::get('/riset', [VisitorController::class, 'riset']);

Route::post('send/message', [ContactController::class, 'store']);

//route group on my own
Route::middleware(['auth'])->group(function () {

    Route::resource('proyek/inovasi', ProposalController::class);
    Route::get('print/report/{id}', [ProposalController::class, 'proposalReport']);
    Route::get('data/inovasi', [ProposalController::class, 'database'])->name('database');
    Route::put('send/inovasi/{proposal}', [ProposalController::class, 'sendProposal']);
    Route::delete('/delete/inovasi/{inovasi}', [ProposalController::class, 'destroy']);

    Route::resource('/admin', \App\Http\Controllers\AdminController::class);
    Route::get('/user', [\App\Http\Controllers\AdminController::class, 'user']);

    Route::resource('master/inisiator', InisiatorController::class);
    Route::post('enable/inisiator/{id}', [InisiatorController::class, 'enable']);
    Route::post('disable/inisiator/{id}', [InisiatorController::class, 'disable']);

    Route::resource('master/tahapan', TahapanController::class);
    Route::post('enable/tahapan/{id}', [TahapanController::class, 'enable']);
    Route::post('disable/tahapan/{id}', [TahapanController::class, 'disable']);

    Route::resource('master/jenis', CategoryController::class);
    Route::post('jenis/change-status/{id}', [CategoryController::class, 'changeStatus']);

    Route::resource('master/bentuk', BentukController::class);
    Route::post('bentuk/change-status/{id}', [BentukController::class, 'changeStatus']);

    Route::resource('master/skpd', SkpdController::class);
    Route::post('activate/skpd/{id}', [SkpdController::class, 'activate']);
    Route::post('deactivate/skpd/{id}', [SkpdController::class, 'deactivate']);

    Route::resource('master/urusan', UrusanController::class);
    Route::post('/toggle-status/urusan/{urusan}', [UrusanController::Class, 'toggleStatus']);
    Route::get('master/klasifikasi/detail', [UrusanController::Class, 'klasifikasi']);

    Route::resource('master/indikator', IndikatorController::class);
    Route::post('enable/indikator/{id}', [IndikatorController::class, 'enable']);
    Route::post('disable/indikator/{id}', [IndikatorController::class, 'disable']);

    Route::resource('master/bukti', BuktiController::class);
    Route::post('bukti/change-status/{id}', [BuktiController::class, 'changeStatus']);

    Route::resource('master/klasifikasi', KlasifikasiController::class);
    Route::post('/toggle-status/klasifikasi/{klasifikasi}', [KlasifikasiController::Class, 'toggleStatus']);

    Route::resource('master/tematik', TematikController::class);
    Route::post('/toggle-status/tematik/{tematik}', [TematikController::Class, 'toggleStatus']);

    Route::get('bukti-dukung/{id}', [FileController::class, 'index']);
    Route::post('upload/file', [FileController::class, 'store']);
    Route::post('upload/spd', [FileController::class, 'storeSpd']);
    Route::put('spd/edit/{file}', [FileController::class, 'updateSpd']);
    Route::put('bukti-dukung/edit/{file}', [FileController::class, 'update']);
    Route::get('bukti-dukung/add/{indikator}', [FileController::class, 'show']);
    Route::get('bukti-dukung/data/{proposal}/{indikator}', [FileController::class, 'edit']);
    Route::get('bukti/inovasi/{id}', [FileController::class, 'bukti']);
    
    Route::get('/backup', [BackupController::class, 'index']);
    Route::get('/backup/only-db', [BackupController::class, 'create']);
    Route::get('/backup/delete/{file_name}', [BackupController::class, 'delete']);

    Route::get('messages', [ContactController::class, 'index']);
    Route::get('delete/message/{id}', [ContactController::class, 'destroy']);
    Route::get('messages/laporan/{startdate}/{enddate}', [ContactController::class, 'messagesReport']);

    Route::get('data/profile/', [ProfileController::class, 'index']);
    Route::get('indikator/spd/{profile}', [ProfileController::class, 'show']);
    Route::post('profile/create', [ProfileController::class, 'store']);
    Route::put('profile/update/{id}', [ProfileController::class, 'update']);


});


require __DIR__.'/auth.php';
