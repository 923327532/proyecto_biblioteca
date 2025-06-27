<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = DB::select("SELECT * FROM categorias ORDER BY id_categoria");
        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string'
        ]);

        DB::statement("BEGIN agregar_categoria(:nombre); END;", [
            'nombre' => $request->nombre_categoria
        ]);

        return redirect('/categorias')->with('success', 'Categoría agregada');
    }

    public function destroy($id)
    {
        DB::statement("BEGIN eliminar_categoria(:id); END;", ['id' => $id]);
        return redirect('/categorias')->with('success', 'Categoría eliminada');
    }
}
