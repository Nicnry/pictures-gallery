@extends('layouts.app')

@section('content')
<h1>Gallery : {{$gallery->name}}</h1>
<p>Le créateur est : {{$gallery->author}}</p>
<ul>

    {{-- @foreach ($gallery->pictures as $picture)
        <li>
            <a href="{{route('galleries.pictures.show', $gallery, $picture)}}">
                {{$picture->title}}
                <img src="{{$picture->path}}" alt="{{$picture->title}}">
            </a>
        </li>
    @endforeach --}}
</ul>
@endsection
