<!DOCTYPE html>
<html>
<head>
	<title>Comencemos la búsqueda de {{ $extravio -> nombre }}</title>
</head>
<body>
	<h4>Una vez que encuentres a {{ $extravio -> nombre }}, por favor ingresa el código {{ $extravio -> codigo_desactivacion }} al siguiente enlace para desactivar la búsqueda: 
	<br>
	<a href="{{ $ruta.'/desactiva_extravio' }}" target="_blank">Enlace de desactivación</a>
	</h4>
</body>
</html>