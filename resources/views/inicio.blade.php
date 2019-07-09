@extends('layout')

@section('contenido')

<!--/ Carousel Star /-->
  
  <div class="intro intro-carousel" id="inicio">
    <div id="carousel" class="owl-carousel owl-theme">
      @if(count($amigos) > 0)
        @foreach($amigos as $amigo)
          <?php $foto_amigo = explode('&', $amigo -> fotos); ?>
          <div class="carousel-item-a intro-item bg-image" style="background-image: url({{ Storage::url('public/amigos/'.$foto_amigo[1]) }})">
          <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="intro-body">
                        <h1 class="intro-title mb-4">
                          <a href="{{ route('amigo-single', $amigo -> id_amigo ) }}" class="intro-title mb-4" target="_blank">{{ $amigo -> nombre }}</a>
                        </h1>
                        <p class="intro-subtitle intro-price">
                          <a href="{{ route('amigo-single', $amigo -> id_amigo ) }}"><span class="price-a">{{ $amigo -> caracter }}</span></a>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="carousel-item-a intro-item " style="background-image: 
        url({{URL::to('/')}}/images/friendly.jpg); background-size: cover;">
          <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
              <div class="table-cell">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="intro-body">
                        <h1 class="intro-title mb-4">
                          Próximamente...
                        </h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      @endif
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
  <!--section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-gamepad"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Lifestyle</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                convallis a pellentesque
                nec, egestas non nisi.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-usd"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Loans</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
                aliquet elit, eget tincidunt
                nibh pulvinar a.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-home"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Sell</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                convallis a pellentesque
                nec, egestas non nisi.
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section-->
  <!--/ Services End /-->

  <!--/ Property Star /-->
  <section class="section-property section-t8" id="amigos">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Recién Llegados</h2>
            </div>
            <div class="title-link">
              @if(count($amigostop) > 0)
                <a href="{{ route('gridAmigos') }}">Todos nuestros amigos
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      
      <div id="property-carousel" class="owl-carousel owl-theme">
        @if(count($amigostop) > 0)
          @foreach($amigostop as $amigo)
            <div class="carousel-item-b" style="height: 260px !important;">
              <div class="card-box-a card-shadow" style="height: 260px !important;">
                <div class="img-box-a">
                  <?php $foto_amigo = explode('&', $amigo -> fotos); ?>
                  <img src="{{ Storage::url('public/amigos/'.$foto_amigo[1]) }}" alt="" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="{{ route('amigo-single', $amigo -> id_amigo ) }}">{{ $amigo -> nombre }}</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">Talla: {{ $amigo -> tamanio }}</span>
                      </div>
                      <a href="{{ route('amigo-single', $amigo -> id_amigo ) }}" class="link-a">Ver más
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
        @else
          ESPERA NUEVOS AMIGOS EN ADOPCIÓN PRÓXIMAMENTE...
        @endif
        
      <!--div id="property-carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/property-6.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">206 Mount
                      <br /> Olive Road Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="#" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div-->
        <!--div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/property-3.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">157 West
                      <br /> Central Park</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/property-7.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">245 Azabu
                      <br /> Nishi Park let</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="img/property-10.jpg" alt="" class="img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">204 Montal
                      <br /> South Bela Two</a>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <span class="price-a">rent | $ 12.000</span>
                  </div>
                  <a href="property-single.html" class="link-a">Click here to view
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </div>
                <div class="card-footer-a">
                  <ul class="card-info d-flex justify-content-around">
                    <li>
                      <h4 class="card-info-title">Area</h4>
                      <span>340m
                        <sup>2</sup>
                      </span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Beds</h4>
                      <span>2</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Baths</h4>
                      <span>4</span>
                    </li>
                    <li>
                      <h4 class="card-info-title">Garages</h4>
                      <span>1</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div-->
      </div>
    </div>
  </section>
  <!--/ Property End /-->

  <!--/ Agents Star /-->
  <section class="section-agents section-t8" id="eventos">
    <div class="container">
      
    </div>
  </section>
  <!--/ Agents End /-->

  <!--/ News Star /-->
  <!--section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Próximos Eventos</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.html">Todos los eventos
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="new-carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-2.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">House</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">House is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-5.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-7.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Park</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="blog-single.html">Park is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="img/post-3.jpg" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">Travel</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="#">Travel is comming
                      <br> new</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">18 Sep. 2017</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section-->
  <!--/ News End /-->

  <!--/ Testimonials Star /-->
  <section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container" id="beneficios">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">¿Conoces los beneficios de tener mascotas en casa?</h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <a href="https://www.fundacion-affinity.org/perros-gatos-y-personas/busco-una-mascota/los-beneficios-del-vinculo-entre-ninos-y-mascotas" class="link-one" target="_blank"><img src="{{URL::to('/')}}/images/beneficios-mascotas.jpg" alt="" class="img-fluid"></a>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    <a href="https://www.fundacion-affinity.org/perros-gatos-y-personas/busco-una-mascota/los-beneficios-del-vinculo-entre-ninos-y-mascotas" target="_blank">
                      Los beneficios que aporta una mascota a los niños son innumerables. En general, la compañía de un animal mejora la calidad de vida de todo ser humano, aumenta la longevidad, preserva el equilibrio físico y mental, facilita la recreación, reduce el estrés y disminuye el índice de depresión en general.
                    </a>
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <!--img src="img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar"-->
                  <h5 class="testimonial-author" style="font-style: italic;">
                    <a href="https://www.fundacion-affinity.org/perros-gatos-y-personas/busco-una-mascota/los-beneficios-del-vinculo-entre-ninos-y-mascotas" target="_blank">fundacion-affinity.org</a></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <a href="https://www.muyinteresante.es/salud/articulo/7-beneficios-de-tener-mascota-para-tu-salud-mental-961460364104" class="link-one" target="_blank"><img src="{{URL::to('/')}}/images/perro_0.jpg" alt="" class="img-fluid"></a>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    <a href="https://www.muyinteresante.es/salud/articulo/7-beneficios-de-tener-mascota-para-tu-salud-mental-961460364104" class="link-one" target="_blank">
                      Numerosos estudios demuestran que las mascotas mejoran nuestra calidad de vida, tanto emocional como físicamente.
                    </a>
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <!--img src="img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar"-->
                  <h5 class="testimonial-author" style="font-style: italic;">
                    <a href="https://www.muyinteresante.es/salud/articulo/7-beneficios-de-tener-mascota-para-tu-salud-mental-961460364104" class="link-one" target="_blank">Muy Interesante</a></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <a href="https://www.muyinteresante.es/salud/articulo/7-beneficios-de-tener-mascota-para-tu-salud-mental-961460364104" class="link-one" target="_blank"><img src="{{URL::to('/')}}/images/Mascota-salud.jpg" alt="" class="img-fluid"></a>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    <a href="https://mejorconsalud.com/beneficios-de-tener-mascotas-para-nuestra-salud/" target="_blank">
                      Tener una mascota en casa vehiculiza los sentimientos, los afectos y diferentes reacciones en cada uno de los miembros del hogar. Pero, además, hay diferentes estudios que han comprobado que las mascotas mejoran nuestra calidad de vida, no sólo emocionalmente, sino que también físicamente.
                    </a>
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <!--img src="img/mini-testimonial-1.jpg" alt="" class="testimonial-avatar"-->
                  <h5 class="testimonial-author" style="font-style: italic;">
                    <a href="https://mejorconsalud.com/beneficios-de-tener-mascotas-para-nuestra-salud/" target="_blank">mejorconsalud.com</a></h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Testimonials End /-->
@stop
