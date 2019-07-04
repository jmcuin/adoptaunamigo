@extends('menu')

@section('contenido')
<form method="POST" action="{{ route('cancelAdoption')}}">
	 {!! csrf_field() !!}
	<input type="text" name="id_adopcion" value="{{ $adopcion -> id_adopcion }}" hidden="hidden">
	<div class="container" style="margin-top: 150px">
	    <h1 align="center">Razones de la Anulación</h1>
		<div class="col-lg-12 well">
			<div class="row">
				<div class="col-sm-12 form-group"> 
					<label for="comentario">
						Comentario
						<textarea name="detalles_anulacion" class="form-control" placeholder="Explique brevemente por qué motivo se anuló la adopción" cols="80" required="required">{{old('detalles_anulacion')}}</textarea>
						{{ $errors -> first('detalles_anulacion') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group pull-right">
					<input type="submit" value="Enviar" class="btn btn-primary">
					<a href="{{ route('Adopcion.index') }}" class="btn btn-primary">Regresar</a>
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