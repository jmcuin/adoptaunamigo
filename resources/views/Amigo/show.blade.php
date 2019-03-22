@extends('layout')

@section('contenido')
	<div class="container">
      <div class="row">
      <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title" >Alumno(a): {{ $alumno -> nombre }} {{ $alumno -> a_paterno }} {{ $alumno -> a_materno }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-3 col-lg-3 " align="center"> <img width="130px" src="{{ Storage::url($alumno -> foto) }}"> 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>CURP:</td>
                        <td>{{ $alumno -> curp }}</td>
                      </tr>
                      <tr>
                        <td>Fecha de Nacimiento:</td>
                        <td>{{ substr($alumno -> curp,8,2) }}/{{ substr($alumno -> curp,6,2) }}/{{substr($alumno -> curp,4,2) }}</td>
                      </tr>
                      <tr>
                        <td>Género:</td>
                        <td>{{ substr($alumno -> curp,10,1) }}</td>
                      </tr>
                        <tr>
                        <td>Dirección:</td>
                        <td>{{ $alumno -> calle }} {{ $alumno -> numero_interior }}
							{{ $alumno -> numero_exterior }}<br>{{ $alumno -> colonia }}<br>
							{{ $alumno -> cp }}<br>
							{{ $alumno -> municipio -> municipio }}<br>
							{{ $alumno -> extranjero }}<br></td>
                      </tr>
                      <tr>
                        <td>Teléfono de Contacto:</td>
                        <td>{{ $alumno -> telefono }}</td>
                      </tr>
                      <tr>
                        <td>Correo Electrónico:</td>
                        <td>{{ $alumno -> email }}</td> 
                      </tr>
                      <tr>
                        <td>Religión:</td>
                        <td>{{ $alumno -> religion -> religion }}</td> 
                      </tr>
                      <tr>
                        <td>Tipo de Sangre:</td>
                        <td>{{ $alumno -> tipo_sangre }}</td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
                <h3 class="panel-title" id="titulo-padres" align="center">Padres o Tutores</h3>
                <div id="panel-padres"> 
                  <table class="table table-user-information">
                    <tbody>
                      @if($padres != null)
	                      @foreach($padres as $padre)
						  <tr>
						  	<td>Nombre:</td>
						  	<td>{{ $padre -> nombre }}</td>
						  </tr>
						  <tr>
						  	<td>Apellidos:</td>
						  	<td>{{ $padre -> a_paterno }} {{ $padre -> a_materno }}</td>
						  </tr>
						  <tr>
						  	<td>CURP:</td>
						  	<td>{{ $padre -> curp }}</td>
						  </tr>
						  <tr>
						  	<td>Empleo:</td>
						  	<td>{{ $padre -> empleo }}</td>
						  </tr>
						  <tr>
						  	<td>Puesto:</td>
						  	<td>{{ $padre -> puesto }}</td>
						  </tr>
						  <tr>
						  	<td>Dirección:</td>
						  	<td>{{ $padre -> direccion }}</td>
						  </tr>
						  <tr>
						  	<td>Teléfono Laboral:</td>
						  	<td>{{ $padre -> tel_trabajo }}</td>
						  </tr>
						  <tr>
						  	<td>Celular:</td>
						  	<td>{{ $padre -> celular }}</td>
						  </tr>
						  <tr>
						  	<td>Nextel:</td>
						  	<td>{{ $padre -> nextel }}</td>
						  </tr>
						  <tr>
						  	<td>Email:</td>
						  	<td>{{ $padre -> email }}</td>
						  </tr>
			   			  @endforeach
		   			  @endif
		   			  @if($padres_trabajadores != null)
						  @foreach($padres_trabajadores as $padre_trabajador)
						  <tr>
						  	<td>Nombre:</td>
						  	<td>{{ $padre_trabajador -> nombre }}</td>
						  </tr>
						  <tr>
						  	<td>Apellidos:</td>
						  	<td>{{ $padre_trabajador -> a_paterno }} {{ $padre_trabajador -> a_materno }}</td>
						  </tr>
						  <tr>
						  	<td>Trabaja con Nosotros en:</td>
						  	<td>{{ $padre_trabajador -> areaDeTrabajo -> area_de_trabajo }}</td>
						  </tr>
			  				@endforeach
			  		   @endif
					@if($padres == null && $padres_trabajadores == null)
					  <tr>
					  	<td colspan="2" align="center">No se tiene registro de los padres o tutores del alumno que consulta</td>
					  </tr>
					@endif
                    </tbody>
                  </table>
                </div>
                <h3 class="panel-title" id="titulo-padecimientos" align="center">Padecimientos</h3>
                <div id="panel-padecimientos"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Alergias:</td>
                        <td>{{ $padecimiento -> alergia }}</td>
                      </tr>
                      <tr>
                        <td>Enfermedades:</td>
                        <td>{{ $padecimiento -> enfermedad }}</td>
                      </tr>
                      <tr>
                        <td>Medicamentos:</td>
                        <td>{{ $padecimiento -> medicina }}</td>
                      </tr>
                      <tr>
                        <td>Cirugias:</td>
                        <td>{{ $padecimiento -> cirugia }}</td>
                      </tr>
                      <tr>
                        <td>Médico Tratante:</td>
                        <td>{{ $padecimiento -> medico }}</td>
                      </tr>
                      <tr>
                        <td>Tel. Médico Tratante:</td>
                        <td>{{ $padecimiento -> tel_medico }}</td>
   					  </tr>
                    </tbody>
                  </table>
                </div>
                <h3 class="panel-title" id="titulo-contactos" align="center">Contactos</h3>
                <div  id="panel-contactos"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Referencia 1:</td>
                        <td>{{ $padecimiento -> ref1_nombre }}</td>
                      </tr>
                      <tr>
                        <td>Tel. Referencia 1:</td>
                        <td>{{ $padecimiento -> ref1_tel }}</td>
                      </tr>
                      <tr>
                        <td>Referencia 2:</td>
                        <td>{{ $padecimiento -> ref2_nombre }}</td>
                      </tr>
                      <tr>
                        <td>Tel. Referencia 2:</td>
                        <td>{{ $padecimiento -> ref2_tel }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <h3 class="panel-title" id="titulo-expediente" align="center">Expediente</h3>
                <div  id="panel-expediente"> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
						<td>
							Acta de Nacimiento:
						</td>
						<td>
							 @if( $expediente -> acta_nacimiento == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> acta_nacimiento == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_acta }}
						</td>
					</tr>
					<tr>
						<td>
							CURP:
						</td>
						<td>
							@if( $expediente -> curp == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> curp == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_curp }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Cartilla de Vacunación:
						</td>
						<td>
							@if( $expediente -> cartilla_vacunacion == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> cartilla_vacunacion == 2 )<img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_cartilla }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Certificado Médico:
						</td>
						<td>
							@if( $expediente -> certificado_medico == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> certificado_medico == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_cert_medico }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Constancia de Estudios:
						</td>
						<td>
							@if( $expediente -> constancia_estudios == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> constancia_estudios == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_constancia }}<br>
						</td>
					</tr>
					<tr>
						<td>
							CURP del Padre o Tutor:
						</td>
						<td>
							@if( $expediente -> curp_padre == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> curp_padre == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_curp_padre }}<br>
						</td>
					</tr>
					<tr>
						<td>
							CURP de l Madre o Tutora:
						</td>
						<td>
							@if( $expediente -> curp_madre == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> curp_madre == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_curp_madre }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Copia del INE del Padre o Tutor:
						</td>
						<td>
							@if( $expediente -> ife_padre == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> ife_padre == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_ife_padre }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Copia del INE de la Madre o Tutora:
						</td>
						<td>
							@if( $expediente -> ife_madre == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> ife_madre == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_ife_madre }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Copia del Comprobante de Domicilio
						</td>
						<td>
							@if( $expediente -> comp_domicilio == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> comp_domicilio == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_comp_domicilio }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Boleta del Grado Anterior:
						</td>
						<td>
							@if( $expediente -> boleta_anterior == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> boleta_anterior == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_boleta_anterior }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Carta de Buena Conducta:
						</td>
						<td>
							@if( $expediente -> carta_conducta == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> carta_conducta == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_carta_conducta }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Certificado de Primaria:
						</td>
						<td>
							@if( $expediente -> cert_primaria == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> cert_primaria == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_cert_primaria }}<br>
						</td>
					</tr>
					<tr>
						<td>
							Boletas Anteriores:
						</td>
						<td>
							@if( $expediente -> boletas_anteriores == 1 ) <img src="/storage/ok.jpg" width="25px"></img> @elseif( $expediente -> boletas_anteriores == 2 ) <img src="/storage/missing.jpg" width="25px"></img> @else <img src="/storage/na.jpg" width="25px"></img> @endif
						</td>
						<td>
							{{ $expediente -> obs_boletas_anteriores }}<br>
						</td>
					</tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer">
                <table>
                	<tr>
                		<td><a href="{{ route('Alumno.edit', $alumno-> id_alumno) }}" class="btn btn-primary">Editar</a>
                		</td>
                		<td><form method="POST" action="{{ route('Alumno.destroy', $alumno -> id_alumno)}}">
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
                    			<a href="{{ route('Alumno.index') }}" class="btn btn-primary">Regresar</a>
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