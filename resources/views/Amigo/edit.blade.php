@extends('menu')

@section('contenido')
<form method="POST"id="editar_amigo" enctype="multipart/form-data" action="{{ route('Amigo.update', $amigo -> id_amigo) }}">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}
	<div class="container" style="margin-top: 150px">
    <h1 align="center">Edición de Amigo(a)</h1>
	<div class="col-lg-12 well">
		<div class="col-sm-12">
			<div class="row">
				<div class="form-group" align="center">
					<label for="foto">
					Foto(s) del Amigo (Preferentemente de tamaño 1920 x 960 pixeles)
					<?php 
                		$fotos = explode('&',$amigo -> fotos); 
                	?>
               		<img width="130px" src="{{ Storage::disk('s3') -> url($fotos[1]) }}"><input type="file" name="fotos[]" accept="image/*" multiple="multiple">
						{{ $errors -> first('foto') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="nombre">
						Nombre
						<input type="text" name="nombre" value="{{ $amigo -> nombre }}" class="form-control" placeholder="Nombre(s) del Alumno" required="required">
						{{ $errors -> first('nombre') }}
					</label>	
				</div>
				<div class="col-sm-4 form-group"> 
					<label for="edad">
						Edad
						<input type="text" name="edad" value="{{ $amigo -> edad }}" class="form-control" placeholder="Edad del amigo" required="required">
						{{ $errors -> first('edad') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group"> 
						<label for="id_especie">
							Especie<br>
							<select name="id_especie" id="id_especie" required="required" onchange="getRazas(this.value)">
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
						Raza (Con fines estadísticos, esta información no se publica)<br>
						<select name="id_raza" id="id_raza" required="required">
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
						<input type="text" name="caracter" id="caracter" value="{{ $amigo -> caracter }}" class="form-control" placeholder="Carácter del amigo" required="required">
						{{ $errors -> first('caracter') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="convivencia">
						Convivencia	
						<input type="text" name="convivencia" value="{{ $amigo -> convivencia }}" class="form-control" placeholder="Convive con perros, gatos, etc..." required="required">
						{{ $errors -> first('convivencia') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="recomendaciones">
						Recomendaciones
						<input type="text" name="recomendaciones" value="{{ $amigo -> recomendaciones }}" class="form-control" placeholder="Recomendaciones del amigo" required="required">
						{{ $errors -> first('recomendaciones') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 form-group">
					<label for="requisitos">
						Requisitos de Adopción
						<textarea name="requisitos" class="form-control" placeholder="Requisitos de adopción" cols="80" required="required">{{ $amigo -> requisitos }}</textarea>
						{{ $errors -> first('requisitos') }}
					</label>
				</div>
				<div class="col-sm-6 form-group">
					<label for="lugar_adopcion">
						Lugares de Adopción
						<textarea name="lugar_adopcion" class="form-control" placeholder="Lugares donde podrá ser dado en adopción" cols="80" required="required">{{ $amigo -> lugar_adopcion }}</textarea>
						{{ $errors -> first('lugar_adopcion') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 form-group">
					<label for="historia">
						Historia de Vida
						<textarea name="historia" class="form-control" placeholder="Historia de vida antes de ser rescatado" cols="160">{{ $amigo -> historia }}</textarea>
						{{ $errors -> first('historia') }}
					</label>
				</div>
			</div>
			<div class="row">
					<div class="col-sm-6 form-group"> 
						<label for="enlace_video">
							Enlace Youtube
							<input type="text" name="enlace_video" id="enlace_video" value="{{ $amigo -> enlace_video }}" class="form-control" placeholder="Enlace al video de youtube">
							{{ $errors -> first('enlace_video') }}
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
				<button type="submit" id="boton_editar_amigo" class="btn btn-primary">Enviar</button>
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
    	///////////logica en cambios
    	$("#boton_editar_amigo").click(function(){
    		$("#editar_amigo").submit();
    	});
	});

	function getRazas(e){
		var especie = e;
		$.get('/ajax-getRaza?id_especie='+especie, function(data){
			$('#id_raza').empty();
			$('#id_raza').append('<option value="0">Seleccione una Raza</option>');
			$.each(data, function(create, raza){
				$('#id_raza').append('<option value="'+raza.id_raza+'">'+raza.raza+'</option>');
			});
		});
	}
</script>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection