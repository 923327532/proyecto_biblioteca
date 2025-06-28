<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
=======
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
use App\Models\Usuario;

class AuthController extends Controller
{
<<<<<<< HEAD
    // Mostrar formulario de registro
=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
    public function showRegisterForm()
    {
        return view('auth.register');
    }

<<<<<<< HEAD
    // Registro de usuario o bibliotecario
    public function register(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
        ]);

        // Por defecto es 'usuario'
        $rol = 'usuario';

        // Si hay un bibliotecario autenticado y seleccionó otro rol válido
        if (Auth::check() && Auth::user()->rol === 'bibliotecario') {
            if (in_array($request->rol, ['usuario', 'bibliotecario'])) {
                $rol = $request->rol;
            }
        }

        // Llamar procedimiento almacenado para insertar en Oracle
        try {
            DB::statement("BEGIN agregar_usuario(:nombre, :email, :password, :rol); END;", [
                'nombre'   => $request->nombre,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'rol'      => $rol
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al registrar: ' . $e->getMessage()]);
        }

        return redirect('/login')->with('success', ucfirst($rol) . ' registrado exitosamente.');
    }

    // Mostrar formulario de login
=======
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:4',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol ?? 'usuario'
        ]);

        return redirect('/login')->with('success', 'Registro exitoso. Inicia sesión.');
    }

>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
    public function showLoginForm()
    {
        return view('auth.login');
    }

<<<<<<< HEAD
    // Autenticación
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

=======
    public function login(Request $request)
    {
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }

<<<<<<< HEAD
        return back()->with('error', 'Credenciales incorrectas.');
    }

    // Logout
=======
        return back()->with('error', 'Credenciales incorrectas');
    }

>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
<<<<<<< HEAD

=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
