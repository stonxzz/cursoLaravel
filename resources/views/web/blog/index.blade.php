@extends('web.layout')

@section('content')

    <x-web.blog.post.index :posts="$posts">
        {{-- esto es un slot y es para enviar contenido al componente --}}
        <h1>Listado Principal de posts</h1>
    </x-index>

@endsection