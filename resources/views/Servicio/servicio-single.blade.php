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
            <h1 class="title-single">{{ $servicio -> servicio }}</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('inicio') }}">Inicio</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('gridServicios') }}">Todos</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ $servicio -> servicio }}
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
            <div class="carousel-item-b">
              <img src="{{ Storage::disk('s3') -> url($servicio -> foto) }}" alt="" style="width: 1110px;">
            </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">*</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $servicio -> servicio }}</h5>
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
                      <strong>Precio:</strong>
                      <span>{{ $servicio -> precio }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Correo Electrónico:</strong>
                      <span>{{ $servicio -> email }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Teléfono:</strong>
                      <span>{{ $servicio -> telefono }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Facebook:</strong>
                      <span><a href="{{ $servicio -> enlace_facebook }}" target="_blank">{{ $servicio -> enlace_facebook }}</a></span>
                    </li>
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
                  {{ $servicio -> descripcion }}
                </p>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Términos y condiciones:</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="" >
                  <li>{{ $servicio -> terminos_y_condiciones }}</li>
                </ul>
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