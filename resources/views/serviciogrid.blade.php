@extends('layout')

@section('contenido')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Todos los servicios</h1>
            <span class="color-text-a">Seguro encuentras una buena opción...</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->
  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        @foreach($servicios as $servicio)
        <div class="col-md-4" style="height: 260px !important; margin-bottom: 20px;">
          <div class="card-box-a card-shadow" style="height: 260px !important;">
            <div class="img-box-a">
              <img src="{{ Storage::url($servicio -> foto) }}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ route('servicio-single', $servicio -> id_servicio ) }}">{{ $servicio -> servicio }}
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Talla: {{ $servicio -> servicio }}</span>
                  </div>
                  <a href="{{ route('servicio-single', $servicio -> id_servicio ) }}" class="link-a">Más información
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Edad</h4>
                      <span>
                        {{ $servicio -> precio }}
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Carácter</h4>
                      <span>
                        {{ $servicio -> precio }}
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Convivencia</h4>
                      <span>
                        {{ $servicio -> servicio }}
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

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
  <!--/ Property Grid End /-->
@stop