@extends('menu')

@section('contenido')
	<div class="col-sm-8" style="overflow: auto; margin-top: 150px"> 
		<h1>
			Catálogo de Razas
			<a href="{{ route('Raza.create') }}" class="btn btn-primary pull-right">Nuevo</a>
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
    	{!! Form::open(['method'=>'GET','url'=>'Raza','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
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
						@sortablelink('id_estado')
					</th>
					<th>
						@sortablelink('estado')
					</th>
				</tr>
			</thead>
			<tbody>
			@if($razas -> isEmpty())
					<tr>
						<td colspan="5" align="center">No hay datos para mostrar.</td>
					</tr>
				@else
					@foreach($razas as $raza)
						<tr>
							<td>
								{{ $raza -> id_raza }}
							</td>
							<td>
								{{ $raza -> raza }}
							</td>
							<td>
								<a href="{{ route('Raza.show', $raza -> id_raza)}}" class="btn btn-primary">Ver</a>
							</td>
							<td>
								<a href="{{ route('Raza.edit', $raza -> id_raza)}}" class="btn btn-primary">Editar</a>
							</td>
							<td>
								<form method="POST" action="{{ route('Raza.destroy', $raza-> id_raza)}}">
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
		{!! $razas->appends(\Request::except('page'))->render() !!}		
<style type="text/css">
			.btn-primary{
				background-color: #20193D !important;
			}
		</style>
@endsection
