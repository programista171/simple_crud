@extends('layouts.app')

@section('content')
	<h1>Dodaj nowe zadanie</h1>
	<form action="{{ route('tasks.store') }}" method="POST">
		@csrf
		<p>Tytuł:</p>
		<p><input type="text" name="title" placeholder="Tytł"></p>
		<p>Opis zadania:</p>
		<p><textarea name="description" placeholder="Opis zadania"></textarea></p>
		<p>Zdjęcie</p>
		<p><input type="file" name="image"></p>
		<button type="submit" name="submit">Prześlij</button>
	</form>
@endsection