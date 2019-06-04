@extends('menu')

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
            <h1 class="title-single">{{ $evento -> nombre }}</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('inicio') }}">Inicio</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('gridEventos') }}">Todos</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ $evento -> nombre }}
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
              <img src="{{ Storage::url('public/eventos/'.$evento -> imagen) }}" alt="" style="width: 1110px;">
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
                    <h5 class="title-c">{{ $evento -> nombre }}</h5>
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
                      <strong>Lugar:</strong>
                      <span>{{ $evento -> lugar }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Fecha:</strong>
                      <span>{{ $evento -> fecha }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Hora:</strong>
                      <span>{{ $evento -> hora }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Correo Electrónico:</strong>
                      <span>{{ $evento -> email }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Teléfono:</strong>
                      <span>{{ $evento -> telefono }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Facebook:</strong>
                      <span><a href="{{ $evento -> enlace_facebook }}" target="_blank">{{ $evento -> enlace_facebook }}</a></span>
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
                  {{ $evento -> descripcion }}
                </p>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">También puedes participar:</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="" >
                  @if($evento -> donativos_alimento == true) <li>Trayendo tu donativo de alimento</li> @endif
                  @if($evento -> donativos_objetos == true) <li>Donando ropa, correas, casas, etc.</li> @endif
                  @if($evento -> donativos_juguetes == true) <li>Donando juguetes para los rescatados</li> @endif
                  @if($evento -> donativos_efectivo == true) <li>Donando en efectivo para la causa animalista</li> @endif
                  @if($evento -> donativos_paseos == true) <li>Regalando pasesos a los rescatados</li> @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->

@stop