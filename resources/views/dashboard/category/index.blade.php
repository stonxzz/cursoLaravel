@extends('dashboard.layout')

@section('content')
    {{-- //Link para crear categorys, se coloca la ruta de donde se realiza la accion --}}
    <a class="btn btn-succes my-3" href="{{ route('category.create') }}">Create</a>

    <table class="table mb-3">
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
                        <a class="btn btn-primary mx-1" href="{{ route('category.edit', $c) }}">Edit</a>
                        <a class="btn btn-primary mx-1" href="{{ route('category.show', $c) }}">See</a>

                        <form class="btn btn-danger mx-1" action="{{ route('category.destroy', $c) }}" method="post">
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
