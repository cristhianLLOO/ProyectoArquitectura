<?php
use App\Http\Controllers\ControllerProveedor;
use App\Http\Controllers\AlmacenController;
use Illuminate\Support\Facades\Route;

// Ruta para mostrar el formulario de creación de proveedores
Route::post('/provedor', [ControllerProveedor::class, 'store'])->name('proveedores.store');

Route::get('/proveedores', function () {
    return view('proveedor');

});
// Ruta para almacenar los proveedores

// Rutas para las acciones del CRUD de Almacén
Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen.index');
Route::post('/almacen', [AlmacenController::class, 'store'])->name('almacen.store');
Route::get('/almacen/{id}', [AlmacenController::class, 'show'])->name('almacen.show');
Route::put('/almacen/{id}', [AlmacenController::class, 'update'])->name('almacen.update');
Route::delete('/almacen/{id}', [AlmacenController::class, 'destroy'])->name('almacen.destroy');

// Ruta para mostrar la vista HTML del almacén
Route::view('/almacen', 'almacen')->name('almacen.view');


