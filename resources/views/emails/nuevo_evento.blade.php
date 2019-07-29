<!DOCTYPE html>
<html>
<head>
	<title>Te invitamos a asistir a {{ $evento -> nombre }}</title>
</head>
<body>
	<p>Acompáñanos en {{ $evento -> nombre }} y conoce a un(a) nuevo(a) amigo(a) para toda la vida.</p>
	<h4>{{ $evento -> descripcion }}</h4>
	<a href="{{ $ruta.'/evento-single/'.$evento -> id_evento }}" target="_blank">Conoce más de {{ $evento -> nombre }} </a>
	<img src="{{ $message -> embed(storage_path('app/'.$evento -> imagen)) }}" alt="" style="background-size: contain; width: 200px; height: 300px;">
</body>
</html>