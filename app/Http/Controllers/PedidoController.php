<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\DetallePedido;
use App\Models\Empleado;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::join('detalles_pedido', 'pedidos.id_detalle', 'detalles_pedido.id_detalle')
            ->join('clientes', 'detalles_pedido.id_cliente', 'clientes.id_cliente')
            ->join('personas AS cp', 'clientes.id_persona', 'cp.id_persona')
            ->join('productos', 'detalles_pedido.id_producto', 'productos.id_producto')
            ->join('empleados', 'pedidos.id_empleado', 'empleados.id_empleado')
            ->join('personas AS ep', 'empleados.id_persona', 'ep.id_persona')
            ->select(
                'pedidos.id_pedido',
                'cp.nombre AS nombre_cliente',
                'cp.apellido_paterno AS ap_cliente',
                'productos.nombre AS producto',
                'detalles_pedido.cantidad',
                'ep.nombre AS nombre_empleado',
                'ep.apellido_paterno AS ap_empleado',
                'pedidos.fecha_hora'
            )
            ->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $detalles = DetallePedido::join('clientes', 'detalles_pedido.id_cliente', 'clientes.id_cliente')
            ->join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->join('productos', 'detalles_pedido.id_producto', 'productos.id_producto')
            ->select(
                'detalles_pedido.id_detalle',
                'personas.nombre',
                'personas.apellido_paterno',
                'productos.nombre AS producto',
                'detalles_pedido.cantidad'
            )
            ->get();
        $empleados = Empleado::join('personas', 'empleados.id_persona', 'personas.id_persona')
            ->orderBy('personas.apellido_paterno')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        return view('pedidos.create', compact('detalles', 'empleados'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_detalle'  => 'required|integer|exists:glamping.detalles_pedido,id_detalle',
            'id_empleado' => 'required|integer|exists:glamping.empleados,id_empleado',
            'fecha_hora'  => 'required|date|after_or_equal:today',
        ]);
        Pedido::create($validated);
        return redirect()->route('pedidos.index')->with('success', 'Pedido procesado correctamente');
    }

    public function show(string $id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(string $id)
    {
        $pedido   = Pedido::findOrFail($id);
        $detalles = DetallePedido::join('clientes', 'detalles_pedido.id_cliente', 'clientes.id_cliente')
            ->join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->join('productos', 'detalles_pedido.id_producto', 'productos.id_producto')
            ->select(
                'detalles_pedido.id_detalle',
                'personas.nombre',
                'personas.apellido_paterno',
                'productos.nombre AS producto',
                'detalles_pedido.cantidad'
            )
            ->get();
        $empleados = Empleado::join('personas', 'empleados.id_persona', 'personas.id_persona')
            ->orderBy('personas.apellido_paterno')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        return view('pedidos.edit', compact('pedido', 'detalles', 'empleados'));
    }

    public function update(Request $request, string $id)
    {
        $pedido = Pedido::findOrFail($id);
        $validated = $request->validate([
            'id_detalle'  => 'required|integer|exists:glamping.detalles_pedido,id_detalle',
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
