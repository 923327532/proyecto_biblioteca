<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas para libros
Route::get('/libros', [LibroController::class, 'index']);
Route::post('/libros/crear', [LibroController::class, 'store']);
Route::post('/libros/actualizar/{id}', [LibroController::class, 'update']);
Route::get('/libros/eliminar/{id}', [LibroController::class, 'destroy']);

// Rutas para préstamos
Route::get('/prestamos', [PrestamoController::class, 'index']);
Route::post('/prestamos/crear', [PrestamoController::class, 'store']);
Route::get('/prestamos/devolver/{id}', [PrestamoController::class, 'devolver']);

Route::get('/categorias', [CategoriaController::class, 'index'])->middleware('auth');
Route::post('/categorias/crear', [CategoriaController::class, 'store'])->middleware('auth');
Route::get('/categorias/eliminar/{id}', [CategoriaController::class, 'destroy'])->middleware('auth');

// Probar conexión a Oracle
Route::get('/probar-conexion', function () {
    try {
        DB::connection()->getPdo();
        return "Conexión a Oracle exitosa";
    } catch (\Exception $e) {
        return "Error de conexión: " . $e->getMessage();
    }
});

// Registro
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout']);

// Home solo para usuarios autenticados
Route::get('/home', function () {
    return view('home');
})->middleware('auth');
