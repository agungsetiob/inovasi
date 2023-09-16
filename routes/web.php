<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{SkpdController, 
                        ContactController,
                        FileController,
                        BackupController,
                        VisitorController,
                        CategoryController};
use App\Http\Controllers\BentukController;
use App\Http\Controllers\UrusanController;


use App\Http\Controllers\ProposalController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Profile;

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

Route::get('/profil', function () {
    $title = 'Profil';
    $profiles = Profile::all();
    return view('main.about', compact('title', 'profiles'));
});

//call symlink through symlink.blade.php
Route::get('/v2', function () {
    return view('visitor.index-2');
});


Route::get('/', [VisitorController::class, 'index']);
Route::get('/inovasi', [VisitorController::class, 'inovasi']);
Route::get('/litbang', [VisitorController::class, 'litbang']);
Route::get('/riset', [VisitorController::class, 'riset']);

Route::post('send/message', [ContactController::class, 'store']);

Route::get('document', [FileController::class, 'document'])->name('docs');

//route group on my own
Route::middleware(['auth'])->group(function () {

    Route::resource('proyek/inovasi', \App\Http\Controllers\ProposalController::class);

    Route::resource('/admin', \App\Http\Controllers\AdminController::class);
    Route::get('/user', [\App\Http\Controllers\AdminController::class, 'user']);

    Route::resource('master/jenis', App\Http\Controllers\CategoryController::class);
    Route::post('enable/{id}', [CategoryController::class, 'enableCategory']);
    Route::post('disable/{id}', [CategoryController::class, 'disableCategory']);

    Route::resource('master/bentuk', BentukController::class);

    Route::resource('master/skpd', SkpdController::class);

    Route::resource('master/urusan', UrusanController::class);


    Route::get('bukti-dukung', [FileController::class, 'index']);
    Route::post('upload/file', [FileController::class, 'store']);
    Route::delete('delete/docs/{id}', [FileController::class, 'destroy']);
    

    Route::get('/backup', [BackupController::class, 'index']);
    Route::get('/backup/only-db', [BackupController::class, 'create']);
    Route::get('/backup/delete/{file_name}', [BackupController::class, 'delete']);



    // Route::resource('/posts', \App\Http\Controllers\PostController::class);
    // Route::get('user/dashboard', [PostController::class, 'userPost'])->name('dashboard');
    // Route::get('/our-services', [PostController::class, 'services']);
    // Route::get('/skm', [PostController::class, 'skm']);


    // Route::get('doctors', [HomeController::class, 'create']);
    // Route::post('add/doctor', [HomeController::class, 'store']);
    // Route::delete('delete/doctor/{id}', [HomeController::class, 'destroy']);
    // Route::put('update/doctor/{id}', [HomeController::class, 'updateDoctor']);


    // Route::resource('/standards', \App\Http\Controllers\StandarPelayananController::class);
    // Route::get('standar/pelayanan', [StandarPelayananController::class, 'index']);
    // Route::post('upload/standar-pelayanan', [StandarPelayananController::class, 'store']);
    // Route::delete('delete/standar-pelayanan/{id}', [StandarPelayananController::class, 'destroy']);


    Route::get('messages', [ContactController::class, 'index']);
    Route::get('delete/message/{id}', [ContactController::class, 'destroy']);
    Route::get('messages/laporan/{startdate}/{enddate}', [ContactController::class, 'messagesReport']);


    Route::get('setting/profile', [ProfileController::class, 'index']);
    Route::get('setting/profile/create', [ProfileController::class, 'create']);
    Route::get('setting/profile/{id}', [ProfileController::class, 'edit']);
    Route::post('profile/create', [ProfileController::class, 'store']);
    Route::put('profile/update/{id}', [ProfileController::class, 'update']);


    // Route::resource('setting/faqs', App\Http\Controllers\FaqController::class);
    // Route::get('/faqs/{faq}', [FaqController::class, 'destroy']);


});


require __DIR__.'/auth.php';
