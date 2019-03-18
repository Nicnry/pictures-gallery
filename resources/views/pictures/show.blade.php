@extends('layouts.app')

@section('content')
<h1>Gallery : {{$picture->title}}</h1>
<p>Publiée par : {{$gallery->author}}</p>
<ul>
    <li>
        <img src="{{route('galleries.pictures.show', compact('gallery','picture'))}}">
    </li>
</ul>
@endsection
