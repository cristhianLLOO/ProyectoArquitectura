<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        try {
            $products = Almacen::all();
            return response()->json($products);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los productos'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|integer',
                'status' => 'required|string|max:255',
            ]);

            $product = Almacen::create($request->all());
            return response()->json($product, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el producto'], 500);
        }
    }

    public function show($id)
    {
        try {
            $product = Almacen::findOrFail($id);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Almacen::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|integer',
                'status' => 'required|string|max:255',
            ]);

            $product->update($request->all());
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el producto'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Almacen::findOrFail($id);
            $product->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el producto'], 500);
        }
    }
}
