<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::all();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        return view('horarios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida'  => 'required|date_format:H:i|after:hora_entrada',
        ]);
        Horario::create($validated);
        return redirect()->route('horarios.index')->with('success', 'Horario creado correctamente');
    }

    public function show(string $id)
    {
        $horario = Horario::findOrFail($id);
        return view('horarios.show', compact('horario'));
    }

    public function edit(string $id)
    {
        $horario = Horario::findOrFail($id);
        return view('horarios.edit', compact('horario'));
    }

    public function update(Request $request, string $id)
    {
        $horario = Horario::findOrFail($id);
        $validated = $request->validate([
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida'  => 'required|date_format:H:i|after:hora_entrada',
        ]);
        $horario->update($validated);
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado correctamente');
    }
}
