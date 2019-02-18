@extends('layouts.app')

@section('content')
<h1>Gallery : {{$gallery->name}}</h1>
<p>Le créateur est : {{$gallery->author}}</p>
<ul>

    @foreach ($gallery->pictures as $picture)
        <li>
            <a href="{{route('galleries.pictures.show', compact('gallery', 'picture'))}}">
                {{$picture->title}}
                <img src="{{route('galleries.pictures.show', compact('gallery', 'picture'))}}">
            </a>
        </li>
    @endforeach
</ul>
@endsection
