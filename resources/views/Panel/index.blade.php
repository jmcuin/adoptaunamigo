@extends('menu')

@section('contenido')
<div class="container" style="overflow: auto;">
      <div class="row">
      <div class="col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h2 class="panel-title" align="center">Bienvenido(a) {{ Auth::user()->name }}</h2>
            </div>
            <div class="panel-body">
                <div class="row">
                	<h2 class="panel-title" align="center">Rescatistas Registrados</h2>
                	<h3 align="center">{{ $rescatistas -> count() }}</h3>
              	</div>
              	<div class="row">
                	<h2 class="panel-title" align="center">Amigos en Adopción</h2>
                	<h3 align="center">{{ $amigos_en_adopcion -> count() }}</h3>
              	</div>
                <div class="row">
                  <h2 class="panel-title" align="center">Amigos Adoptados</h2>
                  <h3 align="center">{{ $amigos_adoptados -> count() }}</h3>
                </div>
                <div class="row">
                  <h2 class="panel-title" align="center">Amigos que Solicitan Esterilización</h2>
                  <h3 align="center">{{ $amigos_esterilizacion -> count() }}</h3>
                </div>
                <div class="row">
                  <h2 class="panel-title" align="center">Amigos que Solicitan Hogar Temporal</h2>
                  <h3 align="center">{{ $amigos_hogar_temporal -> count() }}</h3>
                </div>
                <div class="row">
                  <h2 class="panel-title" align="center">Amigos que Solicitan Ayuda Médica</h2>
                  <h3 align="center">{{ $amigos_ayuda_medica -> count() }}</h3>
                </div>
                <div class="row">
                  <h2 class="panel-title" align="center">Amigos que Solicitan Ayuda Alimenticia</h2>
                  <h3 align="center">{{ $amigos_ayuda_alimenticia -> count() }}</h3>
                </div>
            </div>
            <div class="panel-footer" align="center">  
              <a href="{{ route('Setting.index') }}" class="btn btn-primary">Modificar Configuración</a>      
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
@endsection