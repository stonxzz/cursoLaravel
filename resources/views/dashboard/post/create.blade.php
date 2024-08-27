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

    <form action="{{route('post.store')}}" method="post">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title">

        <label for="slug">Slug</label>
        <input type="text" name="slug">
        
        <label for="content">Content</label>
        <input type="text" name="Content">
        
        <label for="description">Description</label>
        <input type="text" name="description">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>