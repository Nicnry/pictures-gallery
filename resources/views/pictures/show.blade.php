@extends('layouts.app')

@section('content')
<h1>Pictures</h1>
<ul>
    @foreach ($pictures as $picture)
        <li>{{$picture->title}}</li>
        <li>{{$picture->path}}</li>
    @endforeach
</ul>
@endsection
