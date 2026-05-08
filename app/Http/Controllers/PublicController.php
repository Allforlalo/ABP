<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function inicio()
    {
        $populares = DB::connection('glamping')
            ->table('productos')
            ->join('categorias', 'productos.id_categoria', '=', 'categorias.id_categoria')
            ->where('categorias.nombre', 'NOT LIKE', '%bebida%')
            ->where('categorias.nombre', 'NOT LIKE', '%cerveza%')
            ->select('productos.nombre', 'productos.precio')
            ->limit(4)
            ->get();

        $clientes = DB::connection('glamping')
            ->table('clientes')
            ->join('personas', 'clientes.id_persona', '=', 'personas.id_persona')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.apellido_paterno')
            ->get();

        return view('inicio', compact('populares', 'clientes'));
    }

    public function menu()
    {
        $productos = Producto::join('categorias', 'productos.id_categoria', 'categorias.id_categoria')
            ->select('productos.*', 'categorias.nombre AS categoria')
            ->get()
            ->groupBy('categoria');

        return view('menu', compact('productos'));
    }

    public function misPedidos(Request $request)
    {
        $id_cliente = $request->id_cliente;

        $cliente = DB::connection('glamping')
            ->table('clientes')
            ->join('personas', 'clientes.id_persona', '=', 'personas.id_persona')
            ->where('clientes.id_cliente', $id_cliente)
            ->select('personas.nombre', 'personas.apellido_paterno')
            ->first();

        $pedidos = DB::connection('glamping')
            ->table('detalles_pedido')
            ->join('pedidos', 'detalles_pedido.id_pedido', '=', 'pedidos.id_pedido')
            ->join('productos', 'detalles_pedido.id_producto', '=', 'productos.id_producto')
            ->where('pedidos.id_cliente', $id_cliente)
            ->select('pedidos.fecha_hora', 'productos.nombre', 'productos.precio', 'detalles_pedido.cantidad')
            ->get();

        return view('mis-pedidos', compact('cliente', 'pedidos'));
    }

    public function instalaciones()
    {
        return view('instalaciones');
    }
}
