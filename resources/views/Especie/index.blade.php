@extends('menu')

@section('contenido')
	<div class="col-sm-8" style="overflow: auto; margin-top: 180px;"> 
		<h1>
			Catálogo de Especies
			<a href="{{ route('Especie.create') }}" class="btn btn-primary pull-right">Nuevo</a>
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
    	{!! Form::open(['method'=>'GET','url'=>'Especie','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
			<div class="input-group custom-search-form">
			    <input type="text" class="form-control" name="search" placeholder="Buscar...">
			    <span class="input-group-btn">
			        <button class="btn btn-default-sm" type="submit">
			            <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"--></i>
			        </button>
			    </span>
			</div>
		{!! Form::close() !!}
		<table class="table table-hover table-striped" id="tablaEstadoCivil">
			<thead>
				<tr>
					<th>
						@sortablelink('id_especie')
					</th>
					<th>
						@sortablelink('especie')
					</th>
				</tr>
			</thead>
			<tbody>
			@if($especies -> isEmpty())
					<tr>
						<td colspan="5" align="center">No hay datos para mostrar.</td>
					</tr>
				@else
					@foreach($especies as $especie)
						<tr>
							<td>
								{{ $especie -> id_especie }}
							</td>
							<td>
								{{ $especie -> especie }}
							</td>
							<td>
								<a href="{{ route('Especie.show', $especie -> id_especie)}}" class="btn btn-primary">Ver</a>
							</td>
							<td>
								<a href="{{ route('Especie.edit', $especie -> id_especie)}}" class="btn btn-primary">Editar</a>
							</td>
							<td>
								<form method="POST" action="{{ route('Especie.destroy', $especie-> id_especie)}}">
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
		{!! $especies->appends(\Request::except('page'))->render() !!}		
<style type="text/css">
			.btn-primary{
				background-color: #20193D !important;
			}
		</style>
@endsection
