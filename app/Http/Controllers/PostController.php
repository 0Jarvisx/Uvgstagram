<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //Metodo para que solo los usuarios autenticados pueden ver puedan ver este controllador
    public function __construct()
    {
        $this->middleware(['auth'])->except('show', 'index');
    }


    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->paginate(2);
        
        return view('dashboard', ['user' => $user, 'posts' => $posts]);
    }
    public function inicio(User $user){
        $posts = Post::all();
        return view('posts.inicio', ['posts' => $posts, 'user'=> $user]);
    }
    public function create()
    {
    return view('posts.create');
    }

    public function store(Request $request){
        //validar
        $this->validate($request,[
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        //Guardar en BD

        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion'=>$request->descripcion,
            'imagen' => $request->imagen
        ]);

        //Response

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
    return view('posts.show', [
        'post' => $post,
        'user' => $user
        ]);
    }
    public function destroy(Post $post){

        //Autorizar**
        $this->authorize('delete', $post);
        
        //Eliminar
        $post->delete();
        $imagen_path = public_path('uploads/' . $post->imagen);
        if (File::exists($imagen_path)) {
            unlink($imagen_path);
        }
        
        //redireccionar
        return redirect()->route('posts.index', auth()->user()->username);

    }

}
