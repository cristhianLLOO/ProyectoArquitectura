<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carrito;
use App\Models\Producto;

class carritousercontroller extends Controller
{
    public function showShop()
    {
        $usuarioActual = Auth::user()->id_usuario;

        $carrito = Carrito::where('id_usuario', $usuarioActual)->get();
        $productos = [];

        $total = 0;
        foreach ($carrito as $producto) {
            $id_producto_carrito = $producto->id_producto;
            $product = Productos::where('id_producto', $id_producto_carrito)->first();

            $ganancia_producto = $product->precio * $producto->cantidad;

            $productos[] = [
                'producto' => $product,
                'ganancia' => $ganancia_producto
            ];

            $total += $ganancia_producto;
        }

        return view('usercar', compact('productos', 'total'));
    }   
}
