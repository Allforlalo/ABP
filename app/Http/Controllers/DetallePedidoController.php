<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use App\Models\Cliente;
use App\Models\Producto;

class DetallePedidoController extends Controller
{
    public function index()
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
        return view('detalles_pedido.index', compact('detalles'));
    }

    public function create()
    {
        $clientes = Cliente::join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->orderBy('personas.apellido_paterno')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        $productos = Producto::all();
        return view('detalles_pedido.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_cliente'  => 'required|integer|exists:glamping.clientes,id_cliente',
            'id_producto' => 'required|integer|exists:glamping.productos,id_producto',
            'cantidad'    => 'required|integer|min:1|max:999',
        ]);
        DetallePedido::create($validated);

        if (auth()->check()) {
            return redirect()->route('detalles_pedido.index')->with('success', 'Pedido registrado correctamente');
        }
        return redirect()->route('mis_pedidos.cliente', ['id_cliente' => $validated['id_cliente']])->with('success', '¡Tu pedido fue registrado!');
    }

    public function show(string $id)
    {
        $detalle = DetallePedido::findOrFail($id);
        return view('detalles_pedido.show', compact('detalle'));
    }

    public function edit(string $id)
    {
        $detalle  = DetallePedido::findOrFail($id);
        $clientes = Cliente::join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->orderBy('personas.apellido_paterno')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.apellido_paterno')
            ->get();
        $productos = Producto::all();
        return view('detalles_pedido.edit', compact('detalle', 'clientes', 'productos'));
    }

    public function update(Request $request, string $id)
    {
        $detalle = DetallePedido::findOrFail($id);
        $validated = $request->validate([
            'id_cliente'  => 'required|integer|exists:glamping.clientes,id_cliente',
            'id_producto' => 'required|integer|exists:glamping.productos,id_producto',
            'cantidad'    => 'required|integer|min:1|max:999',
        ]);
        $detalle->update($validated);
        return redirect()->route('detalles_pedido.index')->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $detalle = DetallePedido::findOrFail($id);
        $detalle->delete();
        return redirect()->route('detalles_pedido.index')->with('success', 'Pedido eliminado correctamente');
    }
}
