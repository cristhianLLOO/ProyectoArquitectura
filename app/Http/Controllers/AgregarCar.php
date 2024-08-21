<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class AgregarCar extends Controller
{
    public function agregarAlCarrito(Request $request)
    {
        // Lógica para agregar el producto al carrito
        $producto = new Carrito();
        $producto->id_usuario = auth()->id(); // Aquí asumo que tienes un sistema de autenticación
        $producto->id_producto = $request->input('id_producto');
        $producto->cantidad = $request->input('cantidad');
        $producto->save();

        return redirect()->route('showShop'); // Redirecciona a la vista del carrito
    }
}
