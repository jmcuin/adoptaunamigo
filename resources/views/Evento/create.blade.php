@extends('menu')

@section('contenido')
<form method="POST" id="registrar_Evento" enctype="multipart/form-data" action="{{ route('Evento.store') }}" style="margin-top: 150px">
	{!! csrf_field() !!}

    <h1 align="center">Registro de Evento</h1>
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
							<input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre(s) del Evento">
							{{ $errors -> first('nombre') }}
						</label>
					</div>
					<div class="col-sm-6 form-group"> 
						<label for="descripcion">
							Descripción
							<textarea name="descripcion" class="form-control" placeholder="Descripción del evento" cols="80">{{ old('descripcion') }}</textarea>
							{{ $errors -> first('descripcion') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="lugar">
							Lugar	
							<input type="text" name="lugar" value="{{ old('lugar') }}" class="form-control" placeholder="Lugar del evento">
							{{ $errors -> first('lugar') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="fecha">
							Fecha
							<input type="date" name="fecha" value="{{ old('fecha') }}" class="form-control" min="{{ date('Y-m-d') }}">
							{{ $errors -> first('fecha') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="hora">
							Hora
							<input type="text" name="hora" value="{{ old('hora') }}" class="form-control" placeholder="Hora del evento">
							{{ $errors -> first('hora') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="enlace">
							Enlace de Facebook
							<input type="text" name="enlace_facebook" value="{{ old('enlace') }}" class="form-control" placeholder="enlace del evento">
							{{ $errors -> first('enlace') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="email">
							Correo Electrónico
							<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="mail@mail.com">
							{{ $errors -> first('email') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="telefono">
							Teléfono
							<input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Teléfono de contacto">
							{{ $errors -> first('telefono') }}
						</label>
					</div>
				</div>
			</div>
		</div>
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_registrar_Evento" class="btn btn-primary">Enviar</button>
				<a href="{{ route('Evento.index') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>		
	</div>

</form>

<script>
	$(function(){
    	////////logica onload

    	///////////logica en cambios
    	$("#boton_registrar_Evento").click(function(){
    		$("#registrar_Evento").submit();
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