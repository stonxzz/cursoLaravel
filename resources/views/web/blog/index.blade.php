@extends('web.layout')

@section('content')
    <x-web.blog.post.index :posts="$posts">
        {{-- esto es un slot y es para enviar contenido al componente --}}
        <h1>Listado Principal de posts</h1>


        @slot('header')
            <h1>Listado principal de post -- slot con nombre</h1>
        @endslot

        @slot('footer')
            <footer>
                pie de pagina
            </footer>
        @endslot

        @slot('extra')
            Extra
        @endslot
        </x-index>
    @endsection
