<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    
public function updateProfile(Request $request)
{
    $user = auth()->user();
    $user->update($request->only('nombre', 'apellido', 'telefono', 'password'));

    return redirect()->route('user.profile')->with('status', 'Perfil actualizado con éxito');
}
public function showProfile()
{
    // Obtener el usuario autenticado
    $user = auth()->user();
    
    // Obtener el historial de compras del usuario con los productos relacionados
    $historial = $user->historialCompras()->with('producto')->get();
    
    return view('user.profile', compact('user', 'historial'));
}


}
