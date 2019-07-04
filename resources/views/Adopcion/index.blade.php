@extends('menu')

@section('contenido')
	<div class="col-med-8" align="center" style="overflow: auto; margin-top: 180px;"> 
		<h1>
			Listado de Adopciones
		</h1>
		@if (session('info'))
    		<strong>
    			<div class="alert alert-success alert-dismissable">
        			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        			{{ session('info') }}
    			</div>
    		</strong>
    	@endif
    	@if (session('error'))
    		<strong>
    			<div class="alert alert-danger alert-dismissable">
        			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        			{{ session('error') }}
    			</div>
    		</strong>
    	@endif
    	{!! Form::open(['method'=>'GET','url'=>'Adopcion','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
			<div class="input-group custom-search-form">
			    <input type="text" class="form-control" name="search" placeholder="Buscar...">
			    <span class="input-group-btn">
			        <button class="btn btn-default-sm" type="submit">
			            <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--></i>
			        </button>
			    </span>
			</div>
		{!! Form::close() !!}
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>
						@sortablelink('id_adopcion')
					</th>
					<th>
						Amigo
					</th>
					<th>
						@sortablelink('nombre_adoptante')
					</th>
					<th>
						@sortablelink('email')
					</th>
					<th>
						@sortablelink('telefono')
					</th>
					<th>
						Detalles
					</th>
					<th>
						Vigente
					</th>
					<th colspan="3" align="center">
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
			@if($adopciones -> isEmpty())
				<tr>
					<td colspan="18" align="center">No hay datos para mostrar.</td>
				</tr>
			@else
				@for($i = 0; $i < count($adopciones); $i++)
					<tr>
						<td>
							{{ $adopciones[$i] -> id_adopcion }}
						</td>
						<td>
							{{ $adopciones[$i] -> nombre }}
						</td>
						<td>
							{{ $adopciones[$i] -> nombre_adoptante }}
						</td>
						<td>
							{{ $adopciones[$i] -> email }}
						</td>
						<td>
							{{ $adopciones[$i] -> telefono }}
						</td>
						<td>
							{{ substr($adopciones[$i] -> detalles_adopcion, 0, 10) }}...
						</td>
						<td>
							@if($adopciones[$i] -> vigente == true) Sí @else No @endif
						</td>
						<td>
							<a href="{{ route('Adopcion.show', $adopciones[$i] -> id_adopcion) }}" class="btn btn-primary">Ver</a>
						</td>
						<td>
							@if($adopciones[$i] -> vigente == true)
								<a href="{{ route('unsetAdoptado', $adopciones[$i] -> id_adopcion) }}" class="btn btn-primary">
									Anular Adopción
								</a>
							@endif
						</td>
					</tr>
				@endfor
			@endif
			</tbody>
		</table>
	{!! $adopciones->appends(\Request::except('page'))->render() !!}		
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection
