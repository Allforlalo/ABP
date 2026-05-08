<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\TipoTarjetaController;
use App\Http\Controllers\UserController;

// Públicas (clientes)
Route::get('/', [PublicController::class, 'inicio'])->name('home');
Route::get('/menu', [PublicController::class, 'menu'])->name('menu');
Route::get('/instalaciones', [PublicController::class, 'instalaciones'])->name('instalaciones');
Route::get('/mis-pedidos', [PublicController::class, 'misPedidos'])->name('mis-pedidos');

// Auth
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard (admin y empleado)
Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard')->middleware('auth');

// Solo administrador
Route::middleware(['auth', 'administrador'])->group(function () {
    Route::resource('bancos', BancoController::class);
    Route::resource('cargos', CargoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('tipos_tarjeta', TipoTarjetaController::class);
    Route::resource('horarios', HorarioController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('tarjetas', TarjetaController::class);
    Route::resource('usuarios', UserController::class);
});

// Administrador y empleado
Route::middleware(['auth', 'empleado'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::resource('detalles_pedido', DetallePedidoController::class);
});
