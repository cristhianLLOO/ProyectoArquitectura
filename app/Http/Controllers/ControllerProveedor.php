<?php

namespace App\Http\Controllers;
use app\Models\proveedor;

use Illuminate\Http\Request;

class ControllerProveedor extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'entrega' => 'required|date',
            'product' => 'required|string|max:255',
            'cantidad' => 'required|integer',
        ]);

        // Crear un nuevo proveedor
        $proveedor = Proveedor::create($request->all());

        // Retornar una respuesta de éxito
        return response()->json(['message' => 'Proveedor agregado exitosamente'], 201);
    }
}
