<!DOCTYPE html>
<html>
<head>
	<title>¡¡Bienvenido(a) {{ $rescatista -> nombre }}!!</title>
</head>
<body>
	<p>Gracias por unirte a la gran comunidad que forma parte de la plataforma <a href="{{ $ruta }}" target="_blank">AdoptaUnAmigo</a></p>
	<p>Estamos seguros de que tu participación activa en el uso de esta plataforma gratuita, le dará a tus rescatados una mayor oportunidad de encontrar el hogar que se merecen.</p>
	<p>Recuerda que <a href="{{ $ruta }}" target="_blank">AdoptaUnAmigo</a> es una plataforma altruista sin fines de lucro, por lo que te invitamnos a hacer uso responsable de ella, atendiendo los siguientes puntos:</p>
	<ol>
		<li>TODOS tus rescatados subidos a esta plataforma deberán estar esterilizados, desparacitados y contar con su cuadro completo de vacunas, <b>SIN EXCEPCIÓN.</b></li>
		<li>Esta plataforma es sólo una herramienta para facilitar y promover la adopción de tus rescatados, por lo que en ningún momento sustituye tus protocolos de adopción y seguimiento de adopciones.</li>
		<li>Con el objetivo de contribuir a la veacidad y seriedad del sitio, deberás publicar y mantener actualizado el perfil de todos tus rescatados con información verídica, así como deberás desactivar sus perfiles cuando estos sean debidamente adoptados o por algún otro motivo ya no se encuentren disponibles para adopción.</li>
		<li>Queda <b>ESTRICTAMENTE PROHIBIDO</b> utilizar esta plataforma con fines distintos a los establecidos previamente.</li>
		<li>Queda <b>ESTRICTAMENTE PROHIBIDO</b> lucrar de ninguna forma con o a través de la adopción de cualquiera de tus rescatados.</li>
		<li>Si la administración del sitio detecta anomalías de tu parte en el uso de la plataforma, serás acreedor a llamadas de atención, suspensiones temporales o bien definitivas en el uso de la misma.</li>
	</ol>
	<p>Habiendo dicho lo anterior, te informamos que tu usuario y contraseña para ingresar a la plataforma son en ambos casos el correo electrónico: {{ $rescatista -> email }}
		<br> Dado lo anterior, te invitamos a cambiar tu contraseña al momento de ingresar por primera vez al sitio por motivos de seguridad</p>
	<p>Sin más por el momento, recibe un cordial saludo de parte de la administración del sitio. Esperamos que todos tus rescatados puedan encontrar el hogar que se merecen.</p>

</body>
</html>