<?php
<<<<<<< HEAD
=======

>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
<<<<<<< HEAD
    // Mostrar todas las categorías
=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
    public function index()
    {
        $categorias = DB::select("SELECT * FROM categorias ORDER BY id_categoria");
        return view('categorias.index', compact('categorias'));
    }

<<<<<<< HEAD
    // Agregar nueva categoría (usando el paquete)
=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string'
        ]);

<<<<<<< HEAD
        DB::statement("BEGIN pkg_categorias.agregar_categoria(:nombre); END;", [
=======
        DB::statement("BEGIN agregar_categoria(:nombre); END;", [
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
            'nombre' => $request->nombre_categoria
        ]);

        return redirect('/categorias')->with('success', 'Categoría agregada');
    }

<<<<<<< HEAD
    // Eliminar categoría (usando el paquete)
    public function destroy($id)
    {
        DB::statement("BEGIN pkg_categorias.eliminar_categoria(:id); END;", [
            'id' => $id
        ]);

=======
    public function destroy($id)
    {
        DB::statement("BEGIN eliminar_categoria(:id); END;", ['id' => $id]);
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
        return redirect('/categorias')->with('success', 'Categoría eliminada');
    }
}
