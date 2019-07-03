@extends('menu')

@section('contenido')
	<div class="container" style="margin-top: 150px;" align="center">
      <div class="row">
      <div class="col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Adopción de: {{ $adopcion -> amigo -> nombre }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3 col-lg-12" align="center"> 
                  <?php 
                    $fotos = explode('&',$adopcion -> evidencias); 
                  ?>
                  @for($i = 1; $i < count($fotos); $i++)
                    <img width="200px" src="{{ Storage::url('public/evidencias/'.$fotos[$i]) }}">
                  @endfor
                </div>
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre del adoptante:</td>
                        <td>{{ $adopcion -> nombre_adoptante }}</td>
                      </tr>
                      <tr>
                        <td>Dirección del adoptante:</td>
                        <td>{{ $adopcion -> direccion_adoptante }}</td>
                      </tr>
                      <tr>
                        <td>Correo Electrónico:</td>
                        <td>{{ $adopcion -> email }}</td> 
                      </tr>
                      <tr>
                        <td>Teléfono:</td>
                        <td>{{ $adopcion -> telefono }}</td> 
                      </tr>
                      <tr>
                        <td>Estatus de la adopción:</td>
                        <td>@if($adopcion -> vigente == true) Vigente @else No vigente @endif</td>
                      </tr>
                      <tr>
                        <td>Detalles de la adopción:</td>
                        <td>{{ $adopcion -> detalles_adopcion }}</td>
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
                		<td>
                			<span class="pull-right">
                    			<a href="{{ route('Adopcion.index') }}" class="btn btn-primary">Regresar</a>
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