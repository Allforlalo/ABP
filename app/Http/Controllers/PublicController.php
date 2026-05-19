<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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

        return view('inicio', compact('populares'));
    }

    public function menu()
    {
        $productos = Producto::join('categorias', 'productos.id_categoria', 'categorias.id_categoria')
            ->select('productos.*', 'categorias.nombre AS categoria')
            ->get()
            ->groupBy('categoria');

        return view('menu', compact('productos'));
    }

    public function instalaciones()
    {
        return view('instalaciones');
    }
}
