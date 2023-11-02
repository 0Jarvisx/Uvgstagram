<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //Validar datos
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //Autenticar al usuario
        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('status', 'Datos incorrectos, por favor verifique');
        };

        //Redireccionar al Usuario
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
