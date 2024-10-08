@extends('dashboard.layout')

@section('content')
    {{-- //Link para crear posts, se coloca la ruta de donde se realiza la accion --}}
    <a class="btn btn-succes my-3 " href="{{ route('post.create') }}">Create</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Titulo
                </th>
                <th>
                    Categoria
                </th>
                <th>
                    Posted
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td>
                        {{ $p->title }}
                    </td>
                    <td>
                        {{$p->category->title}}
                    </td>
                    <td>
                        {{ $p->posted }}
                    </td>
                    <td>
                        <a class="btn btn-primary my-2"  href="{{ route('post.edit', $p) }}">Edit</a>
                        <a class="btn btn-primary my-2"  href="{{ route('post.show', $p) }}">See</a>

                        <form action="{{ route('post.destroy', $p) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-danger"  type="submit">Delete</button>
                        </form>
                        

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- se agrega el metodo links para agregar los botones de paginacion --}}
    {{ $posts->links() }}
@endsection
