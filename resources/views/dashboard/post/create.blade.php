@extends('dashboard.layout')

@section('content')
<h1>Crear Post</h1>

@include('dashboard.fragment._errors-form')

<form action="{{route('post.store')}}" method="post">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" value="{{old("title","sin titulo")}}">

    <label for="slug">Slug</label>
    <input type="text" name="slug" value="{{old("slug","sin slug")}}">
    
    <label for="">Categoria</label>
    <select name="category_id">
        {{-- el title es la key y el id es el value que se manda en el post, asi funciona ese foreach --}}
        @foreach ($categories as $title => $id)
        <option {{ old("category_id","") == $id ? "selected" : ""}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>

    <label for="">Posted</label>
    <select name="posted">
        <option {{ old("posted","") == "not" ? "selected" : ""}} value="not">No</option>
        <option {{ old("posted","") == "yes" ? "selected" : ""}} value="yes">Yes</option>
    </select>

    <label for="content">Content</label>
    <input type="text" name="content" value="{{old("content","sin content")}}">
    
    <label for="description">Description</label>
    <input type="text" name="description" value="{{old("description","sin description")}}">

    <button type="submit">Enviar</button>
</form>
@endsection