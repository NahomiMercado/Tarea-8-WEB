<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//agregar mas dependencias
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Funciones de nuestros controllers 
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        //validamos
        $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8|confirmed',
        ]);

        //Creamos usuario
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),

        ]);

        //Redirigir a login
        return redirect('/login')->with('success', 'Usuario creado correctamente');
    }
    
    public function showLogin(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=> 'required | email',
            'password'=> 'required',
        ]);

        //attempt /Intento de login (si todo esta bn)
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        //si no es valido nos manda atrás
        return back()->withErrors(['email'=>"Credenciales Incorrectas"])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
