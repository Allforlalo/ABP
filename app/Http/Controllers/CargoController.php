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
            'nombre' => 'required|string|max:100|unique:glamping.cargos,nombre',
        ]);
        Cargo::create($validated);
        return redirect()->route('cargos.index')->with('success', 'Cargo creado correctamente');
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
            'nombre' => 'required|string|max:100|unique:glamping.cargos,nombre,' . $id . ',id_cargo',
        ]);
        $cargo->update($validated);
        return redirect()->route('cargos.index')->with('success', 'Cargo actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        $cargo->delete();
        return redirect()->route('cargos.index')->with('success', 'Cargo eliminado correctamente');
    }
}
