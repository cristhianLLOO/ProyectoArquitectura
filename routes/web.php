<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ControllerProveedor;
use Illuminate\Support\Facades\Route;

// Rutas para las acciones del CRUD (API)
Route::get('/api/almacen', [AlmacenController::class, 'index'])->name('almacen.index');
Route::post('/api/almacen', [AlmacenController::class, 'store'])->name('almacen.store');
Route::get('/api/almacen/{id}', [AlmacenController::class, 'show'])->name('almacen.show');
Route::put('/api/almacen/{id}', [AlmacenController::class, 'update'])->name('almacen.update');
Route::delete('/api/almacen/{id}', [AlmacenController::class, 'destroy'])->name('almacen.destroy');

// Ruta para mostrar la vista HTML del almacén
Route::get('/almacen', function () {
    return view('almacen');
})->name('almacen.view');

// Otra vista
Route::post('/pro', [ControllerProveedor::class, 'store'])->name('proveedores.store');
