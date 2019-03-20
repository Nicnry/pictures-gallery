@extends('layouts.app')

@section('content')
<h1>Galleries</h1>
<ul>
    @foreach ($galleries as $gallery)
        <li><a href="{{route('galleries.pictures.show', $gallery->id)}}">{{$gallery->name}}</a></li>
        <img src="{{route('galleries.pictures.show', compact('gallery','picture'))}}">
    @endforeach
</ul>
@endsection
