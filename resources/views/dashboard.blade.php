@extends('layouts.app')

@section('titulo')
    {{ $user->name }}
@endsection
@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen Usuario">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col text-center md:items-start md:justify-center py-10 md:py-10">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="form-normal"> Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="form-normal"> Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{$posts->count()}}
                    <span class="form-normal"> Post</span>
                </p>
            </div>
        </div>
    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{route('posts.show', ['post' => $post, 'user' => $user])}}">
                            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen {{ $post->titulo }}" class="hover:opacity-50 hover:bg-black hover:-z-50">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="my-10">
                {{$posts->links()}}
            </div>

        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>
        @endif
    </section>

@endsection
