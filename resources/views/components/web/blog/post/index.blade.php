<div>
    <h1>Listado de Post</h1>

    @foreach ($post as $p)
        <div class="card card-white mb-2">
            <h3>{{ $p->title }}</h3>
            {{-- se crea el link para enviar a la ruta del show y se envia el parametro --}}
            <a href="{{ route('web.blog.show', $p) }}">See post</a>
            <p>{{ $p->description }}</p>
        </div>
    @endforeach

    {{ $post->links() }}
</div>
