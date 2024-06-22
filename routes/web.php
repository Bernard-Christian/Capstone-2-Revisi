<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\BeasiswaDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('periodebs-list');
    Route::get('/beasiswa/create', [BeasiswaController::class, 'create'])->name('periodebs-create');
    Route::post('/beasiswa/create', [BeasiswaController::class, 'store'])->name('periodebs-store');
    Route::get('/beasiswa/edit/{id}', [BeasiswaController::class, 'edit'])->name('periodebs-edit');
    Route::post('/beasiswa/edit/{id}', [BeasiswaController::class, 'update'])->name('periodebs-update');
    Route::get('/beasiswa/delete/{id}', [BeasiswaController::class, 'destroy'])->name('periodebs-delete');

    Route::get('/beasiswa_detail', [BeasiswaDetailController::class, 'index'])->name('beasiswa_detail-list');
    Route::get('/beasiswa_detail/create', [BeasiswaDetailController::class, 'create'])->name('beasiswa_detail-create');
    Route::post('/beasiswa_detail/create', [BeasiswaDetailController::class, 'store'])->name('beasiswa_detail-store');
    Route::get('/beasiswa_detail/edit/{id}', [BeasiswaDetailController::class, 'edit'])->name('beasiswa_detail-edit');
    Route::post('/beasiswa_detail/edit/{id}', [BeasiswaDetailController::class, 'update'])->name('beasiswa_detail-update');
    Route::get('/beasiswa_detail/delete/{id}', [BeasiswaDetailController::class, 'destroy'])->name('beasiswa_detail-delete');
    Route::post('/beasiswa_detail/{id}/approve-prodi', [BeasiswaDetailController::class, 'approveByProdi'])->name('beasiswa_detail-approve-prodi');
    Route::post('/beasiswa_detail/{id}/approve-fakultas', [BeasiswaDetailController::class, 'approveByFakultas'])->name('beasiswa_detail-approve-fakultas');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('user-list');
    Route::get('/user/create', [UserController::class, 'create'])->name('user-create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user-store');
    Route::get('/user-edit/{user}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('/user-edit/{user}', [UserController::class, 'update'])->name('user-update');
    Route::get('/user-delete/{user}', [UserController::class, 'destroy'])->name('user-delete');

    Route::get('/jenis_beasiswa', [\App\Http\Controllers\JenisBeasiswaController::class, 'index'])->name('jenis_beasiswa-list');
    Route::get('/jenis_beasiswa/create', [\App\Http\Controllers\JenisBeasiswaController::class, 'create'])->name('jenis_beasiswa-create');
    Route::post('/jenis_beasiswa/create', [\App\Http\Controllers\JenisBeasiswaController::class, 'store'])->name('jenis_beasiswa-store');

    Route::get('/fakultas', [\App\Http\Controllers\FakultasController::class, 'index'])->name('fakultas-list');
    Route::get('/fakultas/create', [\App\Http\Controllers\FakultasController::class, 'create'])->name('fakultas-create');
    Route::post('/fakultas/create', [\App\Http\Controllers\FakultasController::class, 'store'])->name('fakultas-store');

    Route::get('/prodi', [\App\Http\Controllers\ProdiController::class, 'index'])->name('prodi-list');
    Route::get('/prodi/create', [\App\Http\Controllers\ProdiController::class, 'create'])->name('prodi-create');
    Route::post('/prodi/create', [\App\Http\Controllers\ProdiController::class, 'store'])->name('prodi-store');
});
