<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Sellers;
use App\Http\Cupon;
use App\Http\tarjetas;
use App\Http\Controllers\Clientecontroller;
use App\Http\Controllers\ProductoVer;
use App\Http\Controllers\modificaproducto;
use App\Http\Controllers\Producto;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProConsultarController;
use App\Http\Controllers\Productos2Controller;
use App\Http\Controllers\ClienteMasController;
use App\Http\Controllers\GananciasController;
use App\Http\Controllers\ClienteCompraController;
use App\Http\Controllers\carritousercontroller;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AgregarCar;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AgregarProController;
use App\Http\Controllers\NuevoProController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/usercli', [Clientecontroller::class, 'usercliente'])->name('usercliente');


Route::controller(ProductosController::class,)->group(function () {
   
Route::get('/productos',[userController::class,'insertarProductos']);
Route::post('/guardar_producto',[ProductosController::class,'store'])->name('guardar_producto');
Route::get('/producto/{id}', [ProductosController ::class, 'show'])->name('ver_producto');
});



Route::controller(userController::class,)->group(function () {
    Route::get('register','new_account');
    Route::get('about','about');
    Route::get('profile','user');
    Route::get('index','index')->name('index');
    Route::get('login','log')->name('login');
    Route::get('recupcont','cont');
    Route::get('loginvendedor','ven');
    Route::get('iniciarcomo','icomo')->name('iniciarcomo');
    Route::get('crearcu','crearcu');
    Route::get('crearcuvended','crearcuven');
    Route::get('carrito','carr');
    Route::get('devolucion','dev');
    Route::get('pago','pag')->name('Pago');
    Route::get('tabla','tab');
    Route::get('tabla2','tabl');
    Route::get('product', 'product');
    Route::get('admin', 'administrador');

    Route::get('product/{id}', 'ViewProducto')->name('viewProduct');
    Route::get('index/{cat}', 'productClas')->name('categoria');

    Route::get('cupones', 'upload')->name('upload');
    Route::post('cupones', 'create');

    Route::post('usuarioRegistro', 'storeUser');
    Route::post('usuarioLogin', 'loginUser');

    Route::post('carritoAdd', 'addShop')->name('addShop')->middleware('auth');
    Route::get('carrito', 'showShop')->name('showShop')->middleware('auth');
    Route::get('carritoEliminar/{id}', 'eliminarCarrito')->name('dropShop')->middleware('auth');

    Route::get('crearcu', 'logout')->name('logout');

    Route::get('/producto/{id}', [userController::class, 'show'])->name('ver_producto');


    
});

Route::resource('/client',Clientecontroller::class)->only(['index','create','store','show','edit','update','destroy']);

Route::get('/usercli', [ClienteController::class, 'usercliente'])->name('usercliente');

Route::resource('client', ClienteController::class)->only(['index', 'create', 'store', 'destroy']);

Route::resource('/ver_producto', ProductoVer::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

Route::get('/ver_producto/{id}', 'ProductoVer@index')->name('ProdcutoVer');

Route::post('/registro', 'userController@storeUser')->name('registro');
Route::post('/inicio-sesion', 'userController@loginUser')->name('inicio-sesion');



Route::delete('/productos/{id}', [modificaproducto::class, 'eliminar'])->name('productos.eliminar');
Route::get('/modificarproducto', [modificaproducto::class, 'index'])->name('productos.index');
Route::get('/productos/{id}/modificar', [modificaproducto::class, 'modificar'])->name('productos.modificar');
Route::put('/productos/{id}', [modificaproducto::class, 'actualizar'])->name('productos.actualizar');

Route::post('/agregarAlCarrito', [AgregarCar::class, 'agregarAlCarrito'])->name('agregarAlCarrito');

Route::get('/carrito', [UserController::class, 'carr'])->name('carrito');

// Ruta para mostrar el formulario de creación
Route::get('/productos/create', [modificaproducto::class, 'create'])->name('productos.create');

// Ruta para almacenar el nuevo producto
Route::post('/productos', [modificaproducto::class, 'store'])->name('productos.store');

// Otras rutas existentes
Route::get('/productos', [modificaproducto::class, 'index'])->name('productos.index');
Route::delete('/productos/{id}', [modificaproducto::class, 'eliminar'])->name('productos.eliminar');
Route::get('/productos/{id}/edit', [modificaproducto::class, 'modificar'])->name('productos.modificar');
Route::put('/productos/{id}', [modificaproducto::class, 'actualizar'])->name('productos.actualizar');



Route::get('/showShop', [UserController::class, 'showShop'])->name('showShop');


Route::get('/consultarstock', [Producto::class, 'consultarStock']);
Route::get('/productos/mas-vendidos', [Productos2Controller::class, 'masVendidos']);
Route::get('/ganancias', [GananciasController::class, 'index'])->name('ganancias.index');
Route::post('/ganancias/consultar', [GananciasController::class, 'consultar'])->name('ganancias.consultar');
Route::get('/consultar-productos', [ProConsultarController::class, 'consultarProductosPorDia'])->name('consultar.productos');
Route::get('/cliente/compramas', [ClienteCompraController::class, 'compramas']);


Route::get('/carrito/{id_usuario}', [CarritoUserController::class, 'consultarCarrito'])->name('carrito.usuario');
Route::get('/carrito', 'CarritoUserController@showShop')->name('carrito.show');



Route::get('/pago/forma-pago', [PagoController::class, 'formaPago'])->name('pago.forma_pago');
Route::get('/pago', [PagoController::class, 'index'])->name('pago');
Route::get('/pago', [PagoController::class, 'index']);
Route::get('/pago', [PagoController::class, 'showPaymentForm'])->name('show_payment_form');
Route::post('/pago', [PagoController::class, 'processPayment'])->name('process_payment');
Route::get('/pago', [PagoController::class, 'showPaymentForm'])->name('show_payment_form');
Route::post('/pago', [PagoController::class, 'processPayment'])->name('process_payment');
Route::get('/pago', [PagoController::class, 'index'])->name('pago');
Route::post('/pago', [PagoController::class, 'store'])->name('pago');
Route::get('/pago', [PagoController::class, 'showPaymentForm'])->name('pago.forma_pago');
Route::post('/pago/realizar', [PagoController::class, 'processPayment'])->name('pago.process_payment');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'showProfile'])->name('user.profile');
    Route::put('/profile', [UserProfileController::class, 'updateProfile'])->name('user.updateProfile');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'showProfile'])->name('user.profile');
    Route::put('/profile', [UserProfileController::class, 'updateProfile'])->name('user.updateProfile');
});
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/perfil', [UserController::class, 'perfil'])->name('user.profile');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile')->middleware('auth');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('productos/{id}/modificar', [ProductoController::class, 'edit'])->name('productos.modificar');
Route::post('/usuarioLogin', [userController::class, 'loginUser'])->name('usuarioLogin');


Route::get('productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');


// Ruta para mostrar el formulario de creación
Route::get('/productos/create', [NuevoProController::class, 'create'])->name('productos.create');

// Ruta para almacenar el producto
Route::post('/productos', [NuevoProController::class, 'store'])->name('productos.store');

Route::get('loginvendedor', [userController::class, 'ven'])->name('loginvendedor');
Route::get('login', [userController::class, 'log'])->name('login');
Route::get('crearcu', [userController::class, 'crearcu'])->name('crearcu');







