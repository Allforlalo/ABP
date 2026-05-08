<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;
use App\Models\Pedido;
use App\Models\Producto;

class DetallePedidoController extends Controller
{
    public function index()
    {
        $detalles = DetallePedido::join('pedidos', 'detalles_pedido.id_pedido', 'pedidos.id_pedido')
            ->join('productos', 'detalles_pedido.id_producto', 'productos.id_producto')
            ->select('detalles_pedido.id_detalle', 'pedidos.id_pedido', 'pedidos.fecha_hora', 'productos.nombre AS producto', 'productos.precio', 'detalles_pedido.cantidad')
            ->get();
        return view('detalles_pedido.index', compact('detalles'));
    }

    public function create()
    {
        $pedidos   = Pedido::all();
        $productos = Producto::all();
        return view('detalles_pedido.create', compact('pedidos', 'productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pedido'   => 'required|integer|exists:glamping.pedidos,id_pedido',
            'id_producto' => 'required|integer|exists:glamping.productos,id_producto',
            'cantidad'    => 'required|integer|min:1|max:999',
        ]);
        DetallePedido::create($validated);
        return redirect()->route('detalles_pedido.index')->with('success', 'Detalle creado correctamente');
    }

    public function show(string $id)
    {
        $detalle = DetallePedido::findOrFail($id);
        return view('detalles_pedido.show', compact('detalle'));
    }

    public function edit(string $id)
    {
        $detalle   = DetallePedido::findOrFail($id);
        $pedidos   = Pedido::all();
        $productos = Producto::all();
        return view('detalles_pedido.edit', compact('detalle', 'pedidos', 'productos'));
    }

    public function update(Request $request, string $id)
    {
        $detalle = DetallePedido::findOrFail($id);
        $validated = $request->validate([
            'id_pedido'   => 'required|integer|exists:glamping.pedidos,id_pedido',
            'id_producto' => 'required|integer|exists:glamping.productos,id_producto',
            'cantidad'    => 'required|integer|min:1|max:999',
        ]);
        $detalle->update($validated);
        return redirect()->route('detalles_pedido.index')->with('success', 'Detalle actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $detalle = DetallePedido::findOrFail($id);
        $detalle->delete();
        return redirect()->route('detalles_pedido.index')->with('success', 'Detalle eliminado correctamente');
    }
}
