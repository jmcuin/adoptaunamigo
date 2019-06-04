@extends('menu')

@section('contenido')
	<div class="container" style="margin-top: 150px;" align="center">
      <div class="row">
      <div class="col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" >Solicitud: {{ $solicitud -> amigo -> nombre }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td>{{ $solicitud -> nombre_solicitante }}</td>
                      </tr>
                      <tr>
                        <td>Correo Electrónico:</td>
                        <td>{{ $solicitud -> email }}</td> 
                      </tr>
                      <tr>
                        <td>Teléfono:</td>
                        <td>{{ $solicitud -> telefono }}</td> 
                      </tr>
                      <tr>
                        <td>Edad:</td>
                        <td>{{ $solicitud -> edad }}</td>
                      </tr>
                      <tr>
                        <td>Mensaje:</td>
                        <td>{{ $solicitud -> mensaje }}</td>
                      </tr>
                        <tr>
                          <td colspan="2"><h3 class="panel-title" id="mas" align="center">Comentarios Importantes</h3></td>   
                        </tr>
                        <?php
                          $comentarios = explode('&', $solicitud -> comentarios_rescatista);
                        ?>
                        @for($i = 0; $i < count($comentarios)-1; $i++)
                          <tr>
                            <td>Comentario {{ $i+1 }} emitido por {{ $solicitud -> amigo -> rescatista -> alias }}:</td>
                            <td>{{ $comentarios[$i] }}</td>
                          </tr>
                        @endfor
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
            <div class="panel-footer">
                <table>
                	<tr>
                		<td>
                			<span class="pull-right">
                    			<a href="{{ route('Solicitud.index') }}" class="btn btn-primary">Regresar</a>
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
		$('#otra').hide();
		$('#mas').css('cursor', 'pointer');
		$("#mas").click(function(){
			$('#otra').slideToggle( "slow" );
		});
	});
</script>
@endsection