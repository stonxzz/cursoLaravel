<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear post</title>
</head>
<body>
    <h1>Crear Post</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{route('post.store')}}" method="post">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title">

        <label for="slug">Slug</label>
        <input type="text" name="slug">
        
        <label for="">Categoria</label>
        <select name="category_id">
            {{-- el title es la key y el id es el value que se manda en el post, asi funciona ese foreach --}}
            @foreach ($categories as $title => $id)
            <option value="{{$id}}">{{$title}}</option>
            @endforeach
        </select>

        <label for="">Posted</label>
        <select name="posted">
            <option value="not">No</option>
            <option value="yes">Yes</option>
        </select>

        <label for="content">Content</label>
        <input type="text" name="content">
        
        <label for="description">Description</label>
        <input type="text" name="description">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>