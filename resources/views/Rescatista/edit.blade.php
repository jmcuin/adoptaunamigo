@extends('menu')

@section('contenido')
<form method="POST" enctype="multipart/form-data" action="{{ route('Rescatista.update', $rescatista -> id_rescatista) }}">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}
<div class="container" style="margin-top: 150px">
    <h1 align="center">Edicion de Rescatista</h1>
		<div class="col-lg-12 well">
			<div class="col-sm-12" align="center">
				<div class="row" align="center">
					<div class="form-group" align="center">
						<label for="foto">
							<img width="130px" src="{{ Storage::disk('s3') -> url($rescatista -> foto) }}"><input type="file" name="foto" value="{{old('foto')}}"  placeholder="foto(s) del Alumno" accept="image/*">
							{{ $errors -> first('foto') }} 
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="nombre">
					Nombre(s)
						<input type="text" name="nombre" value="{{$rescatista -> nombre}}" class="form-control" placeholder="Nombre(s) del trabajador" required="required">
					{{ $errors -> first('nombre') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="a_paterno">
						Apellido Paterno
						<input type="text" name="a_paterno" value="{{$rescatista -> a_paterno}}" class="form-control" placeholder="Apellido del trabajador" required="required">
						{{ $errors -> first('a_paterno') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="a_materno">
						Apellido Materno
						<input type="text" name="a_materno" value="{{$rescatista -> a_materno}}" class="form-control" placeholder="Apellido del trabajador">
						{{ $errors -> first('a_materno') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="alias">
					Alias
						<input type="text" name="alias" value="{{$rescatista -> alias}}" class="form-control" placeholder="Alias del rescatista" required="required">
					{{ $errors -> first('alias') }}
					</label>
				</div>
				<div class="col-sm-6 form-group"> 
					<label for="historia">
						Historia
						<textarea name="historia" class="form-control" placeholder="Cuéntanos un poco de tu labor" cols="80">{{ $rescatista -> historia }}</textarea>
						{{ $errors -> first('historia') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="id_estado">
						Estado<br>
						<select name="id_estado" id="id_estado" onchange="getMunicipios(this.value)">
							<option value="0">Seleccione un Estado</option>
							@foreach($estados as $estado)
								<option value="{{ $estado -> id_estado }}" @if(($rescatista -> id_estado_municipio == $estado -> municipios[0] -> id_estado_municipio)) selected @endif>{{ $estado -> estado}}	
								</option>			
							@endforeach
						</select>
						{{ $errors -> first('id_estado') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="id_estado_municipio">
						Municipio<br>
						<select name="id_estado_municipio" id="id_estado_municipio" required="required">
							<option value="0">Seleccione un Municipio</option>
							<@foreach($municipios as $municipio)
								<option value="{{ $municipio-> id_estado_municipio }}" @if($rescatista -> id_estado_municipio == $municipio -> id_estado_municipio ) selected @endif>{{ $municipio -> municipio}}	
								</option>	
							@endforeach
						</select>
						{{ $errors -> first('id_estado_municipio') }}
						</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="extranjero">
						Otro
						<input type="text" name="extranjero" value="{{$rescatista -> extranjero}}" class="form-control" placeholder="Lugar de Origen del trabajador">
						{{ $errors -> first('extranjero') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="calle">
						Calle	
						<input type="text" name="calle" value="{{$rescatista -> calle}}" class="form-control" placeholder="Domicilio del trabajador" required="required">
						{{ $errors -> first('calle') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="numero_interior">
						Número Interior
						<input type="text" name="numero_interior" value="{{$rescatista -> numero_interior}}" class="form-control" placeholder="Número interior">
						{{ $errors -> first('numero_interior') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="numero_exterior">
						Número Exterior
						<input type="text" name="numero_exterior" value="{{$rescatista -> numero_exterior}}" class="form-control" placeholder="Número exterior">
						{{ $errors -> first('numero_exterior') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="colonia">
						Colonia	
						<input type="text" name="colonia" value="{{$rescatista -> colonia}}" class="form-control" placeholder="Domicilio del trabajador" required="required">
						{{ $errors -> first('colonia') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="cp">
						Código Postal
						<input type="number" name="cp" value="{{$rescatista -> cp}}" class="form-control" placeholder="Código postal del trabajador" required="required">
						{{ $errors -> first('cp') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<label for="telefono">
						Número(s) de Teléfono	
						<input type="text" name="telefono" value="{{$rescatista -> telefono}}" class="form-control" placeholder="Domicilio del trabajador" required="required">
						{{ $errors -> first('telefono') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="email">
						Correo Electrónico	
						<input type="email" name="email" id="email" value="{{$rescatista -> email}}" class="form-control" placeholder="mail@algo.com" required="required">
						{{ $errors -> first('email') }}
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="confirmaemail">
						Confirmación Correo Electrónico	
						<input type="email" name="confirmaemail" id="confirmaemail" value="{{$rescatista -> email}}" class="form-control" placeholder="mail@algo.com" required="required">
						{{ $errors -> first('confirmaemail') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 form-group">
					<label for="redes_sociales">
						Enlace de Facebook	
						<input type="text" name="redes_sociales" id="redes_sociales" value="{{ $rescatista -> redes_sociales }}" class="form-control" placeholder="Enlace al facebook del rescatista" required="required">
						{{ $errors -> first('redes_sociales') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group"> 
					<label for="es_asociacion">
						¿Es Usted parte de una asociación civil?<br>
						<input type="radio" name="es_asociacion" value="true" @if($rescatista -> es_asociacion == true ) checked="checked" @endif> Sí<br>
						<input type="radio" name="es_asociacion" value="false" @if($rescatista -> es_asociacion == false ) checked="checked" @endif> No
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<label for="id_rol">
						Rol<br>
						<select name="id_rol" required="required">
							<option value="0">Seleccione un Rol</option>
							@foreach($roles as $rol)
								<option value="{{ $rol -> id_rol }}" @if( $rescatista -> user -> roles[0] -> id_rol == $rol -> id_rol ) selected @endif>{{ $rol -> rol }}
								</option>	
							@endforeach
						</select>
						{{ $errors -> first('id_rol') }}
					</label>
				</div>
			</div>
		</div>
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<input type="submit" value="Enviar" class="btn btn-primary">
				<a href="{{ route('Rescatista.index') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>
	</div>
</div>
</form>
<script>
	$(function(){
    // your logic here`enter code here`
    	////////logica onload
    	
    	///////////logica en cambios
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

	function getMunicipios(e){
		var estado = e;
		$.get('/ajax-getMunicipio?id_estado='+estado, function(data){
			$('#id_estado_municipio').empty();
			$('#id_estado_municipio').append('<option value="0">Seleccione un Municipio</option>');
			$.each(data, function(create, municipio){
				$('#id_estado_municipio').append('<option value="'+municipio.id_estado_municipio+'">'+municipio.municipio+'</option>');
			});
		});
	}
</script>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
	input[type="text"] {
    	width: 300px;
	}
	form .label-foto {
	  padding: 5px 10px;
	  border-radius: 5px;
	  border: 1px ridge black;
	  background-color: #20193D !important;
	  height: 40px;
	  color: white;
	  cursor: pointer;
	}
</style>
@endsection