@extends('menu')

@section('contenido')
	<div class="col-med-8" align="center" style="overflow: auto; margin-top: 180px;"> 
		<h1>
			Listado de Amigos
			<a href="{{ route('Amigo.create') }}" class="btn btn-primary pull-right">Nuevo</a>
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
						@sortablelink('id_amigo')
					</th>
					<th>
						@sortablelink('nombre')
					</th>
					<th>
						@sortablelink('raza')
					</th>
					<th>
						@sortablelink('tamanio')
					</th>
					<th colspan="3" align="center">
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
			@if($amigos-> isEmpty())
					<tr>
						<td colspan="18" align="center">No hay datos para mostrar.</td>
					</tr>
				@else
					@foreach($amigos as $amigo)
						<tr>
							<td>
								{{ $amigo -> id_amigo }}
							</td>
							<td>
								{{ $amigo -> nombre }}
							</td>
							<td>
								{{ $amigo -> raza -> raza }}
							</td>
							<td>
								{{ $amigo -> tamanio }}
							</td>
							<td>
								<a href="{{ route('Amigo.show', $amigo -> id_amigo) }}" class="btn btn-primary">Ver</a>
							</td>
							<td>
								<a href="{{ route('Amigo.edit', $amigo -> id_amigo) }}" class="btn btn-primary">Editar</a>
							</td>
							<td>
								<a href="{{ route('setAdoptado', $amigo -> id_amigo.'-0') }}" class="btn btn-primary">Registrar Adopción</a>
							</td>
							<td>
								<form method="POST" action="{{ route('Amigo.destroy', $amigo-> id_amigo)}}">
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
	{!! $amigos->appends(\Request::except('page'))->render() !!}		
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection
