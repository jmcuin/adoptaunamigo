<!DOCTYPE html>
<html>
<head>
	<title>¿Has visto a {{ $extravio -> nombre }}?</title>
</head>
<body>
	<h4>¡¡Necesitamos tu ayuda!!
		<br>{{ $extravio -> nombre }} se ha extraviado y lo estamos buscando.</h4>
	<h5>{{ $extravio -> descripcion_evento }}</h5>
	<a href="{{ $ruta.'/extravio-single/'.$extravio -> id_extravio }}" target="_blank">Conoce los detalles</a>
	
</body>
</html>