@extends('menu')

@section('contenido')
<form method="POST" id="descativar_busqueda" enctype="multipart/form-data" action="{{ route('deactivateSearch') }}">
	{!! csrf_field() !!}
	<div class="container" style="margin-top: 150px" align="center">
    <h1 align="center">Desactiva la Búsqueda</h1> 
	<div class="col-md-12 col-lg-8">
        <div class="title-single-box">
	        @if (session('info'))
	            <div class="alert alert-success alert-dismissable">
	    	        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                {{ session('info') }}
	            </div>
	        @endif
	        @if (session('error'))
    		<strong>
    			<div class="alert alert-danger alert-dismissable">
        			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        			{{ session('error') }}
    			</div>
    		</strong>
    	@endif
    	</div>
    </div>
	<div class="col-lg-12 well">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12 form-group"> 
					<label for="codigo">
						Código de Desactivación<br>
						(número de 4 digitos enviado a tu correo electrónico al registrar la búsqueda)
						<input type="number" name="codigo" value="{{old('codigo')}}" class="form-control" placeholder="Código de desactivación" required="required" min="1000" max="9999">
						{{ $errors -> first('codigo') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 form-group"> 
					<label for="estatus">
						Cuéntanos que sucedió con tu búsqueda<br>
						(Información con Fines Estadísticos)<br>
						<select name="conclusion" id="conclusion" required="required">
							<option value="Encontrado_vivo" selected="selected">¡¡Lo encontré en perfecto estado!!</option>
							<option value="Abandono_busqueda">Me cansé de buscar</option>
							<option value="Encontrado_muerto">Desafortunadamente falleció</option>
						</select>
						{{ $errors -> first('conclusion') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 form-group"> 
					<button type="submit" id="boton_desactivar_busqueda" class="btn btn-primary">Enviar</button>
					<a class="btn btn-primary" href="{{ route('inicio') }}">Inicio</a>
				</div>
			</div>
		</div>
	</div>	
	</div>
</div>
</form>

<script>
	$(function(){
    	////////logica onload

    	///////////logica en cambios
    	$("#boton_desactivar_busqueda").click(function(){
    		$("#descativar_busqueda").submit();
    	});
	});
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