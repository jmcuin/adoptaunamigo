@extends('menu')

@section('contenido')
<form method="POST" id="editar_alumno" enctype="multipart/form-data" action="{{ route('Amigo.update', $amigo -> id_amigo) }}">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}
	<div class="container">
    <h1 align="center">Edición de Amigo(a)</h1>
	<div class="col-lg-12 well">
		<div class="col-sm-12">
			<div class="row">
				<div class="form-group" align="center">
					<label for="foto">
					<?php 
                		$fotos = explode('&',$amigo -> fotos); 
                	?>
               		<img width="130px" src="{{ Storage::url('public/Amigos/'.$fotos[1]) }}"><input type="file" name="foto" accept="image/*">
						{{ $errors -> first('foto') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="nombre">
						Nombre
						<input type="text" name="nombre" value="{{ $amigo -> nombre }}" class="form-control" placeholder="Nombre(s) del Alumno">
						{{ $errors -> first('nombre') }}
					</label>	
				</div>
				<div class="col-sm-4 form-group"> 
					<label for="edad">
						Edad
						<input type="text" name="edad" value="{{ $amigo -> edad }}" class="form-control" placeholder="Edad del amigo">
						{{ $errors -> first('edad') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group"> 
						<label for="id_especie">
							Especie<br>
							<select name="id_especie" id="id_especie">
								<option value="0">Seleccione una Especie</option>
								<@foreach($especies as $especie)
									<option value="{{ $especie -> id_especie }}" @if($amigo -> id_especie == $especie -> id_especie ) selected @endif>{{ $especie -> especie}}	
									</option>	
								@endforeach
							</select>
							{{ $errors -> first('id_especie') }}
						</label>
				</div>
				<div class="col-sm-4 form-group"> 
					<label for="id_raza">
						Raza<br>
						<select name="id_raza" id="id_raza">
							<option value="0">Seleccione una Raza</option>
							@foreach($razas as $raza)
								<option value="{{ $raza -> id_raza }}" @if($amigo -> id_raza == $raza -> id_raza ) selected @endif>{{ $raza -> raza}}	
								</option>	
							@endforeach
						</select>
						{{ $errors -> first('id_raza') }}
					</label>
				</div>
				<div class="col-sm-4 form-group"> 
					<label for="tamanio">
						Tamaño<br>
						<select name="tamanio" id="tamanio">
							<option value="0">Seleccione un Tamaño</option>
							<option value="Miniatura" @if($amigo -> tamanio == 'Miniatura') selected @endif>Miniatura</option>
							<option value="Chico" @if($amigo -> tamanio == 'Chico') selected @endif>Chico</option>
							<option value="Mediano" @if($amigo -> tamanio == 'Mediano') selected @endif>Mediano</option>
							<option value="Grande" @if($amigo -> tamanio == 'Grande') selected @endif>Grande</option>
						</select>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group"> 
					<label for="alias">
						Carácter
						<input type="text" name="caracter" id="caracter" value="{{ $amigo -> caracter }}" class="form-control" placeholder="Carácter del amigo">
						{{ $errors -> first('caracter') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="convivencia">
						Convivencia	
						<input type="text" name="convivencia" value="{{ $amigo -> convivencia }}" class="form-control" placeholder="Convive con perros, gatos, etc...">
						{{ $errors -> first('convivencia') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="recomendaciones">
						Recomendaciones
						<input type="text" name="recomendaciones" value="{{ $amigo -> recomendaciones }}" class="form-control" placeholder="Recomendaciones del amigo">
						{{ $errors -> first('recomendaciones') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 form-group">
					<label for="requisitos">
						Requisitos de Adopción
						<textarea name="requisitos" class="form-control" placeholder="Requisitos de adopción" cols="80">{{ $amigo -> requisitos }}</textarea>
						{{ $errors -> first('requisitos') }}
					</label>
				</div>
				<div class="col-sm-6 form-group">
					<label for="otros">
						Otra Información
						<textarea name="otros" class="form-control" placeholder="Información adicional" cols="80">{{ $amigo -> otros }}</textarea>
						{{ $errors -> first('otros') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="solicita_adopcion">
						En Adopción<br>
						<input type="radio" name="solicita_adopcion" value="true" @if($amigo -> solicita_adopcion == true) checked="checked" @endif>Sí<br>
						<input type="radio" name="solicita_adopcion" value="false" @if($amigo -> solicita_adopcion == false) checked="checked" @endif>No
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="solicita_esterilizacion">
						Solicita Padrinos de Esterilización<br>
						<input type="radio" name="solicita_esterilizacion" value="true" @if($amigo -> solicita_esterilizacion == true) checked="checked" @endif>Sí<br>
						<input type="radio" name="solicita_esterilizacion" value="false" @if($amigo -> solicita_esterilizacion == false) checked="checked" @endif>No
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="solicita_hogar_temporal">
						Solicita Hogar Temporal<br>
						<input type="radio" name="solicita_hogar_temporal" value="true" @if($amigo -> solicita_hogar_temporal == true) checked="checked" @endif>Sí<br>
						<input type="radio" name="solicita_hogar_temporal" value="false" @if($amigo -> solicita_hogar_temporal == false) checked="checked" @endif>No
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="solicita_ayuda_medica">
						Solicita Ayuda Médica<br>
						<input type="radio" name="solicita_ayuda_medica" value="true" @if($amigo -> solicita_ayuda_medica == true) checked="checked" @endif>Sí<br>
						<input type="radio" name="solicita_ayuda_medica" value="false" @if($amigo -> solicita_ayuda_medica == false) checked="checked" @endif>No
						</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="solicita_ayuda_alimenticia">
						Solicita Ayuda Alimenticia<br>
						<input type="radio" name="solicita_ayuda_alimenticia" value="true" @if($amigo -> solicita_ayuda_alimenticia == true) checked="checked" @endif>Sí<br>
						<input type="radio" name="solicita_ayuda_alimenticia" value="false" @if($amigo -> solicita_ayuda_alimenticia == false) checked="checked" @endif>No
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