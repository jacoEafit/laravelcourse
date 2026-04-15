<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class productApiControllerPost extends Controller
{
    /**
     * Store a newly created product.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        // Crear el producto
        $product = Product::create($validated);

        // Respuesta en JSON
        return response()->json([
            'message' => 'Producto creado exitosamente',
            'data'    => $product
        ], 201);
    }
}