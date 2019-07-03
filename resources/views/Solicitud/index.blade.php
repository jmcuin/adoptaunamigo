@extends('menu')

@section('contenido')
	<div class="col-med-8" align="center" style="overflow: auto; margin-top: 180px;"> 
		<h1>
			Listado de Solicitudes
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
    	{!! Form::open(['method'=>'GET','url'=>'Solicitud','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
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
						Solicitante
					</th>
					<th>
						Correo Electrónico
					</th>
					<th>
						Teléfono
					</th>
					<th>
						Edad
					</th>
					<th>
						Mensaje
					</th>
					<th colspan="3" align="center">
						Acciones
					</th>
				</tr>
			</thead>
			<tbody>
			@if($solicitudes -> isEmpty())
					<tr>
						<td colspan="18" align="center">No hay datos para mostrar.</td>
					</tr>
				@else
					@for($i = 0; $i < count($solicitudes); $i++)
						<tr>
							<td>
								{{ $solicitudes[$i] -> id_amigo }}
							</td>
							<td>
								{{ $solicitudes[$i] -> nombre }}
							</td>
							<td>
								{{ $solicitudes[$i] -> nombre_solicitante }}
							</td>
							<td>
								{{ $solicitudes[$i] -> email }}
							</td>
							<td>
								{{ $solicitudes[$i] -> telefono }}
							</td>
							<td>
								{{ $solicitudes[$i] -> edad }}
							</td>
							<td>
								{{ substr($solicitudes[$i] -> mensaje, 0, 10) }}...
							</td>
							<td>
								<a href="{{ route('Solicitud.show', $solicitudes[$i] -> id_solicitud) }}" class="btn btn-primary">Ver</a>
							</td>
							<td>
								<a href="{{ route('commentSolicitud', $solicitudes[$i] -> id_solicitud) }}" class="btn btn-primary">Comentar</a>
							</td>
							<td>
								<a href="{{ route('attendSolicitud', $solicitudes[$i] -> id_solicitud) }}" class="btn btn-primary">
									@if($solicitudes[$i] -> atendida == false)
										Terminar
									@else
										Reactivar
									@endif	
								</a>
							</td>
							<td>
								<a href="{{ route('setAdoptado', $solicitudes[$i] -> id_amigo.'-'.$solicitudes[$i] -> id_solicitud) }}" class="btn btn-primary">Registrar Adopción</a>
							</td>
						</tr>
					@endfor
				@endif
			</tbody>
		</table>
	{!! $solicitudes->appends(\Request::except('page'))->render() !!}		
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
</style>
@endsection
