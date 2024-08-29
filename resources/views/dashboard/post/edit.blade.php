@extends('dashboard.layout')

@section('content')
<h1>Actualizar Post: {{$post->title}}</h1>

@include('dashboard.fragment._errors-form')

<form action="{{route('post.update',$post->id)}}" method="post">
    @csrf

    @method("PUT")
    <label for="title">Title</label>
    <input type="text" name="title" value="{{$post->title}}">

    <label for="slug">Slug</label>
    <input type="text" name="slug" value="{{$post->slug}}">
    
    <label for="">Categoria</label>
    <select name="category_id" >
        {{-- el title es la key y el id es el value que se manda en el post, asi funciona ese foreach --}}
        @foreach ($categories as $title => $id)
        <option {{$post->category_id == $id? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>

    <label for="">Posted</label>
    <select name="posted">
        <option {{$post->posted == "not" ? 'selected' : ''}} value="not">No</option>
        <option {{$post->posted == "yes" ? 'selected' : ''}} value="yes">Yes</option>
    </select>

    <label for="content">Content</label>
    <input type="text" name="content" value="{{$post->content}}">
    
    <label for="description">Description</label>
    <input type="textarea" name="description" value="{{$post->description}}">

    <button type="submit">Enviar</button>
</form>
@endsection