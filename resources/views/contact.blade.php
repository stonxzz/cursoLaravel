@extends('master')

@section('content')
    <h3>Contact view</h3>
    <p>{{ $posts[0] }}</p>

    {{-- @if ($name != 'Stonxz')
        <h3>Tu nombre no es Stonxz.</h3>
    @else
        <h3>Tu nombre es Stonxz</h3>
    @endif --}}

    {{-- <ul>
        @foreach ([1, 2, 3, 4, 5] as $element)
            <li>{{ $element }}</li>
        @endforeach
    </ul>  --}}
@endsection
