<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carrito;
use App\Models\Productos;

class PagoController extends Controller
{
    // Muestra la vista de selección de método de pago
    public function showPaymentForm()
    {
        return view('pago.forma_pago');
    }

    // Procesa el pago y muestra el ticket
    public function processPayment(Request $request)
    {
        $metodoPago = $request->input('metodo_pago');
        $fechaPago = now()->toDateTimeString();
        $monto = 0;

        // Obtener el ID del usuario autenticado
        $usuarioId = auth()->id(); // Asegúrate de que el usuario esté autenticado

        // Obtener los productos del carrito del usuario
        $carritoItems = carrito::where('id_usuario', $usuarioId)->get();

        $productos = [];
        foreach ($carritoItems as $item) {
            $producto = Productos::find($item->id_producto);
            if ($producto) {
                $subtotal = $producto->precio * $item->cantidad;
                $productos[] = [
                    'nombre' => $producto->nombre,
                    'precio' => $producto->precio,
                    'cantidad' => $item->cantidad,
                    'subtotal' => $subtotal
                ];
                $monto += $subtotal;
            }
        }

        $empresa = 'Mi Empresa';
        $logo = asset('images/LOGOD&M.webp');
        $codigoBarras = '123456789012'; // Genera un código real si es necesario

        return view('pago.ticket', [
            'metodoPago' => $metodoPago,
            'fechaPago' => $fechaPago,
            'monto' => $monto,
            'productos' => $productos,
            'empresa' => $empresa,
            'logo' => $logo,
            'codigoBarras' => $codigoBarras
        ]);
    }
}
