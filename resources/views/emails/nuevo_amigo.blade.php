<!DOCTYPE html>
<html>
<head>
	<title>Conoce a {{ $amigo -> nombre }}</title>
</head>
<body>
	<p>Conoce a {{ $amigo -> nombre }} y dale una oportunidad de tener una vida digna.</p>
	<h4>¿Ya conoces la historia de {{ $amigo -> nombre }}?</h4>
	<h4> {{ $amigo -> historia }}</h4>
	<a href="{{ $ruta.'/amigo-single/'.$amigo -> id_amigo }}" target="_blank">Conoce más de {{ $amigo -> nombre }} </a>
	
</body>
</html>