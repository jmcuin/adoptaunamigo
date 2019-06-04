@extends('menu')

@section('contenido')
<form method="POST" id="registrar_amigo" enctype="multipart/form-data" action="{{ route('Amigo.store') }}">
	{!! csrf_field() !!}
	<div class="container" style="margin-top: 150px">
    <h1 align="center">Registro de Amigo</h1>
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
							<input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre(s) del amigo">
							{{ $errors -> first('nombre') }}
						</label>
					</div>
					<div class="col-sm-4 form-group"> 
						<label for="edad">
							Edad
							<input type="text" name="edad" value="{{old('edad')}}" class="form-control" placeholder="Edad del amigo">
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
									<option value="{{ $especie -> id_especie }}" @if(old('id_especie') == $especie -> id_especie ) selected @endif>{{ $especie -> especie}}	
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
									<option value="{{ $raza -> id_raza }}" @if(old('id_raza') == $raza -> id_raza ) selected @endif>{{ $raza -> raza}}	
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
								<option value="Miniatura">Miniatura</option>
								<option value="Chico">Chico</option>
								<option value="Mediano">Mediano</option>
								<option value="Grande">Grande</option>
							</select>
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group"> 
						<label for="caracter">
							Carácter
							<input type="text" name="caracter" id="caracter" value="{{old('caracter')}}" class="form-control" placeholder="Carácter del amigo">
							{{ $errors -> first('caracter') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="convivencia">
							Convivencia	
							<input type="text" name="convivencia" value="{{old('convivencia')}}" class="form-control" placeholder="Convive con perros, gatos, etc...">
							{{ $errors -> first('convivencia') }}
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="recomendaciones">
							Recomendaciones
							<input type="text" name="recomendaciones" value="{{old('recomendaciones')}}" class="form-control" placeholder="Recomendaciones del amigo">
							{{ $errors -> first('recomendaciones') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group">
						<label for="requisitos">
							Requisitos de Adopción
							<textarea name="requisitos" class="form-control" placeholder="Requisitos de adopción" cols="80">{{old('requisitos')}}</textarea>
							{{ $errors -> first('requisitos') }}
						</label>
					</div>
					<div class="col-sm-6 form-group">
						<label for="lugar_adopcion">
							Lugares de Adopción
							<textarea name="lugar_adopcion" class="form-control" placeholder="Lugares donde podrá ser dado en adopción" cols="80">{{old('lugar_adopcion')}}</textarea>
							{{ $errors -> first('lugar_adopcion') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 form-group">
						<label for="historia">
							Historia de Vida
							<textarea name="historia" class="form-control" placeholder="Historia de vida antes de ser rescatado" cols="160">{{old('historia')}}</textarea>
							{{ $errors -> first('historia') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 form-group"> 
						<label for="enlace_video">
							Enlace Youtube
							<input type="text" name="enlace_video" id="enlace_video" value="{{old('enlace_video')}}" class="form-control" placeholder="Enlace al video de youtube">
							{{ $errors -> first('enlace_video') }}
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="solicita_adopcion">
							En Adopción<br>
							<input type="radio" name="solicita_adopcion" value="true" checked="checked">Sí<br>
							<input type="radio" name="solicita_adopcion" value="false">No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="solicita_esterilizacion">
							Solicita Padrinos de Esterilización<br>
							<input type="radio" name="solicita_esterilizacion" value="true" checked="checked">Sí<br>
							<input type="radio" name="solicita_esterilizacion" value="false">No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="solicita_hogar_temporal">
							Solicita Hogar Temporal<br>
							<input type="radio" name="solicita_hogar_temporal" value="true" checked="checked">Sí<br>
							<input type="radio" name="solicita_hogar_temporal" value="false">No
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="solicita_ayuda_medica">
							Solicita Ayuda Médica<br>
							<input type="radio" name="solicita_ayuda_medica" value="true" checked="checked">Sí<br>
							<input type="radio" name="solicita_ayuda_medica" value="false">No
						</label>
					</div>
					<div class="col-sm-4 form-group">
						<label for="solicita_ayuda_alimenticia">
							Solicita Ayuda Alimenticia<br>
							<input type="radio" name="solicita_ayuda_alimenticia" value="true" checked="checked">Sí<br>
							<input type="radio" name="solicita_ayuda_alimenticia" value="false">No
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