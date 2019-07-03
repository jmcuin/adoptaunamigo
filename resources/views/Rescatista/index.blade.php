@extends('menu')

@section('contenido')
	<div class="col-med-8" align="center" style="overflow: auto; margin-top: 150px"> 
		<h1>
			Listado de Rescatistas
			<a href="{{ route('Rescatista.create') }}" class="btn btn-primary pull-right">Nuevo</a>
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
    	{!! Form::open(['method'=>'GET','url'=>'Rescatista','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
			<div class="input-group custom-search-form">
			    <input type="text" class="form-control" name="search" placeholder="Buscar...">
			    <span class="input-group-btn">
			        <button class="btn btn-default-sm" type="submit">
			            <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--></i>
			        </button>
			    </span>
			</div>
		{!! Form::close() !!}
		<table class="table table-hover table-striped" id="tablaRescatista">
			<thead>
				<tr>
					<th>
						@sortablelink('id_rescatista')
					</th>
					<th>
						@sortablelink('nombre')
					</th>
					<th>
						@sortablelink('a_paterno')
					</th>
					<th>
						@sortablelink('a_materno')
					</th>
					<th>
						@sortablelink('alias')
					</th>
					<th>
						@sortablelink('telefono')
					</th>
					<th>
						@sortablelink('email')
					</th>
					<th>
						Asociación
					</th>
					<th>
						Rol
					</th>
					<th colspan="3">
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
			@if($rescatistas-> isEmpty())
					<tr>
						<td colspan="18" align="center">No hay datos para mostrar.</td>
					</tr>
				@else
					@foreach($rescatistas as $rescatista)
						<tr>
							<td>
								{{ $rescatista -> id_rescatista }}
							</td>
							<td>
								{{ $rescatista -> nombre }}
							</td>
							<td>
								{{ $rescatista -> a_paterno }}
							</td>
							<td>
								{{ $rescatista -> a_materno }}
							</td>
							<td>
								{{ $rescatista -> alias }}
							</td>
							<td>
								{{ $rescatista -> telefono }}
							</td>
							<td>
								{{ $rescatista -> email }}
							</td>
							<td>
								@if($rescatista -> es_asociacion == true) Sí @else No @endif
							</td>
							<td>
								{{ $rescatista -> user -> roles[0] -> rol }}
							</td>
							<td>
								<a href="{{ route('Rescatista.show', $rescatista -> id_rescatista) }}" class="btn btn-primary">Ver</a>
							</td>
							<td>
								<a href="{{ route('Rescatista.edit', $rescatista -> id_rescatista) }}" class="btn btn-primary">Editar</a>
							</td>
							<td>
								<form method="POST" action="{{ route('Rescatista.destroy', $rescatista-> id_rescatista)}}">
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
	{!! $rescatistas->appends(\Request::except('page'))->render() !!}		
<style type="text/css">
			.btn-primary{
				background-color: #20193D !important;
			}
		</style>
@endsection
