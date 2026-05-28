<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB;

class MisPedidosController extends Controller
{
    public function clienteView(Request $request)
    {
        $clientes = Cliente::join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->orderBy('personas.apellido_paterno')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.apellido_paterno')
            ->get();

        $pedidos    = collect();
        $seleccionado = $request->id_cliente;

        if ($seleccionado) {
            $pedidos = DetallePedido::join('productos', 'detalles_pedido.id_producto', 'productos.id_producto')
                ->where('detalles_pedido.id_cliente', $seleccionado)
                ->select('productos.nombre AS producto', DB::raw('SUM(detalles_pedido.cantidad) AS total'), DB::raw('SUM(detalles_pedido.cantidad * productos.precio) AS precio_total'))
                ->groupBy('detalles_pedido.id_producto', 'productos.nombre')
                ->orderBy('productos.nombre')
                ->get();
        }

        return view('mis_pedidos.cliente', compact('clientes', 'pedidos', 'seleccionado'));
    }

    public function resumen()
    {
        $filas = DetallePedido::join('clientes', 'detalles_pedido.id_cliente', 'clientes.id_cliente')
            ->join('personas', 'clientes.id_persona', 'personas.id_persona')
            ->join('productos', 'detalles_pedido.id_producto', 'productos.id_producto')
            ->select(
                'clientes.id_cliente',
                'personas.apellido_paterno',
                'personas.nombre',
                'productos.nombre AS producto',
                DB::raw('SUM(detalles_pedido.cantidad) AS total'),
                DB::raw('SUM(detalles_pedido.cantidad * productos.precio) AS precio_total')
            )
            ->groupBy('clientes.id_cliente', 'personas.apellido_paterno', 'personas.nombre', 'detalles_pedido.id_producto', 'productos.nombre')
            ->orderBy('personas.apellido_paterno')
            ->orderBy('personas.nombre')
            ->orderBy('productos.nombre')
            ->get()
            ->groupBy('id_cliente');

        return view('mis_pedidos.resumen', compact('filas'));
    }
}
