@extends('layouts.app')

@section('content')
	@if(Session::has('success'))
		<p>{{Session::get('success')}}</p>
	@endif
	<h1>Wszystkie zadania</h1>
	<div id="add">
		<a href=" {{route('tasks.create') }}">Dodaj nowe zadanie</a>
	</div>
	@if(count($tasks) > 0)
		<table>
			<tr>
				<th>Miniaturka</th>
				<th>Tytuł</th>
				<th>OPIS</th>
				<th>Edytuj</th>
				<th>Usuń</th>
			</tr>
			@foreach($tasks as $task)
				<tr>
				<td><img alt="Grafika – miniaturka do zadania" src="{{ asset($task->image) }}"></td>
					<td><a href="tasks/show/{{ $task->slug }}" id="task_title">{{ $task->title }}</a></td>
					<td>{{$task->description}}</td>
					<td><a href="{{ route('tasks.edit',$task->id) }}">Edytuj</a></td>
					<td><a href="{{ route('tasks.destroy',$task->id) }}">Usuń</a></td>
				</tr>
			@endforeach
		</table>
	@else
		<p>Nie dodano jeszcze żadnych zadań</p>
	@endif
@endsection