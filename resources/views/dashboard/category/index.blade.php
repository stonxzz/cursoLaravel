@extends('dashboard.layout')

@section('content')
    {{-- //Link para crear categorys, se coloca la ruta de donde se realiza la accion --}}
    <a href="{{ route('category.create') }}">Create</a>

    <table>
        <thead>
            <tr>
                <th>
                    Titulo
                </th>
                <th>
                    Slug
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>
                        {{ $c->title }}
                    </td>
                    <td>
                        {{$c->slug}}
                    </td>
                    <td>
                        <a href="{{ route('category.edit', $c) }}">Edit</a>
                        <a href="{{ route('category.show', $c) }}">See</a>

                        <form action="{{ route('category.destroy', $c) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                        

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- se agrega el metodo links para agregar los botones de paginacion --}}
    {{ $categories->links() }}
@endsection
