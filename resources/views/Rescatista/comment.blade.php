@extends('menu')

@section('contenido')
<form method="POST" action="{{ route('storeComment')}}">
	 {!! csrf_field() !!}
	 <input type="text" name="id_solicitud" value="{{ $id }}" hidden="hidden">
	<div class="container" style="margin-top: 150px">
	    <h1 align="center">Registro de Comentario</h1>
		<div class="col-lg-12 well">
			<div class="row">
				<div class="col-sm-12 form-group"> 
					<label for="comentario">
						Comentario
						<textarea name="comentario" class="form-control" placeholder="Deja aquí un dato importante sobre el solicitante" cols="80" required="required">{{old('comentario')}}</textarea>
						{{ $errors -> first('comentario') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group pull-right">
					<input type="submit" value="Enviar" class="btn btn-primary">
					<a href="{{ route('Solicitud.index') }}" class="btn btn-primary">Regresar</a>
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
</style>
@endsection