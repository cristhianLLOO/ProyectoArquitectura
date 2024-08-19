<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use Illuminate\Database\QueryException;

class ControllerProveedor extends Controller
{
    /**
     * Muestra una lista de proveedores.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los proveedores desde la base de datos
        $proveedores = Proveedor::all();

        // Retornar la vista con la lista de proveedores
        return view('proveview', compact('proveedores'));
    }

    /**
     * Almacena un nuevo proveedor en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:proveedores,email',
            'delivery_date' => 'required|date',
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
        ]);

        try {
            // Creación de un nuevo proveedor
            Proveedor::create($validated);

            // Verifica si la solicitud es AJAX y devuelve JSON
            if ($request->ajax()) {
                return response()->json(['message' => 'Proveedor agregado exitosamente.'], 200);
            }

            // Para solicitudes normales, redirecciona de vuelta con un mensaje de éxito
            return redirect()->route('proveedores.index')->with('message', 'Proveedor agregado exitosamente');

        } catch (QueryException $e) {
            // Manejo de errores de base de datos, como la duplicación de entradas
            if ($e->getCode() == '23000') {
                // Código de error para duplicación de clave única
                return response()->json(['message' => 'Error: El email ya está registrado.'], 400);
            }

            // Para otros errores de base de datos
            return response()->json(['message' => 'Error al agregar el proveedor.'], 500);
        }
    }

    /**
     * Muestra el formulario para crear un nuevo proveedor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorna la vista 'proveedor.blade.php'
        return view('proveedor');
    }
}
