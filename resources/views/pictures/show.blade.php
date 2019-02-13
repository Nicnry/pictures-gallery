@extends('layouts.app')

@section('content')
<h1>Pictures</h1>
<ul>
    @foreach ($pictures as $picture)
        <li>{{$picture->title}}</li>
        <li><img src="{{$picture->path}}" alt=""></li>
    @endforeach
</ul>
@endsection
