<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //

    public function store(Request $request, User $user, Post $post){
        
        //Validar
        $this->validate($request, [
            'comentario' => 'required|max:255',
        ]);

        //Crear
        Comentario::create([
            'comentario'=> $request->comentario,
            'user_id'=> auth()->user()->id,
            'post_id'=> $post->id,
        ]);

        //Redireccionar
        return back()->with('mensaje', 'comentario agregado correctamente');
    }

    

}
