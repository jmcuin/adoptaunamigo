<!DOCTYPE html>
<html>
<head>
	<title>Gracias por adoptar: </title>
</head>
<body>
	<p>Gracias {{ $solicitud -> nombre_solicitante }} por darle una oportunidad a <b>{{ $amigo -> nombre }}</b> de tener una vida digna.</p>
	<h4>¿Ya conoces la historia de {{ $amigo -> nombre }}?</h4>
	<h4> {{ $amigo -> historia }}</h4>
	<a href="{{ $ruta.'/amigo-single/'.$amigo -> id_amigo }}" target="_blank">Conoce más de {{ $amigo -> nombre }} </a>
</body>
</html>