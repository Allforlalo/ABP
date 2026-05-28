<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'           => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'ine'              => 'required|alpha_num|size:18|unique:glamping.personas,ine',
        ]);
        Persona::create($validated);
        return redirect()->route('personas.index')->with('success', 'Persona creada correctamente');
    }

    public function show(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    public function edit(string $id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, string $id)
    {
        $persona = Persona::findOrFail($id);
        $validated = $request->validate([
            'nombre'           => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'ine'              => 'required|alpha_num|size:18|unique:glamping.personas,ine,' . $id . ',id_persona',
        ]);
        $persona->update($validated);
        return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente');
    }

    public function destroy(string $id)
    {
        $persona = Persona::findOrFail($id);
        try {
            $persona->delete();
            return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('personas.index')->with('error', 'No se puede eliminar: la persona tiene registros asociados (cliente, empleado o tarjeta).');
        }
    }
}
