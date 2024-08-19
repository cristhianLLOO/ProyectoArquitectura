<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class modificaproducto extends Controller
{
    public function index()
    {
        $productos = Productos::all(); // Obtener todos los productos
        return view('modificarpro', compact('productos'));
    }

    public function eliminar($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }

    public function modificar($id)
    {
        $producto = Productos::findOrFail($id);
        return view('productomodi', compact('producto'));
    }

    public function actualizar(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('create'); // Cambia 'create' por el nombre real de tu vista
    }

    // Método para almacenar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'imagen_url' => 'nullable|url',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'categoria' => 'required|string',
            'stock' => 'required|integer',
        ]);

        $path = null;
        $url = null;

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $url = Storage::url($path);
        } elseif ($request->imagen_url) {
            $url = $request->imagen_url;
            $path = basename($url);
        }

        Productos::create([
            'nombre_archivo_imagen' => $path,
            'path_imagen' => $url,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria' => $request->categoria,
            'stock' => $request->stock,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto guardado con éxito.');
    }
}
