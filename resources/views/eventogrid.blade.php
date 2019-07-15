@extends('layout')

@section('contenido')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Todos nuestros eventos</h1>
            <span class="color-text-a">Seguro encuentras a un(a) amigo(a) para toda la vida...</span>
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
        @foreach($eventos as $evento)
        <div class="col-md-4" style="height: 260px !important; margin-bottom: 20px;">
          <div class="card-box-a card-shadow" style="height: 260px !important;">
            <div class="img-box-a">
              <img src="{{ Storage::url('public/eventos/'.$evento -> imagen) }}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ route('evento-single', $evento -> id_evento ) }}">{{ $evento -> nombre }}
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">{{ substr($evento -> descripcion, 0, 15) }}...</span>
                  </div>
                  <a href="{{ route('evento-single', $evento -> id_evento ) }}" class="link-a">Más información
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Lugar</h4>
                      <span>
                        {{ $evento -> lugar }}
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Fecha</h4>
                      <span>
                        {{ $evento -> fecha }}
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Hora</h4>
                      <span>
                        {{ $evento -> hora }}
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
  <!--/ Property Grid End /-->
@stop
