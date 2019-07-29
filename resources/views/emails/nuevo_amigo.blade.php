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
	<?php $foto_amigo = explode('&', $amigo -> fotos); ?>
	<ul style="list-style-type:none;">
    @for($i = 1; $i < count($foto_amigo); $i++)
       	<li><img src="{{ $message -> embed(storage_path('app/'.$foto_amigo[$i])) }}" alt="" style="background-size: contain; width: 200px; height: 300px;"></li>
    @endfor
	</ul>
</body>
</html>