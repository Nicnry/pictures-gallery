@extends('layouts.app')

@section('content')
<h1>Gallery : {{$gallery->name}}</h1>
<p>Le créateur est : {{$gallery->author}}</p>
@endsection
