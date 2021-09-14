@extends('layouts.app')

@section('content')
	<img alt="Grafika – miniaturka do zadania" src="{{ asset($task->image) }}">
	<h2>Zadanie: {{$task->title}}</h2>
	<p>{{$task->description}}</p>
	<a href="{{ route('tasks.edit',$task->id) }}">Edytuj</a>
	<a href="{{ url(redirect()->back()) }}">Wróć</a>
@endsection