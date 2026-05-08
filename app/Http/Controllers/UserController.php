<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'correo'    => 'required|email|unique:users,email',
            'contrasena' => 'required|min:8|confirmed',
            'usuario'   => 'required|in:administrador,empleado',
        ]);

        User::create([
            'name'     => $request->nombre,
            'email'    => $request->correo,
            'password' => $request->contrasena,
            'usuario'  => $request->usuario,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Cuenta creada correctamente.');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'nombre'    => 'required|string|max:255',
            'correo'    => 'required|email|unique:users,email,' . $usuario->id,
            'contrasena' => 'nullable|min:8|confirmed',
            'usuario'   => 'required|in:administrador,empleado',
        ]);

        $data = [
            'name'    => $request->nombre,
            'email'   => $request->correo,
            'usuario' => $request->usuario,
        ];

        if ($request->filled('contrasena')) {
            $data['password'] = $request->contrasena;
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('success', 'Cuenta actualizada correctamente.');
    }

    public function destroy(User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return redirect()->route('usuarios.index')->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Cuenta eliminada correctamente.');
    }
}
