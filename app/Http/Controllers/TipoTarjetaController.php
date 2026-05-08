<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoTarjeta;

class TipoTarjetaController extends Controller
{
    public function index()
    {
        $tiposTarjeta = TipoTarjeta::all();
        return view('tipos_tarjeta.index', compact('tiposTarjeta'));
    }

    public function create()
    {
        return view('tipos_tarjeta.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'required|string|max:100|unique:glamping.tipos_tarjeta,tipo',
        ]);
        TipoTarjeta::create($validated);
        return redirect()->route('tipos_tarjeta.index')->with('success', 'Tipo de tarjeta creado correctamente');
    }

    public function show(string $id)
    {
        $tipoTarjeta = TipoTarjeta::findOrFail($id);
        return view('tipos_tarjeta.show', compact('tipoTarjeta'));
    }

    public function edit(string $id)
    {
        $tipoTarjeta = TipoTarjeta::findOrFail($id);
        return view('tipos_tarjeta.edit', compact('tipoTarjeta'));
    }

    public function update(Request $request, string $id)
    {
        $tipoTarjeta = TipoTarjeta::findOrFail($id);
        $validated = $request->validate([
            'tipo' => 'required|string|max:100|unique:glamping.tipos_tarjeta,tipo,' . $id . ',id_tipo',
        ]);
        $tipoTarjeta->update($validated);
        return redirect()->route('tipos_tarjeta.index')->with('success', 'Tipo de tarjeta actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $tipoTarjeta = TipoTarjeta::findOrFail($id);
        $tipoTarjeta->delete();
        return redirect()->route('tipos_tarjeta.index')->with('success', 'Tipo de tarjeta eliminado correctamente');
    }
}
