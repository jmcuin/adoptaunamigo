@extends('menu')

@section('contenido')

<form method="POST" action="{{ route('Especie.update', $especie -> id_especie)}}">
	 {!! method_field('PUT') !!}
	 {!! csrf_field() !!}
	<div class="container" style="overflow: auto; margin-top: 180px;">
	    <h1 align="center">Edición de Especie</h1>
		<div class="col-lg-12 well">
			<div class="col-sm-12">
				<div class="row" align="center">
					<label for="especie">
						Especie
						<input type="text" name="especie" value="{{ $especie -> especie }}" class="form-control">
						{{ $errors -> first('especie') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group pull-right">
					<input type="submit" value="Enviar" class="btn btn-primary">
					<a href="{{ route('Especie.index') }}" class="btn btn-primary">Regresar</a>
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