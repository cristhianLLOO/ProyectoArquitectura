<?php
use App\Http\Controllers\ControllerProveedor;
use App\Http\Controllers\AlmacenController;
use Illuminate\Support\Facades\Route;

// Ruta para la página de administración principal
Route::get('/admin', function () {
    return view('admin');
});

// Ruta para mostrar el formulario de creación de proveedores (GET) y para almacenar un nuevo proveedor (POST)
Route::get('/admin/proveedor', [ControllerProveedor::class, 'create'])->name('proveedores.create');
Route::post('/admin/proveedor', [ControllerProveedor::class, 'store'])->name('proveedores.store');

// Ruta para mostrar la lista de proveedores
Route::get('/proveedores', [ControllerProveedor::class, 'index'])->name('proveedores.index');

// Ruta para mostrar la tabla de productos en el almacén
Route::get('/almacenview', [AlmacenController::class, 'showTable'])->name('almacenview');

// Rutas para las acciones del CRUD de Almacén (usando prefijo API)
Route::prefix('api')->group(function () {
    Route::get('/almacen', [AlmacenController::class, 'index'])->name('almacen.index');
    Route::post('/almacen', [AlmacenController::class, 'store'])->name('almacen.store');
    Route::get('/almacen/{id}', [AlmacenController::class, 'show'])->name('almacen.show');
    Route::put('/almacen/{id}', [AlmacenController::class, 'update'])->name('almacen.update');
    Route::delete('/almacen/{id}', [AlmacenController::class, 'destroy'])->name('almacen.destroy');
});

// Ruta para mostrar la vista HTML del almacén
Route::view('/almacen', 'almacen')->name('almacen.view');
