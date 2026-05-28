<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Persona;
use App\Models\Cargo;
use App\Models\Horario;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::join('personas', 'empleados.id_persona', 'personas.id_persona')
            ->join('cargos', 'empleados.id_cargo', 'cargos.id_cargo')
            ->join('horarios', 'empleados.id_horario', 'horarios.id_horario')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.apellido_paterno', 'cargos.nombre AS cargo', 'horarios.hora_entrada', 'horarios.hora_salida')
            ->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $personas = Persona::all();
        $cargos   = Cargo::all();
        $horarios = Horario::all();
        return view('empleados.create', compact('personas', 'cargos', 'horarios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_persona' => [
                'required', 'integer',
                'exists:glamping.personas,id_persona',
                'unique:glamping.empleados,id_persona',
                function ($attribute, $value, $fail) {
                    if (Cliente::where('id_persona', $value)->exists()) {
                        $fail('Esta persona ya está registrada como cliente.');
                    }
                },
            ],
            'id_cargo'   => 'required|integer|exists:glamping.cargos,id_cargo',
            'id_horario' => 'required|integer|exists:glamping.horarios,id_horario',
        ]);
        Empleado::create($validated);
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente');
    }

    public function show(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    public function edit(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        $personas = Persona::all();
        $cargos   = Cargo::all();
        $horarios = Horario::all();
        return view('empleados.edit', compact('empleado', 'personas', 'cargos', 'horarios'));
    }

    public function update(Request $request, string $id)
    {
        $empleado = Empleado::findOrFail($id);
        $validated = $request->validate([
            'id_persona' => [
                'required', 'integer',
                'exists:glamping.personas,id_persona',
                'unique:glamping.empleados,id_persona,' . $id . ',id_empleado',
                function ($attribute, $value, $fail) {
                    if (Cliente::where('id_persona', $value)->exists()) {
                        $fail('Esta persona ya está registrada como cliente.');
                    }
                },
            ],
            'id_cargo'   => 'required|integer|exists:glamping.cargos,id_cargo',
            'id_horario' => 'required|integer|exists:glamping.horarios,id_horario',
        ]);
        $empleado->update($validated);
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        try {
            $empleado->delete();
            return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('empleados.index')->with('error', 'No se puede eliminar: el empleado tiene pedidos registrados.');
        }
    }
}
