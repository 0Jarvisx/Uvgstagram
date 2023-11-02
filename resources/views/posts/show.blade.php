@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex ">
        <div class="md:w-1/2">

            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del Post {{ $post->titulo }}">
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @method('DELETE')
                        @csrf

                        <input type="submit" value="Eliminar Publicacion"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white mt-4 cursor-pointer">
                    </form>
                @endif
            @endauth
        </div>

        <div class="md:w-1/2 p-5">
            {{-- ICONOS --}}
            <div class="shadow bg-white p-5 mb-5">
                <div class="flex">
                    <span class="ml-[-8px]">
                        <div class="pb-[8px]  border-b-0 pl-[8px]  bg-transparent touch-manipulation border-r-0 border-l-0 box-border flex items-center cursor-pointer pr-[8px] ml-0 tap-transparent border-t-0 text-left mr-0 list-none border-bottom-0 border-top-0 no-underline outline-none"
                            role="button" tabindex="0">
                            <span class="">
                                <svg aria-label="LIKE" fill="currentColor" height="24"
                                    role="img" viewBox="0 0 24 24" width="24">
                                    <title>
                                        LIKE
                                    </title>
                                    <path
                                        d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                    </path>
                                </svg>
                            </span>
                        </div>
                    </span>
                    <span>
                        <div class="pb-[8px]  border-b-0 pl-[8px]  bg-transparent touch-manipulation border-r-0 border-l-0 box-border flex items-center cursor-pointer pr-[8px] ml-0 tap-transparent border-t-0 text-left mr-0 list-none border-bottom-0 border-top-0 no-underline outline-none" role="button" tabindex="0">
                            <div class="x6s0dn4 x78zum5 xdt5ytf xl56j7k">
                                <svg aria-label="Comentar" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                    <title>
                                        Comentar
                                    </title>
                                    <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </span>
                    <button class="pb-[8px]  border-b-0 pl-[8px]  bg-transparent touch-manipulation border-r-0 border-l-0 box-border flex items-center cursor-pointer pr-[8px] ml-0 tap-transparent border-t-0 text-left mr-0 list-none border-bottom-0 border-top-0 no-underline outline-none" type="button">
                        <div class="_abm0 _abm1">
                            <svg aria-label="Compartir publicación" class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                <title>
                                    Compartir publicación
                                </title>
                                <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2" x1="22" x2="9.218" y1="3" y2="10.083">
                                </line>
                                <polygon fill="none" points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                </polygon>
                            </svg>
                        </div>
                    </button>
                    <div class="pb-[8px]  border-b-0 pl-[8px]  bg-transparent touch-manipulation border-r-0 border-l-0 box-border flex items-center cursor-pointer pr-[8px] ml-0 tap-transparent border-t-0 text-left mr-0 list-none border-bottom-0 border-top-0 no-underline outline-none">
                        <div>
                            <div aria-disabled="false" role="button" tabindex="0" style="cursor: pointer;">
                                <div class="x1i10hfl x6umtig x1b1mbwd xaqea5y xav7gou x9f619 xe8uvvx xdj266r x11i5rnm xat24cr x1mh8g0r x16tdsg8 x1hl2dhg xggy1nq x1a2a7pz x6s0dn4 xjbqb8w x1ejq31n xd10rxx x1sy0etr x17r0tee x1ypdohk x78zum5 xl56j7k xcdnw81 xexx8yu x4uap5 x18d9i69 xkhd6sd" role="button" tabindex="0">
                                    <div class="x6s0dn4 x78zum5 xdt5ytf xl56j7k">
                                        <svg aria-label="Guardar" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                                            <title>
                                                Guardar
                                            </title>
                                            <polygon fill="none" points="20 21 12 13.44 4 21 4 3 20 3 20 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                            </polygon>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="p-1">
                    <p>0 likes</p>
                </div>
                <div>
                    <p class="mt-1">
                        {{ $post->descripcion }}
                    </p>
                    <p class="font-bold">{{ $post->user->username }}</p>
                    <p class="text-sm text-gray-500">
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                    
                </div>


                @auth
                    @if (session('mensaje'))
                        <div class="bg-green-500 text-white my-2 rounded-lg text-sm p-2 text-center uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                   
                    @if ($post->comentarios->count())
                        {{ $post->comentarios->count() }} Comentarios
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p class="">{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500"> {{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center"> No hay comentarios</p>
                    @endif
                </div>
                @auth

                    <p class="text-xl font-bold text-center mb-4">
                        Agrega un nuevo comentario
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            
                            <textarea id="comentario" name="comentario" placeholder="Descripcion de la publicacion"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500" @enderror() value="{{ old('comentario') }}"></textarea>
                            @error('comentario')
                                <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

                    </form>
                    </p>
                @endauth


            </div>
        </div>
    </div>
@endsection
