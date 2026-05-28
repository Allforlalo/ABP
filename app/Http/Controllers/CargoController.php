<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        return view('cargos.index', compact('cargos'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:glamping.cargos,nombre|regex:/^[\pL\s]+$/u',
        ]);
        Cargo::create($validated);
        return redirect()->route('cargos.index')->with('success', 'Nuevo cargo creado');
    }

    public function show(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        return view('cargos.show', compact('cargo'));
    }

    public function edit(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        return view('cargos.edit', compact('cargo'));
    }

    public function update(Request $request, string $id)
    {
        $cargo = Cargo::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:glamping.cargos,nombre,' . $id . ',id_cargo|regex:/^[\pL\s]+$/u',
        ]);
        $cargo->update($validated);
        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado');
    }

    public function destroy(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        try {
            $cargo->delete();
            return redirect()->route('cargos.index')->with('success', 'Cargo eliminado');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('cargos.index')->with('error', 'No se puede eliminar: hay empleados asignados a este cargo.');
        }
    }
}
