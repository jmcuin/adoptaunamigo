@extends('menu')

@section('contenido')
<form method="POST" id="registrar_amigo" enctype="multipart/form-data" action="{{ route('storeAdoption') }}">
	{!! csrf_field() !!}
	<input type="text" name="id_amigo" value="{{ $amigo -> id_amigo }}" hidden="hidden">
	<input type="text" name="id_solicitud" value="0" hidden="hidden">
	<div class="container" style="margin-top: 150px">
    <h1 align="center">Registro de Adopción</h1>
	<div class="col-lg-12 well">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 form-group" align="center"> 
						 <label for="evidencias" class="label-evidencia">
							Evidencia(s) Gráficas
							<input type="file" name="evidencias[]" id="evidencia" placeholder="Fotos del amigo" accept="image/*" multiple="multiple">
						</label>
						<div class="preview">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="nombre_adoptante">
							Nombre del Adoptante
							<input type="text" name="nombre_adoptante" value="" class="form-control" placeholder="Nombre del adoptante">
							{{ $errors -> first('nombre_adoptante') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="direccion_adoptante">
							Dirección del Adoptante
							<input type="text" name="direccion_adoptante" value="{{ old('direccion_adoptante') }}" class="form-control" placeholder="Dirección del adoptante">
							{{ $errors -> first('direccion_adoptante') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="email">
							Correo del Adoptante
							<input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="mail@mail.com">
							{{ $errors -> first('email') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="telefono">
							Teléfono del Adoptante	
							<input type="text" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Teléfono del adoptante...">
							{{ $errors -> first('telefono') }}
						</label>
					</div>
					<div class="col-sm-6 form-group">
						<label for="detalles_adopcion">
							Detalles de la Adopción
							<textarea name="detalles_adopcion" class="form-control" placeholder="Detalla aquí los aspectos más importantes de la adopción" cols="200">{{old('detalles_adopcion')}}</textarea>
							{{ $errors -> first('detalles_adopcion') }}
						</label>
					</div>
				</div>
			</div>
		</div>
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_registrar_amigo" class="btn btn-primary">Enviar</button>
				<a href="{{ route('Amigo.index') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>		
	</div>
</div>

</form>

<script>
	$(function(){
    	////////logica onload

    	///////////logica en cambios
    	$("#boton_registrar_amigo").click(function(){
    		$("#registrar_amigo").submit();
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