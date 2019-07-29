@extends('menu')

@section('contenido')
<div align="center" style="margin-top: 150px">
	<img width="400px" src="{{URL::to('/')}}/images/warning.jpg">
	<h2>Lo sentimos, la página que está buscando no se encuentra disponible.</h2>
	<a href="{{ route('Solicitud..index') }}" class="btn btn-primary">Regresar</a>
</div>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection