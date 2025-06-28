<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = DB::select("
            SELECT p.id_prestamo, p.id_libro, p.id_usuario,
                   p.fecha_prestamo, p.fecha_devolucion, p.devuelto,
                   l.titulo, u.nombre AS nombre_usuario
            FROM prestamos p
            JOIN libros l ON p.id_libro = l.id_libro
            JOIN usuarios u ON p.id_usuario = u.id_usuario
            ORDER BY p.fecha_prestamo DESC
        ");

        $libros_disponibles = DB::select("SELECT id_libro, titulo FROM libros WHERE disponible = 'S'");
        $usuarios = DB::select("SELECT id_usuario, nombre FROM usuarios");

        return view('prestamos.index', compact('prestamos', 'libros_disponibles', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_libro' => 'required|numeric',
            'id_usuario' => 'required|numeric'
        ]);

        DB::statement("BEGIN registrar_prestamo(:libro, :usuario); END;", [
            'libro' => $request->id_libro,
            'usuario' => $request->id_usuario
        ]);

        return redirect('/prestamos')->with('success', 'Préstamo registrado con éxito');
    }

    public function devolver($id)
    {
        DB::statement("BEGIN devolver_libro(:id); END;", ['id' => $id]);
        return redirect('/prestamos')->with('success', 'Libro devuelto');
    }
}

