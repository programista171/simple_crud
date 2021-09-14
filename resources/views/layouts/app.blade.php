<!DOCTYPE HTML>
<html lang="pl">
	<head>
		@include('layouts.styl')
		<meta charset="UTF-8">
		<link href="app.css" rel="stylesheet">
<title>Prosta lista zadań</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
<div id="zaw">
<header><h1>Podstawowa lista zadań</h1></header>
		<div id="naw">
			@include('layouts.menu')
</div>
<main>
			@yield('content')
</main>			@include('layouts.footer')
		</div>
</div>
	</body>
</html>