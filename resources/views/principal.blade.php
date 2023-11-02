@extends('layouts.app') {{-- Estamos importando app.blade.php El punto indica que entramos a la carpeta layouts   --}}


<h1>
    @section('titulo')
        Que es UvgStagram?
    @endsection()
</h1>

<p>
    @section('contenido')
    <div class="p-5">
        <div class="shadow bg-white p-5 mb-5">
            <p class="text-xl font-bold text-center mb-4">
                UvgStagram es un proyecto realizado en el curso de Programación Web II. Este es un clon de la red social
                Instagram
                desarrollado
                en:
            </p>
            <div class="text-center">
                <span class="text-black font-mono">
                    - Laravel PHP
                    - Tailwindcss
                    - Docker
                </span>
            </div>
        </div>
    </div>
@endsection()
</p>
