@extends('menu')

@section('contenido')
	<div class="container" style="overflow: auto; margin-top: 150px;">
      <div class="row">
      <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" >Servicio: {{ $servicio -> servicio }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3 col-lg-3 " align="center"> 
                	<img width="130px" src="{{ Storage::disk('s3') -> url($servicio -> foto) }}">
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Descripción:</td>
                        <td>{{ $servicio -> descripcion }}</td>
                      </tr>
                      <tr>
                        <td>Precio:</td>
                        <td>{{ $servicio -> precio }}</td>
                      </tr>
                        <tr>
                        <td>Términos y Condiciones:</td>
                        <td>{{ $servicio -> terminos_y_condiciones }}<br></td>
                      </tr>
                      <tr>
                        <td>Enlace Facebook:</td>
                        <td>{{ $servicio -> enlace_facebook }}</td>
                      </tr>
                      <tr>
                        <td>Teléfono:</td>
                        <td>{{ $servicio -> telefono }}</td> 
                      </tr>
                      <tr>
                        <td>Correo Electrónico:</td>
                        <td>{{ $servicio -> email }}</td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
                <table>
                	<tr>
                		<td><a href="{{ route('Servicio.edit', $servicio -> id_servicio) }}" class="btn btn-primary">Editar</a>
                		</td>
                		<td><form method="POST" action="{{ route('Servicio.destroy', $servicio  -> id_servicio)}}">
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
                    			<a href="{{ route('Servicio.index') }}" class="btn btn-primary">Regresar</a>
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
	});
</script>
@endsection