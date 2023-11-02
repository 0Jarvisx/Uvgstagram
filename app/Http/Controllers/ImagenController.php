<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //Metodo para procesar las imagenes que se suban
    public function store(Request $request)
    {
        $imagen = $request->file('file');
        $nombreImagen= Str::uuid() . '.' . $imagen->extension();

        //Utilizar Intervencion Image
        $imagenServidor = Image::make($imagen)->fit(1000,1000);

        //Mover la imagen al servidor
        $imagenPath = public_path('uploads'). '/' . $nombreImagen;
        //Subir imagen
        $imagenServidor->save($imagenPath);
        
        return response()->json(['imagen' => $nombreImagen]);
    }

}
