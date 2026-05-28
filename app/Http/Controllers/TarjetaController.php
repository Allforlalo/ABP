<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Persona;
use App\Models\TipoTarjeta;
use App\Models\Banco;

class TarjetaController extends Controller
{
    public function index()
    {
        $tarjetas = Tarjeta::join('personas', 'tarjetas.id_persona', 'personas.id_persona')
            ->join('tipos_tarjeta', 'tarjetas.id_tipo', 'tipos_tarjeta.id_tipo')
            ->join('bancos', 'tarjetas.id_banco', 'bancos.id_banco')
            ->select('tarjetas.id_tarjeta', 'tarjetas.numero_tarjeta', 'personas.nombre', 'personas.apellido_paterno', 'tipos_tarjeta.tipo', 'bancos.nombre AS banco')
            ->get();
        return view('tarjetas.index', compact('tarjetas'));
    }

    public function create()
    {
        $personas     = Persona::orderBy('apellido_paterno')->get();
        $tiposTarjeta = TipoTarjeta::all();
        $bancos       = Banco::all();
        return view('tarjetas.create', compact('personas', 'tiposTarjeta', 'bancos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_tarjeta' => 'required|digits_between:13,19|unique:glamping.tarjetas,numero_tarjeta',
            'id_persona'     => 'required|integer|exists:glamping.personas,id_persona',
            'id_tipo'        => 'required|integer|exists:glamping.tipos_tarjeta,id_tipo',
            'id_banco'       => 'required|integer|exists:glamping.bancos,id_banco',
        ]);
        Tarjeta::create($validated);
        return redirect()->route('tarjetas.index')->with('success', 'Tarjeta registrada correctamente');
    }

    public function show(string $id)
    {
        $tarjeta = Tarjeta::findOrFail($id);
        return view('tarjetas.show', compact('tarjeta'));
    }

    public function edit(string $id)
    {
        $tarjeta      = Tarjeta::findOrFail($id);
        $personas     = Persona::orderBy('apellido_paterno')->get();
        $tiposTarjeta = TipoTarjeta::all();
        $bancos       = Banco::all();
        return view('tarjetas.edit', compact('tarjeta', 'personas', 'tiposTarjeta', 'bancos'));
    }

    public function update(Request $request, string $id)
    {
        $tarjeta = Tarjeta::findOrFail($id);
        $validated = $request->validate([
            'numero_tarjeta' => 'required|digits_between:13,19|unique:glamping.tarjetas,numero_tarjeta,' . $id . ',id_tarjeta',
            'id_persona'     => 'required|integer|exists:glamping.personas,id_persona',
            'id_tipo'        => 'required|integer|exists:glamping.tipos_tarjeta,id_tipo',
            'id_banco'       => 'required|integer|exists:glamping.bancos,id_banco',
        ]);
        $tarjeta->update($validated);
        return redirect()->route('tarjetas.index')->with('success', 'Tarjeta actualizada correctamente');
    }

    public function destroy(string $id)
    {
        $tarjeta = Tarjeta::findOrFail($id);
        $tarjeta->delete();
        return redirect()->route('tarjetas.index')->with('success', 'Tarjeta eliminada correctamente');
    }
}
