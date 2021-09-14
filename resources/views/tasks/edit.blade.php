@extends('layouts.app')

@section('content')
	<h1>Edycja zadania</h1>
	<form action="{{ route('tasks.update',$task->id) }}" method="POST">
		@method('put')
		@csrf
		<input type="text" name="title" value="{{ $task->title }}" placeholder="Tytuł">
		<textarea name="description" placeholder="Opis:">{{ $task->description }}</textarea>
		<button type="submit" name="submit">Prześlij</button>
	</form>
@endsection