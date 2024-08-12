<?php

namespace App\Http\Controllers;

use App\Models\Notificaciones; // Importa el modelo Notificaciones
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Muestra una lista de las notificaciones.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // Obtener todas las notificaciones ordenadas por fecha de creación descendente
            $notifications = Notificaciones::orderBy('created_at', 'desc')->get();

            // Devolver las notificaciones como JSON
            return response()->json($notifications);
        } catch (\Exception $e) {
            // Devolver un error en caso de que algo falle
            return response()->json(['error' => 'Error al obtener las notificaciones'], 500);
        }
    }
}
