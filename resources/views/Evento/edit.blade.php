@extends('menu')

@section('contenido')
<form method="POST" id="editar_evento" enctype="multipart/form-data" action="{{ route('Evento.update', $evento -> id_evento) }}">
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
							<input type="text" name="nombre" value="{{ $evento -> nombre }}" class="form-control" placeholder="Nombre(s) del Evento" required="required">
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
							<input type="text" name="lugar" value="{{ $evento -> lugar }}" class="form-control" placeholder="Lugar del evento" required="required">
							{{ $errors -> first('lugar') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="fecha">
							Fecha
							<input type="date" name="fecha" value="{{ $evento -> fecha }}" class="form-control" min="{{ date('Y-m-d') }}" required="required">
							{{ $errors -> first('fecha') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="hora">
							Hora
							<input type="text" name="hora" value="{{ $evento -> hora }}" class="form-control" placeholder="Hora del evento" required="required">
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
				<button type="submit" id="boton_editar_evento" class="btn btn-primary">Enviar</button>
				<a href="{{ route('Evento.index') }}" class="btn btn-primary">Regresar</a>
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
    	$("#boton_editar_evento").click(function(){
    		$("#editar_evento").submit();
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
	});
</script>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection