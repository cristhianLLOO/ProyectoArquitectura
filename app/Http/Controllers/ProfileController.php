<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
        
        // Obtener los productos en el carrito del usuario con los detalles del producto
        $carrito = carrito::where('id_usuario', $user->id_usuario)->with('producto')->get();
        
        // Pasar los datos a la vista
        return view('user.profile', compact('user', 'carrito'));
    }
}

