@extends('menu')

@section('contenido')
<form method="POST" id="editar_alumno" enctype="multipart/form-data" action="{{ route('Evento.update', $evento -> id_evento) }}">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}
	<div class="container" style="margin-top: 150px">
    <h1 align="center">Edición de Evento</h1>
	<div class="col-lg-12 well">
		<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 form-group" align="center"> 
						 <label for="foto" class="label-foto">
							Foto(s) del Evento
							<input type="file" name="imagen" id="imagen" placeholder="Imagen del Evento" accept="image/*" required="required">
						</label>
						<div class="preview">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="nombre">
							Nombre
							<input type="text" name="nombre" value="{{ $evento -> nombre }}" class="form-control" placeholder="Nombre(s) del Evento">
							{{ $errors -> first('nombre') }}
						</label>
					</div>
					<div class="col-sm-6 form-group"> 
						<label for="descripcion">
							Descripción
							<textarea name="descripcion" class="form-control" placeholder="Descripción del evento" cols="80">{{ $evento -> descripcion }}</textarea>
							{{ $errors -> first('descripcion') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="lugar">
							Lugar	
							<input type="text" name="lugar" value="{{ $evento -> lugar }}" class="form-control" placeholder="Lugar del evento">
							{{ $errors -> first('lugar') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="fecha">
							Fecha
							<input type="date" name="fecha" value="{{ $evento -> fecha }}" class="form-control" min="{{ date('Y-m-d') }}">
							{{ $errors -> first('fecha') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="hora">
							Hora
							<input type="text" name="hora" value="{{ $evento -> hora }}" class="form-control" placeholder="Hora del evento">
							{{ $errors -> first('hora') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="enlace">
							Enlace de Facebook
							<input type="text" name="enlace_facebook" value="{{ $evento -> enlace }}" class="form-control" placeholder="enlace del evento">
							{{ $errors -> first('enlace') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="email">
							Correo Electrónico
							<input type="email" name="email" value="{{ $evento -> email }}" class="form-control" placeholder="mail@mail.com">
							{{ $errors -> first('email') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="telefono">
							Teléfono
							<input type="text" name="telefono" value="{{ $evento -> telefono }}" class="form-control" placeholder="Teléfono de contacto">
							{{ $errors -> first('telefono') }}
						</label>
					</div>
				</div>
			<div class="row">
					<div class="col-sm-4 form-group">
						<label for="donativos_alimento">
							Ene el evento se reciben también donaciones de alimento<br>
							<input type="radio" name="donativos_alimento" value="true" @if($evento -> donativos_alimento == true) checked="checked" @endif>Sí<br>
							<input type="radio" name="donativos_alimento" value="false" @if($evento -> donativos_alimento == false) checked="checked" @endif>No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="donativos_objetos">
							Ene el evento se reciben también donaciones de ropa, correas, casas, etc.<br>
							<input type="radio" name="donativos_objetos" value="true" @if($evento -> donativos_objetos == true) checked="checked" @endif>Sí<br>
							<input type="radio" name="donativos_objetos" value="false" @if($evento -> donativos_objetos == false) checked="checked" @endif>No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="donativos_juguetes">
							Ene el evento se reciben también donaciones de juguetes<br>
							<input type="radio" name="donativos_juguetes" value="true" @if($evento -> donativos_juguetes == true) checked="checked" @endif>Sí<br>
							<input type="radio" name="donativos_juguetes" value="false" @if($evento -> donativos_juguetes == false) checked="checked" @endif>No
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="donativos_efectivo">
							Ene el evento se reciben también donaciones de dinero en efectivo<br>
							<input type="radio" name="donativos_efectivo" value="true" @if($evento -> donativos_efectivo == true) checked="checked" @endif>Sí<br>
							<input type="radio" name="donativos_efectivo" value="false" @if($evento -> donativos_efectivo == false) checked="checked" @endif>No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="donativos_paseos">
							Ene el evento se reciben también donaciones de paseos para los rescatados<br>
							<input type="radio" name="donativos_paseos" value="true" @if($evento -> donativos_paseos == true) checked="checked" @endif>Sí<br>
							<input type="radio" name="donativos_paseos" value="false" @if($evento -> donativos_paseos == false) checked="checked" @endif>No
						</label>
					</div>
				</div>
		</div>
	</div>	
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_editar_alumno" class="btn btn-primary">Enviar</button>
				<a href="{{ route('Amigo.index') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>		
	</div>
</div>
</form>

<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
	input[type="text"] {
    	width: 300px;
	}
	input[type="email"] {
    	width: 300px;
	}
</style>
<script>
	$(function(){
    // your logic here`enter code here`
		$("#papa").hide();
		$("#mama").hide();
		estatuspapa = $('#id_papa').find('option:selected').val();
		if(estatuspapa == 1){
			$(document).ready(function(){
				deshabilitarPadre();
			});
		}else if(estatuspapa == 3){
			$(document).ready(function(){
				deshabilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			});
		}else if(estatuspapa == 2){
			$(document).ready(function(){
				habilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			});
		}else{
			$(document).ready(function(){
				deshabilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			});
		}
		
		estatusmama = $('#id_mama').find('option:selected').val();
		if(estatusmama == 1){
			$(document).ready(function(){
				deshabilitarMadre();
			});
		}else if(estatusmama == 3){
			$(document).ready(function(){
				deshabilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			});
		}else if(estatusmama == 2){
			$(document).ready(function(){
				habilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			});
		}else{
			$(document).ready(function(){
				deshabilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			});
		}

    	///////////logica en cambios
    	$("#boton_editar_alumno").click(function(){
    		$("#editar_alumno").submit();
    	});

		$('#id_estado').on('change', function(e){
			var estado = e.target.value;
			$.get('/ajax-getMunicipio?id_estado='+estado, function(data){
				$('#id_estado_municipio').empty();
				$('#id_estado_municipio').append('<option value="0">Seleccione un Municipio</option>');
				$.each(data, function(create, municipio){
					$('#id_estado_municipio').append('<option value="'+municipio.id_estado_municipio+'">'+municipio.municipio+'</option>');
				});
			});
		});

		$('#id_papa').change( function (){
			estatuspapa = $(this).find('option:selected').val();
			if(estatuspapa == 1){
				deshabilitarPadre();
				$("#id_padre_trabajador").val(0);
			}else if(estatuspapa == 3){
				deshabilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			}else if(estatuspapa == 2){
				habilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			}else{
				$(document).ready(function(){
					deshabilitarPadre();
					$("#campo_padre_trabajador").hide();
					$("#id_padre_trabajador").val(0);
				});
			}
		});

		$('#id_mama').change( function (){
			estatusmama = $(this).find('option:selected').val();
			if(estatusmama == 1){
				deshabilitarMadre();
				$("#id_madre_trabajadora").val(0);
			}else if(estatusmama == 3){
				deshabilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			}else if(estatusmama == 2){
				habilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			}else{
				$(document).ready(function(){
					deshabilitarMadre();
					$("#campo_madre_trabajadora").hide();
					$("#id_madre_trabajadora").val(0);
				});
			}
		});
	});

	function deshabilitarPadre(){
		$("#nombre_padre").val('NA');
		$("#a_paterno_padre").val('NA');
		$("#a_materno_padre").val('NA');
		$("#curp_padre").val('NANANANANANANANANA');
		$("#empleo_padre").val('NA');
		$("#puesto_padre").val('NA');
		$("#direccion_laboral_padre").val('NA');
		$("#telefono_laboral_padre").val('11111');
		$("#celular_padre").val('11111');
		$("#nextel_padre").val('11111');
		$("#email_padre").val('NA@GMAIL.COM');
		$("#confirmar_email_padre").val('NA@GMAIL.COM');
		$("#campo_padre_trabajador").show();
		//$("#id_padre_trabajador").val('0');
		$("#papa").hide();
	}
	function deshabilitarMadre(){
		$("#nombre_madre").val('NA');
		$("#a_paterno_madre").val('NA');
		$("#a_materno_madre").val('NA');
		$("#curp_madre").val('NANANANANANANANANA');
		$("#empleo_madre").val('NA');
		$("#puesto_madre").val('NA');
		$("#direccion_laboral_madre").val('NA');
		$("#telefono_laboral_madre").val('11111');
		$("#celular_madre").val('11111');
		$("#nextel_madre").val('11111');
		$("#email_madre").val('NA@GMAIL.COM');
		$("#confirmar_email_madre").val('NA@GMAIL.COM');
		$("#campo_madre_trabajadora").show();
		//$("#id_madre_trabajadora").val('0');
		$("#mama").hide();
	}
	function habilitarPadre(){
		if($("#nombre_padre").val()=='NA')
			$("#nombre_padre").val('');
		if($("#a_paterno_padre").val()=='NA')
			$("#a_paterno_padre").val('');
		if($("#a_materno_padre").val()=='NA')
			$("#a_materno_padre").val('');
		if($("#curp_padre").val()=='NANANANANANANANANA')
			$("#curp_padre").val('');
		if($("#empleo_padre").val()=='NA')
			$("#empleo_padre").val('');
		if($("#puesto_padre").val()=='NA')
			$("#puesto_padre").val('');
		if($("#direccion_laboral_padre").val()=='NA')
			$("#direccion_laboral_padre").val('');
		if($("#telefono_laboral_padre").val()=='11111')
			$("#telefono_laboral_padre").val('');
		if($("#celular_padre").val()=='11111')
			$("#celular_padre").val('');
		if($("#nextel_padre").val()=='11111')
			$("#nextel_padre").val('');
		if($("#email_padre").val()=='NA@GMAIL.COM')
			$("#email_padre").val('');
		if($("#confirmar_email_padre").val()=='NA@GMAIL.COM')
			$("#confirmar_email_padre").val('');
		$("#id_padre_trabajador").val('0');
		$("#papa").show();	
	}
	function habilitarMadre(){
		if($("#nombre_madre").val()=='NA')
			$("#nombre_madre").val('');
		if($("#a_paterno_madre").val()=='NA')
			$("#a_paterno_madre").val('');
		if($("#a_materno_madre").val()=='NA')
			$("#a_materno_madre").val('');
		if($("#curp_madre").val()=='NANANANANANANANANA')
			$("#curp_madre").val('');
		if($("#empleo_madre").val()=='NA')
			$("#empleo_madre").val('');
		if($("#puesto_madre").val()=='NA')
			$("#puesto_madre").val('');
		if($("#direccion_laboral_madre").val()=='NA')
			$("#direccion_laboral_madre").val('');
		if($("#telefono_laboral_madre").val()=='11111')
			$("#telefono_laboral_madre").val('');
		if($("#celular_madre").val()=='11111')
			$("#celular_madre").val('');
		if($("#nextel_madre").val()=='11111')
			$("#nextel_madre").val('');
		if($("#email_madre").val()=='NA@GMAIL.COM')
			$("#email_madre").val('');
		if($("#confirmar_email_madre").val()=='NA@GMAIL.COM')
			$("#confirmar_email_madre").val('');
		$("#id_madre_trabajadora").val('0');
		$("#mama").show();	
	}
</script>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection