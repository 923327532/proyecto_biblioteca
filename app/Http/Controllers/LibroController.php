<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    public function index()
    {
        $libros = DB::select("
            SELECT l.id_libro, l.titulo, l.autor, c.nombre_categoria
            FROM libros l
            JOIN categorias c ON l.id_categoria = c.id_categoria
            ORDER BY l.id_libro
        ");

        $categorias = DB::select("SELECT * FROM categorias");

        return view('libros.index', compact('libros', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'id_categoria' => 'required|numeric'
        ]);

        DB::statement("BEGIN agregar_libro(:titulo, :autor, :id_categoria); END;", [
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'id_categoria' => $request->id_categoria
        ]);

        return redirect('/libros')->with('success', 'Libro agregado');
    }

    public function update(Request $request, $id)
    {
        DB::statement("BEGIN actualizar_libro(:id, :titulo, :autor, :id_categoria); END;", [
            'id' => $id,
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'id_categoria' => $request->id_categoria
        ]);

        return redirect('/libros')->with('success', 'Libro actualizado');
    }

    public function destroy($id)
    {
        DB::statement("BEGIN eliminar_libro(:id); END;", ['id' => $id]);

        return redirect('/libros')->with('success', 'Libro eliminado');
    }
}
