<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:glamping.categorias,nombre|regex:/^[\pL\s]+$/u',
        ]);
        Categoria::create($validated);
        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:glamping.categorias,nombre,' . $id . ',id_categoria|regex:/^[\pL\s]+$/u',
        ]);
        $categoria->update($validated);
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        try {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('categorias.index')->with('error', 'No se puede eliminar: hay productos asociados a esta categoría.');
        }
    }
}
