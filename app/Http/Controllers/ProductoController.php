<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::join('categorias', 'productos.id_categoria', 'categorias.id_categoria')
            ->select('productos.id_producto', 'productos.nombre', 'productos.precio', 'categorias.nombre AS categoria')
            ->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'       => 'required|string|max:100|unique:glamping.productos,nombre',
            'precio'       => 'required|numeric|min:0.01',
            'id_categoria' => 'required|integer|exists:glamping.categorias,id_categoria',
        ]);
        Producto::create($validated);
        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    public function edit(string $id)
    {
        $producto   = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $validated = $request->validate([
            'nombre'       => 'required|string|max:100|unique:glamping.productos,nombre,' . $id . ',id_producto',
            'precio'       => 'required|numeric|min:0.01',
            'id_categoria' => 'required|integer|exists:glamping.categorias,id_categoria',
        ]);
        $producto->update($validated);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        try {
            $producto->delete();
            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('productos.index')->with('error', 'No se puede eliminar: el producto tiene detalles de pedido asociados.');
        }
    }
}
