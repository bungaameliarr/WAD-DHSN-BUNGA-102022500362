<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmadaController;

Route::get('/', [ArmadaController::class, 'index'])->name('armada.index');
Route::post('/armada/store', [ArmadaController::class, 'store'])->name('armada.store');
Route::get('/armada/edit/{id}', [ArmadaController::class, 'edit'])->name('armada.edit');
Route::post('/armada/update/{id}', [ArmadaController::class, 'update'])->name('armada.update');
Route::get('/armada/destroy/{id}', [ArmadaController::class, 'destroy'])->name('armada.delete');