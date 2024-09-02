@extends('web.layout')

@section('content')
    <x-alert class="mb-4" type='error' :message="$post->title" data-id='1' data-priority='medium'></x-alert>

    <x-web.blog.post.show :post="$post" class="bg-red-100" />

    <h3>Dinamico </h3>
    <x-dynamic-component component='alert' type='error' :message="$post->title" data-id='1' data-priority='medium'></x-dynamic-component>
    <x-dynamic-component component='web.blog.post.show' :post="$post" class="bg-red-100"></x-dynamic-component>
@endsection
