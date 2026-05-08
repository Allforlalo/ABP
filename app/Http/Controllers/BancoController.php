<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banco;

class BancoController extends Controller
{
    public function index()
    {
        $bancos = Banco::all();
        return view('bancos.index', compact('bancos'));
    }

    public function create()
    {
        return view('bancos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:glamping.bancos,nombre',
        ]);
        Banco::create($validated);
        return redirect()->route('bancos.index')->with('success', 'Banco creado correctamente');
    }

    public function show(string $id)
    {
        $banco = Banco::findOrFail($id);
        return view('bancos.show', compact('banco'));
    }

    public function edit(string $id)
    {
        $banco = Banco::findOrFail($id);
        return view('bancos.edit', compact('banco'));
    }

    public function update(Request $request, string $id)
    {
        $banco = Banco::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:glamping.bancos,nombre,' . $id . ',id_banco',
        ]);
        $banco->update($validated);
        return redirect()->route('bancos.index')->with('success', 'Banco actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $banco = Banco::findOrFail($id);
        $banco->delete();
        return redirect()->route('bancos.index')->with('success', 'Banco eliminado correctamente');
    }
}
