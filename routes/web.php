<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
<<<<<<< HEAD
use App\Http\Controllers\ReporteController; 
use App\Http\Controllers\UsuarioController;
=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
// Reportes (solo bibliotecario)
Route::get('/reportes', [ReporteController::class, 'index'])->middleware(['auth', 'can:bibliotecario']);

// Libros
=======
// Rutas para libros
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
Route::get('/libros', [LibroController::class, 'index']);
Route::post('/libros/crear', [LibroController::class, 'store']);
Route::post('/libros/actualizar/{id}', [LibroController::class, 'update']);
Route::get('/libros/eliminar/{id}', [LibroController::class, 'destroy']);

<<<<<<< HEAD
// Préstamos
=======
// Rutas para préstamos
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
Route::get('/prestamos', [PrestamoController::class, 'index']);
Route::post('/prestamos/crear', [PrestamoController::class, 'store']);
Route::get('/prestamos/devolver/{id}', [PrestamoController::class, 'devolver']);

<<<<<<< HEAD
// Categorías
=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
Route::get('/categorias', [CategoriaController::class, 'index'])->middleware('auth');
Route::post('/categorias/crear', [CategoriaController::class, 'store'])->middleware('auth');
Route::get('/categorias/eliminar/{id}', [CategoriaController::class, 'destroy'])->middleware('auth');

<<<<<<< HEAD
// Autenticación
Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/usuarios', [UsuarioController::class, 'index'])->middleware(['auth', 'can:bibliotecario']);
Route::get('/usuarios/eliminar/{id}', [UsuarioController::class, 'destroy'])->middleware(['auth', 'can:bibliotecario']); 

// Home
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

// Test Oracle
=======
// Probar conexión a Oracle
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
Route::get('/probar-conexion', function () {
    try {
        DB::connection()->getPdo();
        return "Conexión a Oracle exitosa";
    } catch (\Exception $e) {
        return "Error de conexión: " . $e->getMessage();
    }
});
<<<<<<< HEAD
=======

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
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
