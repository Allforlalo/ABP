<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Empleado;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::join('clientes', 'pedidos.id_cliente', 'clientes.id_cliente')
            ->join('personas as p_cliente', 'clientes.id_persona', 'p_cliente.id_persona')
            ->join('empleados', 'pedidos.id_empleado', 'empleados.id_empleado')
            ->join('personas as p_empleado', 'empleados.id_persona', 'p_empleado.id_persona')
            ->select('pedidos.id_pedido', 'pedidos.fecha_hora', 'p_cliente.nombre AS nombre_cliente', 'p_cliente.apellido_paterno AS ap_cliente', 'p_empleado.nombre AS nombre_empleado', 'p_empleado.apellido_paterno AS ap_empleado')
            ->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes  = Cliente::join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        $empleados = Empleado::join('personas', 'empleados.id_persona', 'personas.id_persona')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        return view('pedidos.create', compact('clientes', 'empleados'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cliente'  => 'required|integer|exists:glamping.clientes,id_cliente',
            'id_empleado' => 'required|integer|exists:glamping.empleados,id_empleado',
            'fecha_hora'  => 'required|date',
        ]);
        Pedido::create($validated);
        return redirect()->route('pedidos.index')->with('success', 'Pedido creado correctamente');
    }

    public function show(string $id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(string $id)
    {
        $pedido    = Pedido::findOrFail($id);
        $clientes  = Cliente::join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        $empleados = Empleado::join('personas', 'empleados.id_persona', 'personas.id_persona')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        return view('pedidos.edit', compact('pedido', 'clientes', 'empleados'));
    }

    public function update(Request $request, string $id)
    {
        $pedido = Pedido::findOrFail($id);
        $validated = $request->validate([
            'id_cliente'  => 'required|integer|exists:glamping.clientes,id_cliente',
            'id_empleado' => 'required|integer|exists:glamping.empleados,id_empleado',
            'fecha_hora'  => 'required|date',
        ]);
        $pedido->update($validated);
        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente');
    }
}
