<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Persona;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno', 'personas.ine')
            ->get();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('clientes.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_persona' => [
                'required', 'integer',
                'exists:glamping.personas,id_persona',
                'unique:glamping.clientes,id_persona',
                function ($attribute, $value, $fail) {
                    if (Empleado::where('id_persona', $value)->exists()) {
                        $fail('Esta persona ya está registrada como empleado.');
                    }
                },
            ],
        ]);
        Cliente::create($validated);
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }

    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $personas = Persona::all();
        return view('clientes.edit', compact('cliente', 'personas'));
    }

    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $validated = $request->validate([
            'id_persona' => [
                'required', 'integer',
                'exists:glamping.personas,id_persona',
                'unique:glamping.clientes,id_persona,' . $id . ',id_cliente',
                function ($attribute, $value, $fail) use ($id) {
                    if (Empleado::where('id_persona', $value)->exists()) {
                        $fail('Esta persona ya está registrada como empleado.');
                    }
                },
            ],
        ]);
        $cliente->update($validated);
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}
