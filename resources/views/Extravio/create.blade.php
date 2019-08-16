@extends('menu')

@section('contenido')
<form method="POST" id="registrar_amigo" enctype="multipart/form-data" action="{{ route('Extravio.store') }}">
	{!! csrf_field() !!}
	<div class="container" style="margin-top: 150px">
    <h1 align="center">Registro de Amigo Extraviado</h1> 
	<div class="col-lg-12 well">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12 form-group" align="center"> 
						 <label for="foto" class="label-foto">
							Foto(s) del Amigo
							<input type="file" name="fotos[]" id="foto" placeholder="Fotos del amigo" accept="image/*" multiple="multiple" required="required">
						</label>
						<div class="preview">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="nombre">
							Nombre
							<input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre(s) del amigo" required="required">
							{{ $errors -> first('nombre') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="ultimo_avistamiento_lugar">
							Visto por última vez en
							<input type="text" name="ultimo_avistamiento_lugar" value="{{old('ultimo_avistamiento_lugar')}}" class="form-control" placeholder="Último lugar donde fue visto el amigo" required="required">
							{{ $errors -> first('ultimo_avistamiento_lugar') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="ultimo_avistamiento_fecha">
							Visto por última vez el día
							<input type="date" name="ultimo_avistamiento_fecha" value="{{old('ultimo_avistamiento_fecha')}}" class="form-control" placeholder="Último día en que fue visto el amigo" required="required" max="{{ date('Y-m-d') }}">
							{{ $errors -> first('ultimo_avistamiento_fecha') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="descripcion_amigo">
							Descripción del amigo
							<textarea name="descripcion_amigo" class="form-control" placeholder="Descripción del amigo" cols="80" required="required">{{old('descripcion_amigo')}}</textarea>
							{{ $errors -> first('descripcion_amigo') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="descripcion_evento">
							Descripción de cómo desapareció
							<textarea name="descripcion_evento" class="form-control" placeholder="Descripción de la situación" cols="80" required="required">{{old('descripcion_evento')}}</textarea>
							{{ $errors -> first('descripcion_evento') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="senias_particulares">
							Señas Particulares
							<textarea name="senias_particulares" class="form-control" placeholder="Señas particulares del amigo" cols="80" required="required">{{old('senias_particulares')}}</textarea>
							{{ $errors -> first('senias_particulares') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label for="contacto_persona">
							Persona(s) a quienes contactar
							<input type="text" name="contacto_persona" value="{{old('contacto_persona')}}" class="form-control" placeholder="Persona(a) a quienes contactar" required="required">
							{{ $errors -> first('contacto_persona') }}
						</label>
					</div>
					<div class="col-sm-6 form-group">
						<label for="telefono">
							Teléfono de contacto
							<input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono de contacto" required="required">
							{{ $errors -> first('telefono') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label for="email">
							Correo electrónico
							<input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Correo electrónico" required="required">
							{{ $errors -> first('email') }}
						</label>
					</div>
					<div class="col-sm-6 form-group">
						<label for="confirmaemail">
							Confirmación Correo Electrónico	
							<input type="email" name="confirmaemail" id="confirmaemail" value="{{old('confirmaemail')}}" class="form-control" placeholder="mail@algo.com" required="required">
							{{ $errors -> first('confirmaemail') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="recompenza">
							Se ofrece recompenza<br>
							<input type="radio" name="recompenza" value="true" checked="checked">Sí<br>
							<input type="radio" name="recompenza" value="false">No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="recompenza_monto">
							Monto de recompenza
							<input type="text" name="recompenza_monto" value="0" class="form-control" placeholder="Monto de la recompenza">
							{{ $errors -> first('recompenza_monto') }}
						</label>
					</div>
				</div>
			</div>
		</div>
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_registrar_amigo" class="btn btn-primary">Enviar</button>
				@guest
					<a href="{{ route('inicio') }}" class="btn btn-primary">Regresar</a>
        		@else
					<a href="{{ route('Extravio.index') }}" class="btn btn-primary">Regresar</a>
				@endguest
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