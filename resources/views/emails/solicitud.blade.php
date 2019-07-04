<!DOCTYPE html>
<html>
<head>
	<title>{{ $solicitud -> nombre_solicitante }} está interesado(a) en adoptar a: {{ $amigo -> nombre }}</title>
</head>
<body>
	<h3>Estimado(a) {{ $amigo -> rescatista -> nombre }}, {{ $solicitud -> nombre_solicitante }} ha manifestado su interés por adoptar a {{ $amigo -> nombre }}.</h3>
	<p>
		Por favor comunícate con {{ $solicitud -> nombre_solicitante }} al correo: {{ $solicitud -> email }} o al teléfono: {{ $solicitud -> telefono }}
	</p>
</body>
</html>