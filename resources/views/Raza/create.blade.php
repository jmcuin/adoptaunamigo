@extends('menu')

@section('contenido')
<form method="POST" action="{{ route('Raza.store')}}">
	 {!! csrf_field() !!}
	<div class="container" style="margin-top: 150px">
	    <h1 align="center">Registro de Raza</h1>
		<div class="col-lg-12 well">
			<div class="col-sm-12">
				<div class="row" align="center"> 
					<label for="raza">
						Raza
						<input type="text" name="raza" value="{{old('raza')}}" class="form-control">
						{{ $errors -> first('raza') }}
					</label>
				</div>
			</div>
			<div class="row">
				<div class="form-group pull-right">
					<input type="submit" value="Enviar" class="btn btn-primary">
					<a href="{{ route('Raza.index') }}" class="btn btn-primary">Regresar</a>
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