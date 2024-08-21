<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductoVer extends Controller
{
    public function show($id_producto)
    {
        // Busca el producto por su ID
        $producto = Productos::find($id_producto);

        // Verifica si el producto existe
        if (!$producto) {
            // Si el producto no existe, puedes redirigir a una página de error o hacer cualquier otra acción
            abort(404);
        }

        // Carga la vista "ver_producto" y pasa el producto como variable
        return view('ver_producto', compact('producto'));
    }
}
