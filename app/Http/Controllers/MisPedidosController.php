<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Auth;

class MisPedidosController extends Controller
{
    public function index()
    {
        $id_cliente = Auth::user()->id_cliente;

        $pedidos = Pedido::join('clientes', 'pedidos.id_cliente', 'clientes.id_cliente')
            ->join('personas as p_cliente', 'clientes.id_persona', 'p_cliente.id_persona')
            ->join('empleados', 'pedidos.id_empleado', 'empleados.id_empleado')
            ->join('personas as p_empleado', 'empleados.id_persona', 'p_empleado.id_persona')
            ->where('pedidos.id_cliente', $id_cliente)
            ->select(
                'pedidos.id_pedido',
                'pedidos.fecha_hora',
                'p_empleado.nombre as nombre_empleado',
                'p_empleado.apellido_paterno as ap_empleado'
            )
            ->get();

        return view('cliente.mis_pedidos', compact('pedidos'));
    }

    public function show(string $id)
    {
        $id_cliente = Auth::user()->id_cliente;

        $pedido = Pedido::where('id_pedido', $id)
            ->where('id_cliente', $id_cliente)
            ->firstOrFail();

        $detalles = DetallePedido::join('productos', 'detalles_pedido.id_producto', 'productos.id_producto')
            ->where('detalles_pedido.id_pedido', $id)
            ->select(
                'detalles_pedido.id_detalle',
                'productos.nombre as producto',
                'productos.precio',
                'detalles_pedido.cantidad'
            )
            ->get();

        return view('cliente.mis_detalles', compact('pedido', 'detalles'));
    }
}
