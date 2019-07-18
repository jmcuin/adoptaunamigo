<!DOCTYPE html>
<html>
<head>
	<title>Gracias por adoptar: </title>
</head>
<body>
	<p>Gracias {{ $solicitud -> nombre_solicitante }} por darle una oportunidad a <b>{{ $amigo -> nombre }}</b> de tener una vida digna.</p>
	<h4>¿Ya conoces la historia de {{ $amigo -> nombre }}?</h4>
	<?php $foto_amigo = explode('&', $amigo -> fotos); ?>
    @for($i = 1; $i < count($foto_amigo); $i++)
        <div class="carousel-item-b">
      	   <img src="{{ $message->embed(storage_path($foto_amigo[$i])) }}" alt="" style="width: 200px; height: 200px;">
        </div>
    @endfor
	<h4> {{ $amigo -> historia }}</h4>
</body>
</html>