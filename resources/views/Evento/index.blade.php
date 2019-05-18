@extends('menu')

@section('contenido')
	<div class="col-med-8" align="center" style="overflow: auto; margin-top: 180px;"> 
		<h1>
			Listado de Eventos
			<a href="{{ route('Evento.create') }}" class="btn btn-primary pull-right">Nuevo</a>
		</h1>
		@if (session('info'))
    		<strong>
    			<div class="alert alert-success alert-dismissable fade in">
        			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        			{{ session('info') }}
    			</div>
    		</strong>
    	@endif
    	@if (session('error'))
    		<strong>
    			<div class="alert alert-danger alert-dismissable fade in">
        			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        			{{ session('error') }}
    			</div>
    		</strong>
    	@endif
    	{!! Form::open(['method'=>'GET','url'=>'Amigo','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
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
						@sortablelink('id_evento')
					</th>
					<th>
						@sortablelink('nombre')
					</th>
					<th>
						Descripción
					</th>
					<th>
						Lugar
					</th>
					<th colspan="3" align="center">
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
			@if($eventos-> isEmpty())
					<tr>
						<td colspan="18" align="center">No hay datos para mostrar.</td>
					</tr>
				@else
					@foreach($eventos as $evento)
						<tr>
							<td>
								{{ $evento -> id_evento }}
							</td>
							<td>
								{{ $evento -> nombre }}
							</td>
							<td>
								{{ substr( $evento -> descripcion, 0, 18) }}...
							</td>
							<td>
								{{ $evento -> lugar }}
							</td>
							<td>
								<a href="{{ route('Evento.show', $evento -> id_evento) }}" class="btn btn-primary">Ver</a>
							</td>
							<td>
								<a href="{{ route('Evento.edit', $evento -> id_evento) }}" class="btn btn-primary">Editar</a>
							</td>
							<td>
								<form method="POST" action="{{ route('Evento.destroy', $evento-> id_evento)}}">
									{!! method_field('DELETE') !!}
								 	{!! csrf_field() !!}
									<button type="submit" class="btn btn-primary">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>
	{!! $eventos->appends(\Request::except('page'))->render() !!}		
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection
