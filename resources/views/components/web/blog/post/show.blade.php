<x-alert class="mb-4" type='error' :message="$post->title" data-id='1' data-priority='medium'></x-alert>

{{-- mezcla los atributos en las clases --}}
<div {{$attributes->class(['my-5', 'bg-blue-100' => false])->merge(['id'=>'data-1'])}}>
    {{-- <div {{$attributes->merge(['class'=>'my-5', 'id'=>'data-1'])}}> --}}
    {{ $changeTitle() }}
    <h1>{{ $post->title }}</h1>
    <h1>{{ $post->created_at }}</h1>
    <h1>{{ $post->content }}</h1>
</div>
