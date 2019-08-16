@extends('menu')

@section('contenido')
<form method="POST" id="editar_servicio" enctype="multipart/form-data" action="{{ route('Servicio.update', $servicio -> id_servicio) }}">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}
	<div class="container" style="margin-top: 150px">
    <h1 align="center">Edición de Servicio</h1>
	<div class="col-lg-12 well">
		<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 form-group" align="center"> 
						 <label for="foto" class="label-foto">
							Imagen del Servicio
							<img width="130px" src="{{ Storage::disk('s3') -> url($servicio -> foto) }}">
							<input type="file" name="foto" id="foto" placeholder="Imagen del Servicio" accept="image/*" required="required">
						</label>
						<div class="preview">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="servicio">
							Servicio
							<input type="text" name="servicio" value="{{ $servicio -> servicio }}" class="form-control" placeholder="Servicio que se ofrece" required="required">
							{{ $errors -> first('servicio') }}
						</label>
					</div>
					<div class="col-sm-6 form-group"> 
						<label for="descripcion">
							Descripción
							<textarea name="descripcion" class="form-control" placeholder="Descripción del evento" cols="80" required="required">{{ $servicio -> descripcion }}</textarea>
							{{ $errors -> first('descripcion') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="precio">
							Precio	
							<input type="text" name="precio" value="{{ $servicio -> precio }}" class="form-control" placeholder="Costo del servicio" required="required">
							{{ $errors -> first('precio') }}
						</label>
					</div>
					<div class="col-sm-6 form-group">
						<label for="terminos_y_condiciones">
							Términos y Condiciones
							<textarea name="terminos_y_condiciones" class="form-control" placeholder="Descripción del evento" cols="80" required="required">{{ $servicio -> terminos_y_condiciones }}</textarea>
							{{ $errors -> first('terminos_y_condiciones') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="enlace">
							Enlace de Facebook
							<input type="text" name="enlace_facebook" value="{{ $servicio -> enlace_facebook }}" class="form-control" placeholder="Enlace del servicio">
							{{ $errors -> first('enlace_facebook') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="email">
							Correo Electrónico
							<input type="email" name="email" value="{{ $servicio -> email }}" class="form-control" placeholder="mail@mail.com">
							{{ $errors -> first('email') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="telefono">
							Teléfono
							<input type="text" name="telefono" value="{{ $servicio -> telefono }}" class="form-control" placeholder="Teléfono de contacto">
							{{ $errors -> first('telefono') }}
						</label>
					</div>
				</div>
		</div>
	</div>	
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_editar_servicio" class="btn btn-primary">Enviar</button>
				<a href="{{ route('Servicio.index') }}" class="btn btn-primary">Regresar</a>
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
    	$("#boton_editar_servicio").click(function(){
    		$("#editar_servicio").submit();
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