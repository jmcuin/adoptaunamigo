<!DOCTYPE html>
<html>
<head>
	<title>Conoce esta nueva forma de concentir a tu mascota con: {{ $servicio -> servicio }}</title>
</head>
<body>
	<p>{{ $servicio -> servicio }}:</p>
	<h4>{{ $servicio -> descripcion }}</h4>
	<a href="{{ $ruta.'/servicio-single/'.$servicio -> id_servicio }}" target="_blank">Conoce más de {{ $servicio -> servicio }} </a><br>
	<img src="{{ $message -> embed(storage_path('app/'.$servicio -> foto)) }}" alt="" style="background-size: contain; width: 200px; height: 300px;">
</body>
</html>