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
            <h1 class="title-single">{{ $amigo -> nombre }}</h1>
            <span class="color-text-a">{{ $amigo -> caracter }}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('inicio') }}">Inicio</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('gridAmigos') }}">Todos</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ $amigo -> nombre }}
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
            <?php $foto_amigo = explode('&', $amigo -> fotos); ?>
            @for($i = 1; $i < count($foto_amigo); $i++)
              <div class="carousel-item-b">
                <img src="{{ Storage::url($foto_amigo[$i]) }}" alt="" style="background-size: contain;">
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
                    <h5 class="title-c">{{ $amigo -> nombre }}</h5>
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
                      <strong>Especie:</strong>
                      <span>{{ $amigo -> especie -> especie }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Raza:</strong>
                      <span>{{ $amigo -> raza -> raza }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Edad:</strong>
                      <span>{{ $amigo -> edad }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Tamaño:</strong>
                      <span>{{ $amigo -> tamanio }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Carácter:</strong>
                      <span>{{ $amigo -> caracter }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Convivencia:</strong>
                      <span>{{ $amigo -> convivencia }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Lugares para Adopción:</strong>
                      <span>{{ $amigo -> lugar_adopcion }}</span>
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
                  {{ $amigo -> historia }}
                </p>
                <p class="description color-text-a no-margin">
                  {{ $amigo -> recomendaciones }}
                </p>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">También lo puedes ayudar donándole:</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="" >
                  @if($amigo -> solicita_esterilizacion == true) <li>Su esterilización</li> @endif
                  @if($amigo -> solicita_hogar_temporal == true) <li>Hogar temporal</li> @endif
                  @if($amigo -> solicita_ayuda_medica == true) <li>Apoyo para atención médica</li> @endif
                  @if($amigo -> solicita_ayuda_alimenticia == true) <li>Alimento</li> @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
        @if($amigo -> enlace_video != null)
          <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                  aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <!--li class="nav-item">
                <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans"
                  aria-selected="false">Floor Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
                  aria-selected="false">Ubication</a>
              </li-->
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="{{ $amigo -> enlace_video }}" width="100%" height="460" frameborder="0"
                  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <!--div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="img/plan2.jpg" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834"
                  width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div-->
            </div>
          </div>
         @endif
        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Contacta a su rescatista</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <img src="{{ Storage::url($amigo -> rescatista -> foto) }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="property-agent">
                <h4 class="title-agent">{{ $amigo -> rescatista -> alias }}</h4>
                <p class="color-text-a">
                  {{ $amigo -> rescatista -> historia }}
                </p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <strong>Teléfono:</strong>
                    <span class="color-text-a">{{ $amigo -> rescatista -> telefono }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Correo Electrónico:</strong>
                    <span class="color-text-a">{{ $amigo -> rescatista -> email }}</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Facebook:</strong>
                    <span class="color-text-a"><a href="{{ $amigo -> rescatista -> redes_sociales }}" target="_blank">{{ $amigo -> rescatista -> redes_sociales }}</a></span>
                  </li>
                </ul> 
                <!--div class="socials-a">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div-->
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <div class="property-contact">
                <form method="POST" id="registrar_solicitud" enctype="multipart/form-data" action="{{ route('registerSolicitud') }}">
                  {!! csrf_field() !!}
                  <input type="text" name="id_amigo" value="{{ $amigo -> id_amigo }}" hidden="hidden">
                  <div class="row">
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-lg form-control-a" id="inputName"
                          placeholder="Tu nombre" required name="nombre">
                      </div>
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg form-control-a" id="inputEmail1"
                          placeholder="Tu correo electrónico" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <input type="text" name="telefono" class="form-control form-control-lg form-control-a" id="inputtelefono1"
                          placeholder="Tu número de teléfono" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <input type="text" name="edad" class="form-control form-control-lg form-control-a" id="inputedad1"
                          placeholder="Tu edad" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <textarea id="textMessage" class="form-control" placeholder="¿Por qué quieres adoptarlo?" name="mensaje" cols="45"
                          rows="4" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12"> 
                      <button type="submit" class="btn btn-a">Quiero adoptarlo(a)</button>
                    </div>
                  </div>
                </form>
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