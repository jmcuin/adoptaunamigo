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
	<?php $foto_extravio = explode('&', $extravio -> fotos); ?>
	<ul style="list-style-type:none;">
    @for($i = 1; $i < count($foto_extravio); $i++)
       	<li><img src="{{ $message -> embed(storage_path('app/'.$foto_extravio[$i])) }}" alt="" style="background-size: contain; width: 200px; height: 300px;"></li>
    @endfor
	</ul>
</body>
</html>