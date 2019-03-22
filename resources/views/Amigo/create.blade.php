@extends('layout')

@section('contenido')
<form method="POST" id="registrar_alumno" enctype="multipart/form-data" action="{{ route('Alumno.store') }}">
	{!! csrf_field() !!}
	<div class="container"> 
    <h1 align="center">Registro de Alumno(a)</h1>
	<div class="col-lg-12 well">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12 form-group" align="center">
					<label for="foto" class="label-foto">
						Foto del Alumno
						<input type="file" id="foto" name="foto" value="{{old('foto')}}" placeholder="foto(s) del Alumno" accept="image/*">
						<span class="help-block">
							{{ $errors -> first('foto') }}
						</span>
					</label>
					<div class="preview">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Nombres</span>
						<input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre(s) del Alumno">
					</div>
						<span class="help-block">
							{{ $errors -> first('nombre') }}
						</span>
					</label>
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Apellido Paterno</span>
						<input type="text" name="a_paterno" value="{{old('a_paterno')}}" class="form-control" placeholder="Apellido del Alumno">
					</div>
					{{ $errors -> first('a_paterno') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Apellido Materno</span>
						<input type="text" name="a_materno" value="{{old('a_materno')}}" class="form-control" placeholder="Apellido del Alumno">
					</div>
					{{ $errors -> first('a_materno') }}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">CURP</span>
						<input type="text" name="curp" id="curp" value="{{old('curp')}}" class="form-control" placeholder="CURP del Alumno">
					</div>
					{{ $errors -> first('curp') }}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Estado</span>
						<select name="id_estado" id="id_estado">
							<option value="0">Seleccione un Estado</option>
							@foreach($estados as $estado)
								<option value="{{ $estado -> id_estado }}" @if(old('id_estado') == $estado -> id_estado ) selected @endif>{{ $estado -> estado}}	
								</option>	
							@endforeach
						</select>
					</div>
					{{ $errors -> first('id_estado') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Municipio</span>
						<select name="id_estado_municipio" id="id_estado_municipio">
							<option value="0">Seleccione un Municipio</option>
							@foreach($municipios as $municipio)
								<option value="{{ $municipio-> id_estado_municipio }}" @if(old('id_estado_municipio') == $municipio -> id_estado_municipio ) selected @endif>{{ $municipio -> municipio}}	
								</option>	
							@endforeach
						</select>
					</div>
					{{ $errors -> first('id_estado_municipio') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Otro</span>
						<input type="text" name="extranjero" value="{{old('extranjero')}}" class="form-control" placeholder="Lugar de Origen del Alumno">
					</div>
					{{ $errors -> first('extranjero') }}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Calle</span>	
						<input type="text" name="calle" value="{{old('calle')}}" class="form-control" placeholder="Domicilio del Alumno">
					</div>
					{{ $errors -> first('calle') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon"># Interior</span>
						<input type="text" name="numero_interior" value="{{old('numero_interior')}}" class="form-control" placeholder="Número interior">
					</div>
					{{ $errors -> first('numero_interior') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon"># Exterior</span>
						<input type="text" name="numero_exterior" value="{{old('numero_exterior')}}" class="form-control" placeholder="Número exterior">
					</div>
					{{ $errors -> first('numero_exterior') }}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">		
					<div class="input-group">
						<span class="input-group-addon"># Exterior</span>
						<input type="text" name="colonia" value="{{old('colonia')}}" class="form-control" placeholder="Domicilio del Alumno">
					</div>
					{{ $errors -> first('colonia') }}
				</div>
				<div class="col-sm-4 form-group">	
					<div class="input-group">
						<span class="input-group-addon">Código Postal</span>
						<input type="text" name="cp" value="{{old('cp')}}" class="form-control" placeholder="Código postal del Alumno">
					</div>
					{{ $errors -> first('cp') }}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">	
					<div class="input-group">
						<span class="input-group-addon">Teléfono</span>	
						<input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Domicilio del Alumno">
					</div>
					{{ $errors -> first('telefono') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Correo Electrónico</span>
						<input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="mail@algo.com">
					</div>
					{{ $errors -> first('email') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Confirma Correo Electrónico</span>
						<input type="email" name="confirmaemail" id="confirmaemail" value="{{old('confirmaemail')}}" class="form-control" placeholder="mail@algo.com">
					</div>
					{{ $errors -> first('confirmaemail') }}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Religión</span>
						<select name="id_religion">
							<option value="0">Seleccione una Religión</option>
							<@foreach($religiones as $religion)
								<option value="{{ $religion -> id_religion }}" @if(old('id_religion') == $religion -> id_religion ) selected @endif>{{ $religion -> religion}}
								</option>	
							@endforeach
						</select>
					</div>
					{{ $errors -> first('id_religion') }}
				</div>
				<div class="col-sm-4 form-group">
					<div class="input-group">
						<span class="input-group-addon">Tipo de Sangre</span>	
						<input type="text" name="tipo_sangre" value="{{old('tipo_sangre')}}" class="form-control" placeholder="O positivo, O negativo, etc...">
					</div>
					{{ $errors -> first('tipo_sangre') }}
				</div>
			</div>
		</div>
	</div>

		<div class="col-lg-12 well">
			<div class="row">
				<div class="col-sm-6 form-group">
					<h3 align="center">
						Padre o Tutor
					</h3>
				</div>
				<div class="col-sm-6 form-group">
					<h3 align="center">
						Madre o Tutora
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 form-group">
					<p id="papa_es_empleado">
						<select name="id_papa" id="id_papa">
							<option value="0" @if(old('id_papa') == 0 ) selected @endif>Seleccione una opción</option>
							<option value="1" @if(old('id_papa') == 1 ) selected @endif>El padre es trabajador del colegio</option>
							<option value="2" @if(old('id_papa') == 2 ) selected @endif>El padre es externo</option>
							<option value="3" @if(old('id_papa') == 3 ) selected @endif>No aplica</option>
						</select>
						{{ $errors -> first('id_papa') }}
					</p>
				</div>
				<div class="col-sm-6 form-group">
					<p id="mama_es_empleada">
						<select name="id_mama" id="id_mama">
							<option value="0" @if(old('id_mama') == 0 ) selected @endif>Seleccione una opción</option>
							<option value="1" @if(old('id_mama') == 1 ) selected @endif>La madre es trabajadora del colegio</option>
							<option value="2" @if(old('id_mama') == 2 ) selected @endif>La madre es externa</option>
							<option value="3" @if(old('id_mama') == 3 ) selected @endif>No aplica</option>
						</select>
						{{ $errors -> first('id_mama') }}
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 form-group">
					<div id="campo_padre_trabajador" >
						<label for="id_padre_trabajador">
							Trabajador<br>
							<select name="id_padre_trabajador" id="id_padre_trabajador">
								<option value="-1" style="display:none" selected>Oculto</option>
								<option value="0">Seleccione un trabajador</option>
								@foreach($trabajadoresactivos as $trabajadoractivo)
									@if(substr($trabajadoractivo -> curp, 10, 1) == 'H')
										<option value="{{ $trabajadoractivo -> id_trabajador }}" @if(old('id_padre_trabajador') == $trabajadoractivo -> id_trabajador ) selected @endif>{{ $trabajadoractivo -> nombre}}	
										</option>
									@endif	
								@endforeach
							</select>
							{{ $errors -> first('id_padre_trabajador') }}
						</label>
					</div>
				</div>
				<div class="col-sm-6 form-group">
					<div id="campo_madre_trabajadora" >
						<label for="id_madre_trabajadora">
						Trabajadora<br>
						<select name="id_madre_trabajadora" id="id_madre_trabajadora">
							<option value="-1" style="display:none" selected>Oculto</option>
							<option value="0">Seleccione un trabajador</option>
							@foreach($trabajadoresactivos as $trabajadoractivo)
								@if(substr($trabajadoractivo -> curp, 10, 1) == 'M')
									<option value="{{ $trabajadoractivo -> id_trabajador }}" @if(old('id_madre_trabajadora') == $trabajadoractivo -> id_trabajador ) selected @endif>{{ $trabajadoractivo -> nombre}}	
									</option>
								@endif	
							@endforeach
						</select>
						{{ $errors -> first('id_madre_trabajadora') }}
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 form-group">
					<div id='papa'>
						<label for="nombre_padre">
						Nombre(s) del Padre
							<input type="text" name="nombre_padre" id="nombre_padre" value="{{old('nombre_padre')}}" class="form-control" placeholder="Nombre(s) del padre">
							{{ $errors -> first('nombre_padre') }}
						</label>
						<label for="a_paterno_padre">
							Apellido Paterno del Padre
							<input type="text" name="a_paterno_padre" id="a_paterno_padre" value="{{old('a_paterno_padre')}}" class="form-control" placeholder="Apellido paterno del padre">
							{{ $errors -> first('a_paterno_padre') }}
						</label>
						<label for="a_materno_padre">
							Apellido Materno del Padre
							<input type="text" name="a_materno_padre" id="a_materno_padre" value="{{old('a_materno_padre')}}" class="form-control" placeholder="Apellido materno del padre">
							{{ $errors -> first('a_materno_padre') }}
						</label>
						<label for="curp_padre">
							CURP del Padre
							<input type="text" name="curp_padre" id="curp_padre" value="{{old('curp_padre')}}" class="form-control" placeholder="CURP del padre">
							{{ $errors -> first('curp_padre') }}
						</label>
						<label for="empleo_padre">
							Lugar Donde Labora el Padre
							<input type="text" name="empleo_padre" id="empleo_padre" value="{{old('empleo_padre')}}" class="form-control" placeholder="Lugar donde labora el padre">
							{{ $errors -> first('empleo_padre') }}
						</label>
						<label for="puesto_padre">
							Puesto Laboral del Padre
							<input type="text" name="puesto_padre" id="puesto_padre" value="{{old('puesto_padre')}}" class="form-control" placeholder="Puesto laboral del padre">
							{{ $errors -> first('puesto_padre') }}
						</label>
						<label for="direccion_laboral_padre">
							Dirección Laboral del Padre
							<input type="text" name="direccion_laboral_padre" id="direccion_laboral_padre" value="{{old('direccion_laboral_padre')}}" class="form-control" placeholder="Dirección laboral del padre">
							{{ $errors -> first('direccion_laboral_padre') }}
						</label>
						<label for="telefono_laboral_padre">
							Teléfono Laboral del Padre
							<input type="text" name="telefono_laboral_padre" id="telefono_laboral_padre" value="{{old('telefono_laboral_padre')}}" class="form-control" placeholder="Teléfono laboral del padre">
							{{ $errors -> first('telefono_laboral_padre') }}
						</label>
						<label for="celular_padre">
							Teléfono Celular del Padre
							<input type="text" name="celular_padre" id="celular_padre" value="{{old('celular_padre')}}" class="form-control" placeholder="Teléfono celular del padre">
							{{ $errors -> first('celular_padre') }}
						</label>
						<label for="nextel_padre">
							Nextel del Padre
							<input type="text" name="nextel_padre" id="nextel_padre" value="{{old('nextel_padre')}}" class="form-control" placeholder="Nextel del padre">
							{{ $errors -> first('nextel_padre') }}
						</label>
						<label for="email_padre">
							Correo Electrónico del Padre
							<input type="email" name="email_padre" id="email_padre" value="{{old('email_padre')}}" class="form-control" placeholder="Correo electrónico">
							{{ $errors -> first('email_padre') }}
						</label>
						<label for="confirmar_email_padre">
							Confirmar Correo Electrónico del Padre
							<input type="email" name="confirmar_email_padre" id="confirmar_email_padre" value="{{old('confirmar_email_padre')}}" class="form-control" placeholder="Confirmar correo electrónico">
							{{ $errors -> first('confirmar_email_padre') }}
						</label>
					</div>
				</div>
				<div class="col-sm-6 form-group">
					<div id='mama'>
						<label for="nombre_madre">
						Nombre(s) de la Madre
							<input type="text" name="nombre_madre" id="nombre_madre" value="{{old('nombre_madre')}}" class="form-control" placeholder="Nombre(s) de la madre">
							{{ $errors -> first('nombre_madre') }}
						</label>
						<label for="a_paterno_madre">
							Apellido Paterno de la Madre
							<input type="text" name="a_paterno_madre" id="a_paterno_madre" value="{{old('a_paterno_madre')}}" class="form-control" placeholder="Apellido paterno de la madre">
							{{ $errors -> first('a_paterno_madre') }}
						</label>
						<label for="a_materno_madre">
							Apellido Materno de la Madre
							<input type="text" name="a_materno_madre" id="a_materno_madre" value="{{old('a_materno_madre')}}" class="form-control" placeholder="Apellido materno de la madre">
							{{ $errors -> first('a_materno_madre') }}
						</label>
						<label for="curp_madre">
							CURP de la Madre
							<input type="text" name="curp_madre" id="curp_madre" value="{{old('curp_madre')}}" class="form-control" placeholder="CURP de la madre">
							{{ $errors -> first('curp_madre') }}
						</label>
						<label for="empleo_madre">
							Lugar Donde Labora la Madre
							<input type="text" name="empleo_madre" id="empleo_madre" value="{{old('empleo_madre')}}" class="form-control" placeholder="Lugar donde labora la madre">
							{{ $errors -> first('empleo_madre') }}
						</label>
						<label for="puesto_madre">
							Puesto Laboral de la Madre
							<input type="text" name="puesto_madre" id="puesto_madre" value="{{old('puesto_madre')}}" class="form-control" placeholder="Puesto laboral de la madre">
							{{ $errors -> first('puesto_madre') }}
						</label>
						<label for="direccion_laboral_madre">
							Dirección Laboral de la Madre
							<input type="text" name="direccion_laboral_madre" id="direccion_laboral_madre" value="{{old('direccion_laboral_madre')}}" class="form-control" placeholder="Dirección laboral de la madre">
							{{ $errors -> first('direccion_laboral_madre') }}
						</label>
						<label for="telefono_laboral_madre">	
							Teléfono Laboral de la Madre
							<input type="text" name="telefono_laboral_madre" id="telefono_laboral_madre" value="{{old('telefono_laboral_madre')}}" class="form-control" placeholder="Teléfono laboral de la madre">
							{{ $errors -> first('telefono_laboral_madre') }}
						</label>
						<label for="celular_madre">
							Teléfono Celular de la Madre
							<input type="text" name="celular_madre" id="celular_madre" value="{{old('celular_madre')}}" class="form-control" placeholder="Teléfono celular de la madre">
							{{ $errors -> first('celular_madre') }}
						</label>
						<label for="nextel_madre">
							Nextel del Madre
							<input type="text" name="nextel_madre" id="nextel_madre" value="{{old('nextel_madre')}}" class="form-control" placeholder="Nextel de la madre">
							{{ $errors -> first('nextel_madre') }}
						</label>
						<label for="email_madre">
							Correo Electrónico de la Madre
							<input type="email" name="email_madre" id="email_madre" value="{{old('email_madre')}}" class="form-control" placeholder="Correo electrónico">
							{{ $errors -> first('email_madre') }}
						</label>
						<label for="confirmar_email_madre">
							Confirmar Correo Electrónico de la Madre
							<input type="email" name="confirmar_email_madre" id="confirmar_email_madre" value="{{old('confirmar_email_madre')}}" class="form-control" placeholder="Confirmar correo electrónico">
							{{ $errors -> first('confirmar_email_madre') }}
						</label>
					</div>
				</div>
			</div>
		</div>
	
	<div class="col-lg-12 well">
		<h3 align="center">
			Atecedentes Médicos
		</h3>
		<div class="row">
			<div class="col-sm-4 form-group">
				<label for="alergia">
					Alergia
					<input type="text" name="alergia" id="alergia" value="{{old('alergia')}}" class="form-control" placeholder="Alergia">
					{{ $errors -> first('alergia') }}
				</label>
			</div>
			<div class="col-sm-4 form-group">
				<label for="enfermedad">
					Enfermedad
					<input type="text" name="enfermedad" id="enfermedad" value="{{old('enfermedad')}}" class="form-control" placeholder="Enfermedad">
					{{ $errors -> first('enfermedad') }}
				</label>
			</div>
			<div class="col-sm-4 form-group">
				<label for="medicina">
					Medicamento
					<input type="text" name="medicina" id="medicina" value="{{old('medicina')}}" class="form-control" placeholder="Medicamento que toma">
					{{ $errors -> first('medicina') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 form-group">
				<label for="cirugia">
					Cirugia
					<input type="text" name="cirugia" id="cirugia" value="{{old('cirugia')}}" class="form-control" placeholder="Cirugia">
					{{ $errors -> first('cirugia') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 form-group">
				<label for="medico">
					Médico que le Atiende
					<input type="text" name="medico" id="medico" value="{{old('medico')}}" class="form-control" placeholder="Médico que le atiende">
					{{ $errors -> first('medico') }}
				</label>
			</div>
			<div class="col-sm-4 form-group">
				<label for="telefono_medico">
					Teléfono del Médico que le Atiende
					<input type="text" name="telefono_medico" id="telefono_medico" value="{{old('telefono_medico')}}" class="form-control" placeholder="Teléfono del Médico que le atiende">
					{{ $errors -> first('telefono_medico') }}
				</label>		
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="nombre_referencia1">
					Nombre de Alguna Referencia Personal
					<input type="text" name="nombre_referencia1" id="nombre_referencia1" value="{{old('nombre_referencia1')}}" class="form-control" placeholder="Referencia 1">
					{{ $errors -> first('nombre_referencia1') }}
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="telefono_referencia1">
					Teléfono de Alguna Referencia Personal
					<input type="text" name="telefono_referencia1" id="telefono_referencia1" value="{{old('telefono_referencia1')}}" class="form-control" placeholder="Teléfono de Referencia 1">
					{{ $errors -> first('telefono_referencia1') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="nombre_referencia2">
					Nombre de una Segunda Referencia Personal
					<input type="text" name="nombre_referencia2" id="nombre_referencia2" value="{{old('nombre_referencia2')}}" class="form-control" placeholder="Referencia 1">
					{{ $errors -> first('nombre_referencia2') }}
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="telefono_referencia2">
					Teléfono de una Segunda Referencia Personal
					<input type="text" name="telefono_referencia2" id="telefono_referencia2" value="{{old('telefono_referencia2')}}" class="form-control" placeholder="Teléfono de Referencia 1">
					{{ $errors -> first('telefono_referencia2') }}
				</label>
			</div>
		</div>
	</div>

	<div class="col-lg-12 well">
		<h3 align="center">
			Expediente
		</h3>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="acta_nacimiento">
					Acta de Nacimiento<br>
						</label><input type="radio" name="acta_nacimiento" value="1" @if(old('acta_nacimiento') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="acta_nacimiento" value="2" @if(old('acta_nacimiento') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="acta_nacimiento" value="3" @if(old('acta_nacimiento') == 3 ) checked @endif>No Aplica	
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_acta_nacimiento">
					Observaciones sobre acta de nacimiento<br>
					<input type="text" name="obs_acta_nacimiento" id="obs_acta_nacimiento" value="{{old('obs_acta_nacimiento')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_acta_nacimiento') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="impresion_curp">
					CURP Impresa<br>
						<input type="radio" name="impresion_curp" value="1" @if(old('impresion_curp') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="impresion_curp" value="2" @if(old('impresion_curp') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="impresion_curp" value="3" @if(old('impresion_curp') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_impresion_curp">
					Observaciones sobre CURP impresa<br>
					<input type="text" name="obs_impresion_curp" id="obs_impresion_curp" value="{{old('obs_impresion_curp')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_impresion_curp') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="cartilla_vacunacion">
					Cartilla de Vacunación<br>
						<input type="radio" name="cartilla_vacunacion" value="1" @if(old('cartilla_vacunacion') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="cartilla_vacunacion" value="2" @if(old('cartilla_vacunacion') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="cartilla_vacunacion" value="3" @if(old('cartilla_vacunacion') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_cartilla_vacunacion">
					Observaciones sobre Cartilla de Vacunación<br>
					<input type="text" name="obs_cartilla_vacunacion" id="obs_cartilla_vacunacion" value="{{old('obs_cartilla_vacunacion')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_cartilla_vacunacion') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="certificado_medico">
					Certificado Médico<br>
						<input type="radio" name="certificado_medico" value="1" @if(old('certificado_medico') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="certificado_medico" value="2" @if(old('certificado_medico') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="certificado_medico" value="3" @if(old('certificado_medico') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_certificado_medico">
					Observaciones sobre Certificado Médico<br>
					<input type="text" name="obs_certificado_medico" id="obs_certificado_medico" value="{{old('obs_certificado_medico')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_certificado_medico') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="constancia_estudios">
					Constancia de Estudios<br>
						<input type="radio" name="constancia_estudios" value="1" @if(old('constancia_estudios') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="constancia_estudios" value="2" @if(old('constancia_estudios') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="constancia_estudios" value="3" @if(old('constancia_estudios') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_constancia_estudios">
					Observaciones sobre Constancia de Estudios<br>
					<input type="text" name="obs_constancia_estudios" id="obs_constancia_estudios" value="{{old('obs_constancia_estudios')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_constancia_estudios') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="curp_padre_alumno">
					CURP Impresa del Padre o Tutor<br>
						<input type="radio" name="curp_padre_alumno" value="1" @if(old('curp_padre_alumno') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="curp_padre_alumno" value="2" @if(old('curp_padre_alumno') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="curp_padre_alumno" value="3" @if(old('curp_padre_alumno') == 3 ) checked @endif>No Aplica	
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_curp_padre_alumno">
					Observaciones sobre CURP impresa del Padre o Tutor<br>
					<input type="text" name="obs_curp_padre_alumno" id="obs_curp_padre_alumno" value="{{old('obs_curp_padre_alumno')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_curp_padre_alumno') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="curp_madre_alumno">
					CURP Impresa de la Madre o Tutora<br>
						<input type="radio" name="curp_madre_alumno" value="1" @if(old('curp_madre_alumno') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="curp_madre_alumno" value="2" @if(old('curp_madre_alumno') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="curp_madre_alumno" value="3" @if(old('curp_madre_alumno') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_curp_madre_alumno">
					Observaciones sobre CURP impresa de la Madre o Tutora<br>
					<input type="text" name="obs_curp_madre_alumno" id="obs_curp_madre_alumno" value="{{old('obs_curp_madre_alumno')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_curp_madre_alumno') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="ife_padre_alumno">
					Copia de IFE/INE del Padre o Tutor<br>
						<input type="radio" name="ife_padre_alumno" value="1" @if(old('ife_padre_alumno') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="ife_padre_alumno" value="2" @if(old('ife_padre_alumno') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="ife_padre_alumno" value="3" @if(old('ife_padre_alumno') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_ife_padre_alumno">
					Observaciones sobre Copia de IFE/INE del Padre o Tutor<br>
					<input type="text" name="obs_ife_padre_alumno" id="obs_ife_padre_alumno" value="{{old('obs_ife_padre_alumno')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_ife_padre_alumno') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="ife_madre_alumno">
					Copia de IFE/INE de la Madre o Tutora<br>
						<input type="radio" name="ife_madre_alumno" value="1" @if(old('ife_madre_alumno') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="ife_madre_alumno" value="2" @if(old('ife_madre_alumno') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="ife_madre_alumno" value="3" @if(old('ife_madre_alumno') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_ife_madre_alumno">
					Observaciones sobre Copia de IFE/INE de la Madre o Tutora<br>
					<input type="text" name="obs_ife_madre_alumno" id="obs_ife_madre_alumno" value="{{old('obs_ife_madre_alumno')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_ife_madre_alumno') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="comprobante_domicilio">
					Comprobante de Domicilio<br>
						<input type="radio" name="comprobante_domicilio" value="1" @if(old('comprobante_domicilio') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="comprobante_domicilio" value="2" @if(old('comprobante_domicilio') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="comprobante_domicilio" value="3" @if(old('comprobante_domicilio') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_comprobante_domicilio">
					Observaciones sobre Comprobante de Domicilio<br>
					<input type="text" name="obs_comprobante_domicilio" id="obs_comprobante_domicilio" value="{{old('obs_comprobante_domicilio')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_comprobante_domicilio') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="boleta_inmediata_anterior">
					Boleta Inmediata Anterior<br>
						<input type="radio" name="boleta_inmediata_anterior" value="1" @if(old('boleta_inmediata_anterior') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="boleta_inmediata_anterior" value="2" @if(old('boleta_inmediata_anterior') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="boleta_inmediata_anterior" value="3" @if(old('boleta_inmediata_anterior') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_boleta_inmediata_anterior">
					Observaciones sobre Boleta Inmediata Anterior<br>
					<input type="text" name="obs_boleta_inmediata_anterior" id="obs_boleta_inmediata_anterior" value="{{old('obs_boleta_inmediata_anterior')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_boleta_inmediata_anterior') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="carta_buena_conducta">
					Carta de Buena Conducta<br>
						<input type="radio" name="carta_buena_conducta" value="1" @if(old('carta_buena_conducta') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="carta_buena_conducta" value="2" @if(old('carta_buena_conducta') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="carta_buena_conducta" value="3" @if(old('carta_buena_conducta') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_carta_buena_conducta">
					Observaciones sobre Carta de Buena Conducta<br>
					<input type="text" name="obs_carta_buena_conducta" id="obs_carta_buena_conducta" value="{{old('obs_carta_buena_conducta')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_carta_buena_conducta') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="certificado_primaria">
					Certificado de Primaria<br>
						<input type="radio" name="certificado_primaria" value="1" @if(old('certificado_primaria') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="certificado_primaria" value="2" @if(old('certificado_primaria') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="certificado_primaria" value="3" @if(old('certificado_primaria') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_certificado_primaria">
					Observaciones sobre Certificado de Primaria<br>
					<input type="text" name="obs_certificado_primaria" id="obs_certificado_primaria" value="{{old('obs_certificado_primaria')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_certificado_primaria') }}
				</label>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
				<label for="boletas_anteriores">
					Boletas Anteriores<br>
						<input type="radio" name="boletas_anteriores" value="1" @if(old('boletas_anteriores') == 1 ) checked @endif>Entregó<br>
						<input type="radio" name="boletas_anteriores" value="2" @if(old('boletas_anteriores') == 2 ) checked @endif>Pendiente<br>
						<input type="radio" name="boletas_anteriores" value="3" @if(old('boletas_anteriores') == 3 ) checked @endif>No Aplica
				</label>
			</div>
			<div class="col-sm-6 form-group">
				<label for="obs_boletas_anteriores">
					Observaciones sobre Boletas Anteriores<br>
					<input type="text" name="obs_boletas_anteriores" id="obs_boletas_anteriores" value="{{old('obs_boletas_anteriores')}}" class="form-control" placeholder="Observaciones">
					{{ $errors -> first('obs_boletas_anteriores') }}
				</label>
			</div>
		</div>
	</div>
	<div class="col-lg-12 well">
		<div class="row">
			<div class="form-group pull-right">
				<button type="submit" id="boton_registrar_alumno" class="btn btn-primary">Enviar<i class="fa fa-paper-plane-o ml-2"></i></button>
				<a href="{{ route('Alumno.index') }}" class="btn btn-primary">Regresar</a>
			</div>
		</div>		
	</div>
</div>
</form>

<style type="text/css">
	.btn-primary{
		background-color: #20193D !important;
	}
	input[type="text"] {
    	width: 300px;
	}
	input[type="email"] {
    	width: 300px;
	}
	form .label-foto {
	  padding: 5px 10px;
	  border-radius: 5px;
	  border: 1px ridge black;
	  background-color: #20193D !important;
	  height: 40px;
	  color: white;
	  cursor: pointer;
	}
	form ol {
	  padding-left: 0;
	}
	form img {
	  height: 100px;
	  order: -1;
	}
</style>
<script>
	$(function(){
    // your logic here`enter code here`
		$("#papa").hide();
		$("#mama").hide();
		estatuspapa = $('#id_papa').find('option:selected').val();
		if(estatuspapa == 1){
			$(document).ready(function(){
				deshabilitarPadre();
			});
		}else if(estatuspapa == 3){
			$(document).ready(function(){
				deshabilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			});
		}else if(estatuspapa == 2){
			$(document).ready(function(){
				habilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			});
		}else{
			$(document).ready(function(){
				deshabilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			});
		}
		
		estatusmama = $('#id_mama').find('option:selected').val();
		if(estatusmama == 1){
			$(document).ready(function(){
				deshabilitarMadre();
			});
		}else if(estatusmama == 3){
			$(document).ready(function(){
				deshabilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			});
		}else if(estatusmama == 2){
			$(document).ready(function(){
				habilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			});
		}else{
			$(document).ready(function(){
				deshabilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			});
		}

    	///////////logica en cambios
    	$("#boton_registrar_alumno").click(function(){
    		$("#registrar_alumno").submit();
    	});

		$('#id_estado').on('change', function(e){
			var estado = e.target.value;
			$.get('/ajax-getMunicipio?id_estado='+estado, function(data){
				$('#id_estado_municipio').empty();
				$('#id_estado_municipio').append('<option value="0">Seleccione un Municipio</option>');
				$.each(data, function(create, municipio){
					$('#id_estado_municipio').append('<option value="'+municipio.id_estado_municipio+'">'+municipio.municipio+'</option>');
				});
			});
		});

		$('#id_papa').change( function (){
			estatuspapa = $(this).find('option:selected').val();
			if(estatuspapa == 1){
				deshabilitarPadre();
				$("#id_padre_trabajador").val(0);
			}else if(estatuspapa == 3){
				deshabilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			}else if(estatuspapa == 2){
				habilitarPadre();
				$("#campo_padre_trabajador").hide();
				$("#id_padre_trabajador").val(0);
			}else{
				$(document).ready(function(){
					deshabilitarPadre();
					$("#campo_padre_trabajador").hide();
					$("#id_padre_trabajador").val(0);
				});
			}
		});

		$('#id_mama').change( function (){
			estatusmama = $(this).find('option:selected').val();
			if(estatusmama == 1){
				deshabilitarMadre();
				$("#id_madre_trabajadora").val(0);
			}else if(estatusmama == 3){
				deshabilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			}else if(estatusmama == 2){
				habilitarMadre();
				$("#campo_madre_trabajadora").hide();
				$("#id_madre_trabajadora").val(0);
			}else{
				$(document).ready(function(){
					deshabilitarMadre();
					$("#campo_madre_trabajadora").hide();
					$("#id_madre_trabajadora").val(0);
				});
			}
		});
	});

	function deshabilitarPadre(){
		$("#nombre_padre").val('NA');
		$("#a_paterno_padre").val('NA');
		$("#a_materno_padre").val('NA');
		$("#curp_padre").val('NANANANANANANANANA');
		$("#empleo_padre").val('NA');
		$("#puesto_padre").val('NA');
		$("#direccion_laboral_padre").val('NA');
		$("#telefono_laboral_padre").val('11111');
		$("#celular_padre").val('11111');
		$("#nextel_padre").val('11111');
		$("#email_padre").val('NA@GMAIL.COM');
		$("#confirmar_email_padre").val('NA@GMAIL.COM');
		$("#campo_padre_trabajador").show();
		$("#id_padre_trabajador").val('0');
		$("#papa").hide();
	}
	function deshabilitarMadre(){
		$("#nombre_madre").val('NA');
		$("#a_paterno_madre").val('NA');
		$("#a_materno_madre").val('NA');
		$("#curp_madre").val('NANANANANANANANANA');
		$("#empleo_madre").val('NA');
		$("#puesto_madre").val('NA');
		$("#direccion_laboral_madre").val('NA');
		$("#telefono_laboral_madre").val('11111');
		$("#celular_madre").val('11111');
		$("#nextel_madre").val('11111');
		$("#email_madre").val('NA@GMAIL.COM');
		$("#confirmar_email_madre").val('NA@GMAIL.COM');
		$("#campo_madre_trabajadora").show();
		$("#id_madre_trabajadora").val('0');
		$("#mama").hide();
	}
	function habilitarPadre(){
		if($("#nombre_padre").val()=='NA')
			$("#nombre_padre").val('');
		if($("#a_paterno_padre").val()=='NA')
			$("#a_paterno_padre").val('');
		if($("#a_materno_padre").val()=='NA')
			$("#a_materno_padre").val('');
		if($("#curp_padre").val()=='NANANANANANANANANA')
			$("#curp_padre").val('');
		if($("#empleo_padre").val()=='NA')
			$("#empleo_padre").val('');
		if($("#puesto_padre").val()=='NA')
			$("#puesto_padre").val('');
		if($("#direccion_laboral_padre").val()=='NA')
			$("#direccion_laboral_padre").val('');
		if($("#telefono_laboral_padre").val()=='11111')
			$("#telefono_laboral_padre").val('');
		if($("#celular_padre").val()=='11111')
			$("#celular_padre").val('');
		if($("#nextel_padre").val()=='11111')
			$("#nextel_padre").val('');
		if($("#email_padre").val()=='NA@GMAIL.COM')
			$("#email_padre").val('');
		if($("#confirmar_email_padre").val()=='NA@GMAIL.COM')
			$("#confirmar_email_padre").val('');
		$("#id_padre_trabajador").val('0');
		$("#papa").show();	
	}
	function habilitarMadre(){
		if($("#nombre_madre").val()=='NA')
			$("#nombre_madre").val('');
		if($("#a_paterno_madre").val()=='NA')
			$("#a_paterno_madre").val('');
		if($("#a_materno_madre").val()=='NA')
			$("#a_materno_madre").val('');
		if($("#curp_madre").val()=='NANANANANANANANANA')
			$("#curp_madre").val('');
		if($("#empleo_madre").val()=='NA')
			$("#empleo_madre").val('');
		if($("#puesto_madre").val()=='NA')
			$("#puesto_madre").val('');
		if($("#direccion_laboral_madre").val()=='NA')
			$("#direccion_laboral_madre").val('');
		if($("#telefono_laboral_madre").val()=='11111')
			$("#telefono_laboral_madre").val('');
		if($("#celular_madre").val()=='11111')
			$("#celular_madre").val('');
		if($("#nextel_madre").val()=='11111')
			$("#nextel_madre").val('');
		if($("#email_madre").val()=='NA@GMAIL.COM')
			$("#email_madre").val('');
		if($("#confirmar_email_madre").val()=='NA@GMAIL.COM')
			$("#confirmar_email_madre").val('');
		$("#id_madre_trabajadora").val('0');
		$("#mama").show();	
	}

	var input = document.querySelector('#foto');
	var preview = document.querySelector('.preview');

input.style.opacity = 0;input.addEventListener('change', updateImageDisplay);function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  var curFiles = input.files;
  if(curFiles.length === 0) {
    var para = document.createElement('p');
    para.textContent = 'Sin archivo seleccionado.';
    preview.appendChild(para);
  } else {
    var list = document.createElement('ol');
    preview.appendChild(list);
    for(var i = 0; i < curFiles.length; i++) {
      var listItem = document.createElement('ul');
      var para = document.createElement('p');
      if(validFileType(curFiles[i])) {
        var image = document.createElement('img');
        image.src = window.URL.createObjectURL(curFiles[i]);

        listItem.appendChild(para);
        listItem.appendChild(image);

      } else {
        para.textContent = 'Archivo: ' + curFiles[i].name + ': No tiene formato válido.';
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
  }
}
var fileTypes = [
  'image/jpeg',
  'image/pjpeg',
  'image/png'
]

function validFileType(file) {
  for(var i = 0; i < fileTypes.length; i++) {
    if(file.type === fileTypes[i]) {
      return true;
    }
  }
  return false;
}
</script>
@endsection