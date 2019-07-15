@extends('layout')

@section('contenido')

  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Todos nuestros amigos</h1>
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
        @foreach($amigos as $amigo)
        <div class="col-md-4" style="height: 260px !important; margin-bottom: 20px;">
          <div class="card-box-a card-shadow" style="height: 260px !important;">
            <div class="img-box-a">
              <?php $foto_amigo = explode('&', $amigo -> fotos); ?>
              <img src="{{ Storage::url('public/amigos/'.$foto_amigo[1]) }}" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="{{ route('amigo-single', $amigo -> id_amigo ) }}">{{ $amigo -> nombre }}
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">Talla: {{ $amigo -> tamanio }}</span>
                  </div>
                  <a href="{{ route('amigo-single', $amigo -> id_amigo ) }}" class="link-a">Más información
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Edad</h4>
                      <span>
                        {{ $amigo -> edad }}
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Carácter</h4>
                      <span>
                        {{ $amigo -> caracter }}
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Convivencia</h4>
                      <span>
                        {{ $amigo -> convivencia }}
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
