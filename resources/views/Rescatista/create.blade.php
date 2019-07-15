@extends('menu')

@section('contenido')
<form method="POST" id="registrar_rescatista" enctype="multipart/form-data" action="{{ route('Rescatista.store') }}">
	{!! csrf_field() !!}
<div class="container" style="margin-top: 150px">
    <h1 align="center">Registro de Rescatista</h1>
	<div class="col-lg-12 well">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 form-group" align="center"> 
						 <label for="foto" class="label-foto">
							Foto del Rescatista
							<input type="file" name="foto" id="foto" value="{{old('foto')}}" placeholder="Foto del rescatista" accept="image/*" required="required">
							{{ $errors -> first('foto') }}
						</label>
						<div class="preview">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="nombre">
							Nombre(s)
							<input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre(s) del rescatista">
							{{ $errors -> first('nombre') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="a_paterno">
							Apellido Paterno
							<input type="text" name="a_paterno" value="{{old('a_paterno')}}" class="form-control" placeholder="Apellido del rescatista">
							{{ $errors -> first('a_paterno') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="a_materno">
							Apellido Materno
							<input type="text" name="a_materno" value="{{old('a_materno')}}" class="form-control" placeholder="Apellido del rescatista">
							{{ $errors -> first('a_materno') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="alias">
							Alias
							<input type="text" name="alias" id="alias" value="{{old('alias')}}" class="form-control" placeholder="Alias del rescatista">
							{{ $errors -> first('alias') }}
						</label>
					</div>
					<div class="col-sm-6 form-group"> 
						<label for="historia">
							Historia
							<textarea name="historia" class="form-control" placeholder="Cuéntanos un poco de tu labor" cols="80">{{old('historia')}}</textarea>
							{{ $errors -> first('historia') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="id_estado">
							Estado<br>
							<select name="id_estado" id="id_estado">
								<option value="0">Seleccione un Estado</option>
								<@foreach($estados as $estado)
									<option value="{{ $estado -> id_estado }}" @if(old('id_estado') == $estado -> id_estado ) selected @endif>{{ $estado -> estado}}	
									</option>	
								@endforeach
							</select>
							{{ $errors -> first('id_estado') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="id_estado_municipio">
							Municipio<br>
							<select name="id_estado_municipio" id="id_estado_municipio">
								<option value="0">Seleccione un Municipio</option>
								<@foreach($municipios as $municipio)
									<option value="{{ $municipio-> id_estado_municipio }}" @if(old('id_estado_municipio') == $municipio -> id_estado_municipio ) selected @endif>{{ $municipio -> municipio}}	
									</option>	
								@endforeach
							</select>
							{{ $errors -> first('id_estado_municipio') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="extranjero">
							Otro
							<input type="text" name="extranjero" value="{{old('extranjero')}}" class="form-control" placeholder="Lugar de origen del rescatista">
							{{ $errors -> first('extranjero') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="calle">
							Calle	
							<input type="text" name="calle" value="{{old('calle')}}" class="form-control" placeholder="Domicilio del rescatista">
							{{ $errors -> first('calle') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="numero_interior">
							Número Interior
							<input type="text" name="numero_interior" value="{{old('numero_interior')}}" class="form-control" placeholder="Número interior">
							{{ $errors -> first('numero_interior') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="numero_exterior">
							Número Exterior
							<input type="text" name="numero_exterior" value="{{old('numero_exterior')}}" class="form-control" placeholder="Número exterior">
							{{ $errors -> first('numero_exterior') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="colonia">
							Colonia	
							<input type="text" name="colonia" value="{{old('colonia')}}" class="form-control" placeholder="Domicilio del rescatista">
							{{ $errors -> first('colonia') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="cp">
							Código Postal
							<input type="text" name="cp" value="{{old('cp')}}" class="form-control" placeholder="Código postal del rescatista">
							{{ $errors -> first('cp') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="telefono">
							Número(s) de Teléfono	
							<input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Domicilio del rescatista">
							{{ $errors -> first('telefono') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="email">
							Correo Electrónico	
							<input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="mail@algo.com">
							{{ $errors -> first('email') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="confirmaemail">
							Confirmación Correo Electrónico	
							<input type="email" name="confirmaemail" id="confirmaemail" value="{{old('confirmaemail')}}" class="form-control" placeholder="mail@algo.com">
							{{ $errors -> first('confirmaemail') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label for="redes_sociales">
							Enlace de Facebook	
							<input type="text" name="redes_sociales" id="redes_sociales" value="{{old('redes_sociales')}}" class="form-control" placeholder="Enlace al facebook del rescatista">
							{{ $errors -> first('redes_sociales') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="es_asociacion">
							¿Es Usted parte de una asociación civil?<br>
							<input type="radio" name="es_asociacion" value="true"> Sí<br>
							<input type="radio" name="es_asociacion" value="false" checked="checked"> No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="id_rol">
							Rol<br>
							<select name="id_rol">
								<option value="0">Seleccione un Rol</option>
								@foreach($roles as $rol)
									<option value="{{ $rol -> id_rol }}" @if(old('id_rol') == $rol -> id_rol ) selected @endif>{{ $rol -> rol }}
									</option>	
								@endforeach
							</select>
							{{ $errors -> first('id_rol') }}
						</label>
					</div>
				</div>
			</div>
		</div>
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_registrar_rescatista" class="btn btn-primary">Enviar</button>
				<a href="{{ route('Rescatista.index') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>		
	</div>
</div>
</form>

<script>
	$(function(){
    	////////logica onload

    	///////////logica en cambios
    	$("#boton_registrar_rescatista").click(function(){
    		$("#registrar_rescatista").submit();
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


	var input = document.querySelector('#foto');
	var preview = document.querySelector('.preview');

input.style.opacity = 0;input.addEventListener('change', updateImageDisplay);function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  var curFiles = input.files;
  if(curFiles.length === 0) {
    var para = document.createElement('p');
    para.textContent = 'Sin archivo seleccionado.';
    preview.appendChild(para);
  } else {
    var list = document.createElement('ol');
    preview.appendChild(list);
    for(var i = 0; i < curFiles.length; i++) {
      var listItem = document.createElement('ul');
      var para = document.createElement('p');
      if(validFileType(curFiles[i])) {
        var image = document.createElement('img');
        image.src = window.URL.createObjectURL(curFiles[i]);

        listItem.appendChild(para);
        listItem.appendChild(image);

      } else {
        para.textContent = 'Archivo: ' + curFiles[i].name + ': No tiene formato válido.';
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
  }
}
var fileTypes = [
  'image/jpeg',
  'image/pjpeg',
  'image/png'
]

function validFileType(file) {
  for(var i = 0; i < fileTypes.length; i++) {
    if(file.type === fileTypes[i]) {
      return true;
    }
  }
  return false;
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
	form ol {
	  padding-left: 0;
	}
	form img {
	  height: 100px;
	  order: -1;
	}
</style>
@endsection