@extends('layout')

@section('contenido')
	<div class="container">
      <div class="row">
      <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" >Amigo: {{ $amigo  -> nombre }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3 col-lg-3 " align="center"> 
                	<?php $fotos = explode('&',$amigo  -> fotos); ?>
                	@foreach($fotos as $foto)
                		<img width="130px" src="{{ Storage::url($foto) }}">
                	@endforeach 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td>{{ $amigo -> nombre }}</td>
                      </tr>
                      <tr>
                        <td>Tamaño:</td>
                        <td>{{ $amigo -> tamanio }}</td>
                      </tr>
                      <tr>
                        <td>Carácter:</td>
                        <td>{{ $amigo -> caracter }}</td>
                      </tr>
                        <tr>
                        <td>Convivencia:</td>
                        <td>{{ $amigo -> convivencia }}<br></td>
                      </tr>
                      <tr>
                        <td>Recomendaciones:</td>
                        <td>{{ $amigo -> recomendaciones }}</td>
                      </tr>
                      <tr>
                        <td>Requisitos:</td>
                        <td>{{ $amigo -> requisitos }}</td> 
                      </tr>
                      <tr>
                        <td>Otros:</td>
                        <td>{{ $amigo -> otros }}</td> 
                      </tr>
                      <tr>
                        <td>Especie:</td>
                        <td>{{ $amigo -> especie -> especie }}</td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
                <h3 class="panel-title" id="titulo-padres" align="center">Padres o Tutores</h3>
                <div id="panel-padres"> 
                  <table class="table table-user-information">
                    <tbody>
                   		<tr>
                        	<td>Solicita Adopción:</td>
                        	<td>{{ $amigo -> solicita_adopcion }}</td>
                      	</tr>
                      	<tr>
                        	<td>Solicita Esterilización:</td>
                        	<td>{{ $amigo -> solicita_esterilizacion }}</td>
                      	</tr>
                      	<tr>
                        	<td>Solicita Hogar Temporal:</td>
                        	<td>{{ $amigo -> solicita_hogar_temporal }}</td>
                      	</tr>
                      	<tr>
                        	<td>Solicita Ayuda Médica:</td>
                        	<td>{{ $amigo -> solicita_ayuda_medica }}</td>
                      	</tr>
                      	<tr>
                        	<td>Solicita Ayuda Alimenticia:</td>
                        	<td>{{ $amigo -> solicita_ayuda_alimenticia }}</td>
                      	</tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
                <table>
                	<tr>
                		<td><a href="{{ route('Amigo.edit', $amigo -> id_amigo) }}" class="btn btn-primary">Editar</a>
                		</td>
                		<td><form method="POST" action="{{ route('Amigo.destroy', $amigo  -> id_amigo)}}">
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
                    			<a href="{{ route('Amigo.index') }}" class="btn btn-primary">Regresar</a>
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