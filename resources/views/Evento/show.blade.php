@extends('menu')

@section('contenido')
	<div class="container" style="overflow: auto; margin-top: 150px;">
      <div class="row">
      <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" >Evento: {{ $evento -> nombre }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3 col-lg-3 " align="center"> 
                	<img width="130px" src="{{ Storage::url($evento -> imagen) }}">
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Descripción:</td>
                        <td>{{ $evento -> descripcion }}</td>
                      </tr>
                      <tr>
                        <td>Lugar:</td>
                        <td>{{ $evento -> lugar }}</td>
                      </tr>
                        <tr>
                        <td>Fecha:</td>
                        <td>{{ $evento -> fecha }}<br></td>
                      </tr>
                      <tr>
                        <td>Hora:</td>
                        <td>{{ $evento -> hora }}</td>
                      </tr>
                      <tr>
                        <td>Facebook:</td>
                        <td>{{ $evento -> enlace_facebook }}</td> 
                      </tr>
                      <tr>
                        <td>Correo Electrónico:</td>
                        <td>{{ $evento -> email }}</td> 
                      </tr>
                      <tr>
                        <td>Teléfono:</td>
                        <td>{{ $evento -> telefono }}</td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
                <h3 class="panel-title" id="titulo-padres" align="center">Información Complementaria</h3>
                <div id="panel-padres"> 
                  <table class="table table-user-information">
                    <tbody>
                   		<tr>
                        	<td>Se reciben donaciones de alimento:</td>
                        	<td>@if($evento -> donativos_alimento == 1) Sí @else No @endif</td>
                      	</tr>
                      	<tr>
                        	<td>Se reciben donaciones de ropa, correas, casas, etc.:</td>
                        	<td>@if($evento -> donativos_objetos) Sí @else No @endif</td>
                      	</tr>
                      	<tr>
                        	<td>Se reciben donaciones de juguetes:</td>
                        	<td>@if($evento -> donativos_juguetes) Sí @else No @endif</td>
                      	</tr>
                      	<tr>
                        	<td>Se reciben donaciones en efectivo:</td>
                        	<td>@if($evento -> donativos_efectivo) Sí @else No @endif</td>
                      	</tr>
                      	<tr>
                        	<td>Se reciben paseos para los resctadados:</td>
                        	<td>@if($evento -> donativos_paseos) Sí @else No @endif</td>
                      	</tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
                <table>
                	<tr>
                		<td><a href="{{ route('Evento.edit', $evento -> id_evento) }}" class="btn btn-primary">Editar</a>
                		</td>
                		<td><form method="POST" action="{{ route('Evento.destroy', $evento  -> id_evento)}}">
								{!! method_field('DELETE') !!}
				 				{!! csrf_field() !!}
								<button type="submit" class="btn btn-primary">Eliminar</button>
							</form>
                		</td>
                		<td>
                			<div style="width: 285px"></div>
                		</td>
                		<td>
                			<span class="pull-right">
                    			<a href="{{ route('Evento.index') }}" class="btn btn-primary">Regresar</a>
                			</span>
                		</td>
                	</tr>
                </table>         
            </div>       
          </div>
        </div>
    </div>
<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
	.panel-heading {
  		background-color: #20193D !important;
	}
	.panel-title {
		color: #D10F20 !important;
	}
</style>
<script>
	$(function(){
		$('#panel-padres').hide();
		$('#panel-contactos').hide();
		$('#panel-padecimientos').hide();
		$('#panel-expediente').hide();
		$('#titulo-padres').css('cursor', 'pointer');
		$('#titulo-contactos').css('cursor', 'pointer');
		$('#titulo-padecimientos').css('cursor', 'pointer');
		$('#titulo-expediente').css('cursor', 'pointer');
		$("#titulo-padres").click(function(){
			$('#panel-padres').slideToggle( "slow" );
		});
		$("#titulo-padecimientos").click(function(){
			$('#panel-padecimientos').slideToggle( "slow" );
		});
		$("#titulo-contactos").click(function(){
			$('#panel-contactos').slideToggle( "slow" );
		});
		$("#titulo-expediente").click(function(){
			$('#panel-expediente').slideToggle( "slow" );
		});
	});
</script>
@endsection