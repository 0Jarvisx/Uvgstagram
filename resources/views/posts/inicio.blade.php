@extends('layouts.app')
@section('titulo')
    Feed
@endsection
@section('contenido')
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

       {{--  <div class="my-10">
            {{$posts->links()}}
        </div> --}}

    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>
    @endif
</section>

   

@endsection