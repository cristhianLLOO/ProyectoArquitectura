<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ControllerProveedor extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'delivery_date' => 'required|date',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        // Creación de un nuevo proveedor
        Proveedor::create($validated);

        // Redirección o respuesta
        return back()->with('message', 'Proveedor agregado exitosamente');
    }
}
