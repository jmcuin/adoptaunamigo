@extends('menu')

@section('contenido')
<div class="container" style="margin-top: 150px;">
      <div class="row">
      <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Rescatista: {{ $rescatista -> nombre }} {{ $rescatista -> a_paterno }} {{ $rescatista -> a_materno }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3 col-lg-3 " align="center"> <img width="130px" src="{{ Storage::disk('s3') -> url($rescatista -> foto) }}"> 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Alias:</td>
                        <td>{{ $rescatista -> alias }}</td>
                      </tr>	
                      <tr>
                        <td>Dirección:</td>
                        <td>{{ $rescatista -> calle }} {{ $rescatista -> numero_interior }}
							{{ $rescatista -> numero_exterior }}<br>{{ $rescatista -> colonia }}<br>
							{{ $rescatista -> cp }}<br>
							{{ $rescatista -> municipio -> municipio }}<br>
							{{ $rescatista -> extranjero }}<br></td>
                      </tr>
                      <tr>
                        <td>Teléfono de Contacto:</td>
                        <td>{{ $rescatista -> telefono }}</td>
                      </tr>
                      <tr>
                        <td>Correo Electrónico:</td>
                        <td>{{ $rescatista -> email }}</td> 
                      </tr>
                      <tr>
                        <td>Enlace de Facebook:</td>
                        <td>{{ $rescatista -> redes_sociales }}</td> 
                      </tr>
                      <tr>
                        <td>Asociación:</td>
                        <td>@if($rescatista -> es_asociacion == true){{ $rescatista -> asociacion }}@else NA @endif</td> 
                      </tr>
                      <tr>
                        <td>Historia:</td>
                        <td>{{ $rescatista -> historia }}</td>
                      </tr>
                      <tr>
                        <td>Rol:</td>
                        <td>{{ $rescatista -> user -> roles[0] -> rol }}</td> 
                      </tr>
                     </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
            <div class="panel-footer">
                <table>
                	<tr>
                		<td><a href="{{ route('Rescatista.edit', $rescatista-> id_rescatista) }}" class="btn btn-primary">Editar</a>
                		</td>
                		<td><form method="POST" action="{{ route('Rescatista.destroy', $rescatista -> id_rescatista)}}">
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
                    			<a href="{{ route('Rescatista.index') }}" class="btn btn-primary">Regresar</a>
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
		$('#titulo-conyuge').css('cursor', 'pointer');
    $('#titulo-antecedentes').css('cursor', 'pointer');
    $('#titulo-padecimientos').css('cursor', 'pointer');
    $('#titulo-familiares').css('cursor', 'pointer');
		$('#panel-conyuge').hide();
    $('#panel-padecimientos').hide();
    $('#panel-antecedentes').hide();
    $('#panel-familiaress').hide();
		$("#titulo-conyuge").click(function(){
			$('#panel-conyuge').slideToggle( "slow" );
		});
    $("#titulo-padecimientos").click(function(){
      $('#panel-padecimientos').slideToggle( "slow" );
    });
    $("#titulo-antecedentes").click(function(){
      $('#panel-antecedentes').slideToggle( "slow" );
    });
    $("#titulo-familiares").click(function(){
      $('#panel-familiaress').slideToggle( "slow" );
    });
	});
</script>   
@endsection