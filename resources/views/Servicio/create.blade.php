@extends('menu')

@section('contenido')
<form method="POST" id="registrar_servicio" enctype="multipart/form-data" action="{{ route('Servicio.store') }}">
	{!! csrf_field() !!}
	<div class="container" style="margin-top: 150px">
    <h1 align="center">Registro de Servicio</h1>
	<div class="col-lg-12 well">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 form-group" align="center"> 
						 <label for="foto" class="label-foto">
							Imagen del Servicio 
							<input type="file" name="foto" id="foto" placeholder="Imagen del Evento" accept="image/*" required="required">
						</label>
						<div class="preview">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="servicio">
							Servicio
							<input type="text" name="servicio" value="{{ old('servicio') }}" class="form-control" placeholder="Servicio que se ofrece" required="required">
							{{ $errors -> first('servicio') }}
						</label>
					</div>
					<div class="col-sm-6 form-group"> 
						<label for="descripcion">
							Descripción
							<textarea name="descripcion" class="form-control" placeholder="Descripción del evento" cols="80" required="required">{{ old('descripcion') }}</textarea>
							{{ $errors -> first('descripcion') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="precio">
							Precio	
							<input type="text" name="precio" value="{{ old('precio') }}" class="form-control" placeholder="Costo del servicio" required="required">
							{{ $errors -> first('precio') }}
						</label>
					</div>
					<div class="col-sm-6 form-group">
						<label for="terminos_y_condiciones">
							Términos y Condiciones
							<textarea name="terminos_y_condiciones" class="form-control" placeholder="Términos y condiciones del servicio" cols="80" required="required">{{ old('terminos_y_condiciones') }}</textarea>
							{{ $errors -> first('terminos_y_condiciones') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="enlace">
							Enlace de Facebook
							<input type="text" name="enlace_facebook" value="{{ $rescatista -> redes_sociales or old('enlace_facebook')  }}" class="form-control" placeholder="Enlace del servicio">
							{{ $errors -> first('enlace_facebook') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="email">
							Correo Electrónico
							<input type="email" name="email" value="{{ $rescatista -> email or old('email') }}" class="form-control" placeholder="mail@mail.com">
							{{ $errors -> first('email') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="telefono">
							Teléfono
							<input type="text" name="telefono" value="{{ $rescatista -> telefono or old('telefono') }}" class="form-control" placeholder="Teléfono de contacto">
							{{ $errors -> first('telefono') }}
						</label>
					</div>
				</div>
			</div>
		</div>
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_registrar_servicio" class="btn btn-primary">Enviar</button>
				<a href="{{ route('Servicio.index') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>		
	</div>
</div>
</form>

<script>
	$(function(){
    	////////logica onload

    	///////////logica en cambios
    	$("#boton_registrar_servicio").click(function(){
    		$("#registrar_servicio").submit();
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