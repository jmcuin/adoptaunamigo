@extends('layout')

@section('contenido')
<div align="center">
	<img width="400px" src="/storage/warning.jpg">
	<h2>Lo sentimos, los archivos que está intentando subir son muy grandes.<br>Intente con archivos más pequeños.</h2>
	<a href="{{ route('Panel.index') }}" class="btn btn-primary">Regresar</a>
</div>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection