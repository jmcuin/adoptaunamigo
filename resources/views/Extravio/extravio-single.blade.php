@extends('layout')

@section('contenido')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            @if (session('info'))
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('info') }}
                </div>
            @endif
            <h1 class="title-single">{{ $extravio -> nombre }}</h1>
            <span class="color-text-a">{{ $extravio -> caracter }}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('inicio') }}">Inicio</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('gridExtravios') }}">Todos</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ $extravio -> nombre }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <?php $foto_extravio = explode('&', $extravio -> fotos); ?>
            @for($i = 1; $i < count($foto_extravio); $i++)
              <div class="carousel-item-b">
                <img src="{{ Storage::disk('s3') -> url($foto_extravio[$i]) }}" alt="" style="background-size: contain;">
              </div>
            @endfor
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">*</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $extravio -> nombre }}</h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Resumen</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Sí lo ves contacta a:</strong>
                      <span>{{ $extravio -> contacto_persona }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Al número:</strong>
                      <span>{{ $extravio -> telefono }}</span>
                    </li>
                    @if( $extravio -> recompenza == true)
                      <li class="d-flex justify-content-between">
                        <strong>Recompenza:</strong>
                        <span>{{ $extravio -> recompenza_monto }}</span>
                      </li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Descripción</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  Descripción de {{$extravio -> nombre }}: {{ $extravio -> descripcion_amigo }}
                </p>
                <p class="description color-text-a">
                  Señas particulares de {{$extravio -> nombre }}: {{ $extravio -> senias_particulares }}
                </p>
                <p class="description color-text-a no-margin">
                  Lo que sucedió: {{ $extravio -> descripcion_evento }}
                </p><br>
                <p class="description color-text-a no-margin">
                  Visto por última vez el {{ $extravio -> ultimo_avistamiento_fecha }} en {{ $extravio -> ultimo_avistamiento_lugar }} 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->

  <section>
    <div class="container" align="center">
      <div class="row" align="center">
        <div class="col-sm-12" align="center">
          <form method="POST" id="registrar_solicitud" enctype="multipart/form-data" action="{{ route('Notificacion.store') }}">
            {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-12 mb-1">
                @if (session('info'))
                  <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ session('info') }}
                  </div>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-1">
              </div>
              <div class="col-md-4 mb-1">
                <div class="form-group">
                  <h5>¿Quieres mantenerte actualizado?<br>
                    Déjanos tu correo electrónico</h5>
                  <input type="email" name="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Tu correo electrónico" required>
                </div>
              </div>
              <div class="col-md-4 mb-1">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12"> 
                <button type="submit" class="btn btn-a">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

@stop